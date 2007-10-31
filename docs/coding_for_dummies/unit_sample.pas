// Dateieinleitung fuer eine Unit
unit my_sample_unit;

// Beginn des Interface-Teils
interface

	// welche anderen Units brauche ich hier?
	uses
		my_other_unit, some_graphics_stuff;

	// ein paar Konstanten, die ich vielleicht brauche
	const
		PI = 3.1415;
		MIN_NEEDED_CPU_SPEED = 800; // MHz Angabe
		MENSCHEN : array[1..3] of string
			= ('Linus', 'Florian', 'Albert');
		{ ... }

	// ein paar eigene Variablentypen definieren
	type
		{ spaeter mehr zur eigenen Variablentypen ... }

	// hier noch irgendwelche Funktionen, aber ohne Code
	function BubbleSort(list: array of integer);
	{ ... weitere Funktionen hier ... }

	// ein paar globale Variablen
	var
		AnzahlSpieler: integer;
		txt1, txt2, txt3: string;
		{ ... }
		

// Beginn des Implementierungsteils
implementation

	// welche anderen Units brauche ich hier?
	uses
		super_mega_unit;

	// Code fuer die deklarierten Funktionen ...
	function BubbleSort(list: array of integer);
	begin
		{ ... }
	end;

	{ ... weitere Implementierungen der oben eingefuehrten Sachen ... }


// Beginn des Initialisierungscodes
initialization
	AnzahlSpieler := 0;
	txt1 := 'Hallo Welt';
	{ ... }

 
end. // Ende der Unit
