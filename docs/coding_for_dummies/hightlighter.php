<?php
/*
* $Id: hightlighter.class.inc,v 1.3 2004/03/19 18:02:53 garfieldfr Exp $
*
* Souligneur générique pour colorier la syntaxe de langage de programmation
*
* copyrigth Eric Feldstein 2004 mailto:garfield_fr@tiscali.fr
*
* grabbed from here: http://www.wikini.net/wakka.php?wiki=ColorationSyntaxiqueWikiNi
*
* Licence : la meme que wikini(voir le fichier LICENCE).
* Vous êtes libre d'utiliser et de modifier ce code à condition de laisser le copyright 
* d'origine. Vous pouvez  bien sur vous ajouter à la liste des auteurs.
*
* INSTALLATION : copier le fichier dans le repertoire "formatters" de WikiNi
* UTILISATION : importer la classe dans le script de coloration
* ATTRIBUTS DE LA CLASSE :
*   - isCaseSensitiv : booleen - indique si la syntaxe est sensible a la casse
*   - comment : array - tableau d'expressions regulieres definissant les commentaires multiligne
*                ex : array('({[^$][^}]*})',    //commentaires: { ... }
*                        '(\(\*[^$](.*)\*\))'        //commentaires: (* ... *)
*                    );
*    - commentLine : array tableau d'expressions regulieres definissant les commentaires monoligne
*                ex : array('(//.*\n)');         //commentaire //
*    - commentStyle : string - style CSS inline a utiliser pour la coloration(utilisé dans une
*            balise <SPAN style="..."></SPAN>)
*    - directive : array - tableau d'expression reguliere pour definir les directive de
*            compilation
*    - directiveStyle : string - style CSS inline a utiliser pour la coloration
*    - string : array - tableau d'expression reguliere pour definir les chaine de caracteres
*    - stringStyle : string - style CSS inline a utiliser pour la coloration
*    - number : array - tableau d'expression reguliere pour definir les nombres
*    - numberStyle : string - style CSS inline a utiliser pour la coloration
*    - keywords : array - tableau asociatif contenant des tableaux de liste de mots avec leur style. Ex :
*          $oHightlighter->keywords['Liste1']['words'] = array('liste1mot1','liste1mot2','liste1mot3');
*          $oHightlighter->keywords['Liste1']['style'] = 'color: red';
*          $oHightlighter->keywords['Liste2']['words'] = array('liste2mot1','liste2mot2');
*          $oHightlighter->keywords['Liste2']['style'] = 'color: yellow';
*    chaque tableau keywords['...'] DOIT posseder les 2 clé 'words' et 'style'.
*    - symboles : array - tableau conteant la liste des symboles
*    - symbolesStyle : string - style CSS inline a utiliser pour la coloration
*    - identifier : array - tableau d'expression reguliere pour definir les identifiants
*    - identStyle : string - style CSS inline a utiliser pour la coloration
* METHODE PUBLIQUE DE LA CLASSE :
*    - Analyse($text) : $text string Chaine a analyser
*        renvoie le texte colorié.
*
* NOTES IMPORTANTES
*  - Les expressions reguliere doivent être entre parenthèse capturante pour etre utilisé
* dans une fonction de remplacement. Voir le fichier coloration_delphi.php pour un exemple
*  - Lorsque un style est defini à vide, l'expression reguliere n'est pas prise en compte dans
* l'analyse.
*  - L'option de recherche est msU : multiligne, le . peut être un \n et la recherche
* est 'not greedy' qui inverse la tendance à la gourmandise des expressions régulières.
*/

class Hightlighter{
    //sensibilite majuscule/minuscule
    var $isCaseSensitiv = false;
    //commentaires
    var $comment = array();    //commentaire multiligne
    var $commentLine = array();    //commentaire monoligne
    var $commentStyle = '';//'color: red';
    //directives de compilation
    var $directive = array();
    var $directiveStyle = '';//'color: green';
    //chaine de caracteres
    var $string = array();
    var $stringStyle = '';
    //nombre
    var $number = array();
    var $numberStyle = '';
    //mots clé
    var $keywords =    array();
    //séparateurs
    var $symboles = array();
    var $symbolesStyle = '';
    //identifiant
    var $identifier = array();
    var $identStyle = '';
    //*******************************************************
    // Variable privées
    //*******************************************************
    var $_patOpt = 'msU';        //option de recherche
    var $_pattern = '';            //modele complet
    var $_commentPattern = '';    //modele des commentaires
    var $_directivePattern = '';//modele des directives
    var $_numberPattern = '';    //modele des nombres
    var $_stringPattern = '';    //modele des chaine de caracteres
    var $_keywordPattern = '';    //modele pour le mots cle
    var $_symbolesPattern = '';    //modele pour les symbole
    var $_separatorPattern = '';//modele pour les sparateurs
    var $_identPattern = '';    //modele pour les identifiants
    /********************************************************
    Methodes de la classe
    *********************************************************/
    /**
    * Renvoie le pattern pour les commentaires
    */
    function _getCommentPattern(){
        $a = array_merge($this->commentLine,$this->comment);
        return implode('|',$a);
    }
    /**
    * Renvoie le pattern pour les directives de compilation
    */
    function _getDirectivePattern(){
        return implode('|',$this->directive);
    }
    /**
    * Renvoie le pattern pour les chaine de caracteres
    */
    function _getStringPattern(){
        return implode('|',$this->string);
    }
    /**
    * Renvoie le pattern pour les nombre
    */
    function _getNumberPattern(){
        return implode('|',$this->number);
    }
    /**
    * Renvoie le pattern pour les mots clé
    */
    function _getKeywordPattern(){
      $aResult = array();
      foreach($this->keywords as $key=>$keyword){
         $aResult = array_merge($aResult, $keyword['words']);
         $this->keywords[$key]['pattern'] = '\b'.implode('\b|\b',$keyword['words']).'\b';
      }
        return '\b'.implode('\b|\b',$aResult).'\b';
    }
    /**
    * Renvoie le pattern pour les symboles
    */
    function _getSymbolesPattern(){
        $a = array();
        foreach($this->symboles as $s){
            $a[] = preg_quote($s,'`');
        }
        return implode('|',$a);
    }
    /**
    * Renvoie le pattern pour les identifiants
    */
    function _getIdentifierPattern(){
        return implode('|',$this->identifier);
    }
    /**
    * Liste des separateur d'apres la liste des symboles
    */
    function _getSeparatorPattern(){
        $a = array_unique(preg_split('//', implode('',$this->symboles), -1, PREG_SPLIT_NO_EMPTY));
        $pattern = '['.preg_quote(implode('',$a),'`').'\s]+';
        return $pattern;
    }
    /**
    * Renvoie le modele a utiliser dans l'expression regulière
    *
    * @return string Modele de l'expression régulière
    */
    function _getPattern(){
        $this->_separatorPattern = $this->_getSeparatorPattern();
        $this->_symbolesPattern = $this->_getSymbolesPattern();
        $this->_commentPattern = $this->_getCommentPattern();
        $this->_directivePattern = $this->_getDirectivePattern();
        $this->_stringPattern = $this->_getStringPattern();
        $this->_numberPattern = $this->_getNumberPattern();
        $this->_keywordPattern = $this->_getKeywordPattern();
        $this->_identPattern = $this->_getIdentifierPattern();
        //construction du modele globale en fonction de l'existance d'un style(optimisation)
        if($this->commentStyle){ $a[] = $this->_commentPattern; }
        if($this->directiveStyle){ $a[] = $this->_directivePattern; }
        if($this->stringStyle){ $a[] = $this->_stringPattern; }
        if($this->numberStyle){ $a[] = $this->_numberPattern; }
      if(count($this->keywords)>0){ $a[] = $this->_keywordPattern; }
        if($this->symbolesStyle){ $a[] = $this->_symbolesPattern; }
        if($this->identStyle){ $a[] = $this->_identPattern; }
        $this->_pattern = implode('|',$a);
        return $this->_pattern;
    }
    /**
    * Fonction de remplacement de chaque élement avec leur style.
    */
    function replacecallback($match){
        $text = $match[0];
        $pcreOpt = $this->_patOpt;
        $pcreOpt .= ($this->isCaseSensitiv)?'':'i';
        //commentaires
      if($this->commentStyle){
         if (preg_match('`'.$this->_commentPattern."`$pcreOpt",$text,$m)){
            return "<span style=\"$this->commentStyle\">".$match[0].'</span>';
         }
      }
        //directive de compilation
      if ($this->directiveStyle){
         if (preg_match('`'.$this->_directivePattern."`$pcreOpt",$text,$m)){
            return "<span style=\"$this->directiveStyle\">".$match[0].'</span>';
         }
      }
        //chaine de caracteres
      if ($this->stringStyle){
           if (preg_match('`'.$this->_stringPattern."`$pcreOpt",$text,$m)){
               return "<span style=\"$this->stringStyle\">".$match[0].'</span>';
           }
      }
        //nombres
      if ($this->numberStyle){
           if (preg_match('`'.$this->_numberPattern."`$pcreOpt",$text,$m)){
               return "<span style=\"$this->numberStyle\">".$match[0].'</span>';
           }
      }
        //mot clé
      if (count($this->keywords)>0){
         foreach($this->keywords as $key=>$keywords){
            if ($keywords['style']){
               if(preg_match('`'.$keywords['pattern']."`$pcreOpt",$text,$m)){
                  return "<span style=\"".$keywords['style']."\">".$match[0].'</span>';
               }
            }
         }
      }
        //symboles
      if ($this->symbolesStyle){
           if (preg_match('`'.$this->_symbolesPattern."`$pcreOpt",$text,$m)){
               return "<span style=\"$this->symbolesStyle\">".$match[0].'</span>';
           }
      }
        //identifiants
      if ($this->identStyle){
           if (preg_match('`'.$this->_identPattern."`$pcreOpt",$text,$m)){
               return "<span style=\"$this->identStyle\">".$match[0].'</span>';
           }
      }
        return $match[0];
    }

	function InitPascalRules() {
		$this->isCaseSensitiv = false;

		//************* commentaires *************
		$this->comment = array('({[^$][^}]*})',            //commentaires: { ... }
            		        '(\(\*[^$](.*)\*\))'              //commentaires: (* ... *)
          		      );
		$this->commentLine = array('(//.*\n)');             //commentaire //
		$this->commentStyle = "color: red; font-style: italic";    //style CSS pour balise SPAN

		//************* directives de compilation *************
		$this->directive = array('({\\$[^{}]*})',            //directive {$....}
      		              '(\(\*\\$(.*)\*\))'                  //directive (*$....*)
  		              );
		$this->directiveStyle = "color: green";               //style CSS pour balise SPAN

		//************* chaines de caracteres *************
		$this->string = array("('[^']*')",'(#\d+)');        //chaine = 'xxxxxxxx' ou #23
		$this->stringStyle = "background: yellow";

		//************* nombres *************
		$this->number[] = '(\b\d+(\.\d*)?([eE][+-]?\d+)?)';    //123 ou 123. ou 123.456 ou 123.E-34 ou 123.e-34 123.45E+34 ou 4e54
		$this->number[] = '(\$[0-9A-Fa-f]+\b)';                //ajout des nombres hexadecimaux : $AF
		$this->numberStyle = 'color: blue';

		//************* mots clé *************
		$this->keywords['MotCle']['words'] = array('absolute','abstract','and','array','as','asm',
                        'begin',
                        'case','class','const','constructor',
                        'default','destructor','dispinterface','div','do','downto',
                        'else','end','except','exports','external',
                        'file','finalization','finally','for','function',
                        'goto',
                        		'if','implementation','inherited','initialization','inline','interface','is',
                        'label','library','loop','message',
                        'mod',
                        'nil','not',
                        'object','of','or','out','overload','override',
                        		'packed','private','procedure','program','property','protected','public','published',
                        'raise','read','record','repeat','resourcestring',
                        'set','shl','shr','stdcall','string',
                        'then','threadvar','to','try','type','unit','until',
                        'use','uses',
                        'var','virtual','while',
                        'with','write',
                        'xor'
                    );
		$this->keywords['MotCle']['style'] = 'font-weight: bold';   //style CSS pour balise SPAN

		//************* liste des symboles *************
		$this->symboles = array('#','$','&','(','(.',')','*','+',',','-','.','.)','..',
                    '/',':',':=',';','<','<=','<>','=','>','>=','@','[',']','^');
		$this->symbolesStyle = '';

		//************* identifiants *************
		$this->identifier = array('[_A-Za-z]?[_A-Za-z0-9]+');
		$this->identStyle = '';

	}

    /**
    * renvois le code colorié
    *
    * @param $text string Texte a analyser
    * @return string texte colorié
    */
    function Analyse($text){
        $pattern = '`'.$this->_getPattern()."`$this->_patOpt";
        if (!$this->isCaseSensitiv){
            $pattern .= 'i';
        }
        $text = preg_replace_callback($pattern,array($this,'replacecallback'),$text);
        return $text;
    }
}    //class Hightlighter

/*
Demo:

include_once('formatters/hightlighter.class.inc');

$DH = new Hightlighter();
$DH->InitPascalRules();
echo "<pre>".$DH->Analyse($text)."</pre>";
unset($DH);

*/
?>
