unit uMainForm;

{$mode objfpc}{$H+}

interface

uses
  Classes, SysUtils, LResources, Forms, Controls, Graphics, Dialogs, ExtCtrls,
  Buttons, GraphType, Crt, StrUtils, StdCtrls, ComCtrls, Menus
{$IFDEF win32}
  ,MMSystem
{$ENDIF}
  ;
  
const
  PICTURE_SIZE = // picture cache size
{$IFDEF win32}
    65; // windows needs more
{$ELSE}
    30; // i think, it's a good value...
{$ENDIF}

  BACKGROUND_PIC = 'hinter.bmp'; // used for resetting
  PLAYER_PICS: array[1..3] of string
               = ('figur.bmp', 'robot*.bmp', 'konig.bmp');
  ERROR_PIC = 'error.bmp'; // used for error-displaying
  
  WORLD_WIDTH = 5; // room count
  WORLD_HEIGHT = 4;
  ROOM_WIDTH = 20; // place count in a room
  ROOM_HEIGHT = 20;
  KNAPSACK_WIDTH = 10; // place count in the knapsack
  KNAPSACK_HEIGHT = 5;
  KNAPSACK_MAX = 27; // compatibility with Robot1 (9*3)
  
  COMPUTERCONTROL_INTERVAL = 750; // timer-interval for computer player control

type
  TRoomNum = record // world coord
    X: 1..WORLD_WIDTH;
    Y: 1..WORLD_HEIGHT;
  end;

  TPlaceNum = record // room coord
    X: 1..ROOM_WIDTH;
    Y: 1..ROOM_HEIGHT;
  end;

  TPlaceAbsNum = 1..(ROOM_WIDTH*ROOM_HEIGHT); // abs room-index
  TRoomAbsNum = 1..(WORLD_WIDTH*WORLD_HEIGHT); // abs place-index
  TKnapsackAbsNum = 1..(KNAPSACK_WIDTH*KNAPSACK_HEIGHT); // abs knapsack-index
  
  TPlace = record
    PicIndex: Integer; // index of TPictureCache
  end;
  TRoom = array[TPlaceAbsNum] of TPlace; // a hole room
  TWorld = array[TRoomAbsNum] of TRoom; // a hole world

  TPlayer = record
    Pos: TPlaceNum;
    PicIndex: Integer; // index of TPictureCache
  end;
  TPlayerList = array of TPlayer; // dyn array of players in the room
  TWorldPlayers = array[TRoomAbsNum] of TPlayerList; // all players in the world

  TKnapsack = array[TKnapsackAbsNum] of TPlace; // a knapsack

  TPictureCacheItem = record
    FileName: string;
    Picture: TBitmap; // picture cache
    ResizedPicture: TBitmap; // resized picture cache
  end;
  TPictureCache = array of TPictureCacheItem;

  TMoveDirection = (mdLeft, mdRight, mdUp, mdDown);

  TFocus = (fcRoom, fcKnapsack);

  TDiamondSet = record
    DiamondNr: Integer
  end;

  { TMainForm }

  TMainForm = class(TForm)
    GamePanel: TPanel;
    KnapsackPanel: TPanel;
	{ ... viele weitere Objekte auf der Form ... }
    ComputerPlayer: TTimer;
    // event handlers
    procedure ComputerPlayerTimer(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure FormDestroy(Sender: TObject);
    procedure FormKeyDown(Sender: TObject; var Key: Word; Shift: TShiftState);
    procedure FormPaint(Sender: TObject);
    procedure FormResize(Sender: TObject);
    procedure GamePanelClick(Sender: TObject);
    procedure GamePanelMouseDown(Sender: TOBject; Button: TMouseButton;
      Shift: TShiftState; X, Y: Integer);
    procedure GamePanelMouseMove(Sender: TObject; Shift: TShiftState; X,
      Y: Integer);
    procedure KnapsackPanelClick(Sender: TObject);
    procedure KnapsackPanelMouseDown(Sender: TOBject; Button: TMouseButton;
      Shift: TShiftState; X, Y: Integer);
    procedure mnuEditorLoadClick(Sender: TObject);
    procedure mnuEditorModeClick(Sender: TObject);
    procedure mnuEditorSaveClick(Sender: TObject);
    procedure mnuGameEndClick(Sender: TObject);
    procedure mnuGameLoadClick(Sender: TObject);
    procedure mnuGameNewClick(Sender: TObject);
    procedure mnuHelpAboutClick(Sender: TObject);
    procedure mnuHelpControlClick(Sender: TObject);
    procedure mnuHelpDescriptionClick(Sender: TObject);
    procedure mnuOptionsPauseClick(Sender: TObject);
    procedure mnuOptionsSoundClick(Sender: TObject);
  private
    { private declarations }
  public
    // gameplay
		// goto next room; return true, if succ
    function MoveToRoom(dir: TMoveDirection): boolean;
    function MoveToRoom(rnum: TRoomNum): boolean; // goto another room
    procedure MoveToPlace(dir: TMoveDirection); // move player
		// searchs the player; returns -1, if not found
    function GetMainPlayerIndex(): Integer;
    procedure KillRobots(); // kill all robots in act room
    procedure UseKnapsackSelection();
		// make 'intelligent' movements of all robots and the king
    procedure ControlComputerPlayers();
    
    // background stuff
    procedure InitGame();
    procedure RestartGame();
    procedure UnInitGame();
    procedure ResetRoomPic();
    procedure ResetKnapsackPic();
    procedure ResetWorld();
    procedure ResetKnapsack();
    procedure DrawRoom(); // updates MyRoomPic and GamePanel
    procedure DrawKnapsack(); // updates MyKnapsackPic and KnapsackPanel
    procedure DrawInfo(); // updates InfoPanel
    procedure ShowMsg(msg: string); // printed on MessageBar
    procedure ShowMsg(msgs: array of string); // like ShowMsg; select
											  // randomly a msg
    procedure LoadWorld(fname: string); // loads a hole world (sce-file)
    procedure SaveWorld(fname: string); // saves the hole world
    procedure LoadGame(fname: string); // loads a saved game (included world)
    procedure SaveGame(fname: string); // saves a game
    function ShowLoadGameDialog(): boolean; // returns true, if succ
    function ShowSaveGameDialog(): boolean; // returns true, if succ
    function GetPicture(fname: string): TBitmap; // load picture from cache/disk
    function GetPicture(index: Integer): TBitmap;
    function GetPictureName(index: Integer): string; // returns filename
    function GetPictureCacheIndex(fname: string): Integer;
    procedure ResetPictureResizedCache();
    procedure PlaySound(fname: string); // plays wave-file
		// get viewed place (with players)
    function GetPlace(room: TRoomAbsNum; pos: TPlaceNum): TPlace;
		// get viewed place (with players)
    function GetPlace(pos: TPlaceNum): TPlace;
		// returns picture filename
    function GetPlacePicName(pos: TPlaceNum): string;
    procedure SetPlace(pos: TPlaceNum; p: TPlace); // set room place
		// sets picture filename
    procedure SetPlacePicName(pos: TPlaceNum; pname: string);
    procedure ResetPlace(pos: TPlaceNum);
    function AddPlayer(room: TRoomAbsNum; pos: TPlaceNum;
		picindex: Integer): Integer; // returns index
    function AddPlayer(room: TRoomAbsNum; pos: TPlaceNum;
		picname: string): Integer; // returns index
    procedure RemovePlayer(room: TRoomAbsNum; index: Integer);
    procedure RemovePlayer(room: TRoomAbsNum; pos: TPlaceNum);
    function MovePlayer(oldroom: TRoomAbsNum; oldindex: Integer;
		newroom: TRoomAbsNum; newpos: TPlaceNum): Integer; // returns new index
    function IsPlayerInRoom(picname: string): boolean;
    procedure ResetPlayerList();
    function IsPosInsideRoom(x,y: Integer): boolean;
    function AddToKnapsack(picindex: Integer): boolean; // returns true, if succ
    function AddToKnapsack(picname: string): boolean; // returns true, if succ
    function IsInKnapsack(picname: string): boolean;
    procedure ChangeKnapsackSelection(dir: TMoveDirection);
    procedure AddScores(num: Integer);
    procedure AddLife();
    function RemoveLife(): boolean; // returns true, if still alive
    procedure SetFocus(f: TFocus);
    procedure ChangeFocus();
    procedure SetPauseState(s: boolean);
    Procedure CopyRect(DstCanvas: TCanvas; const Dest: TRect;
		SrcCanvas: TCanvas; const Source: TRect);
                       
    MyWorld: TWorld; // the world
    MyWorldPlayers: TWorldPlayers; // all players
    MyRoomNum: TRoomNum; // selected room of my world
    MyRoomPic: record // user view
                 Room: TRoom; // room actually viewed
                 Picture: TBitmap; // paint cache
               end;
    MyKnapsack: TKnapsack; // the knapsack
    MyEditorKnapsack: TKnapsack; // the knapsack used in editor mode
    MyKnapsackPic: record // user view
                     Knapsack: TKnapsack; // knapsack actually viewed
                     Selection: TKnapsackAbsNum; // selection act viewed
                     Picture: TBitmap; // paint cache
                   end;
    MyKnapsackSelection: TKnapsackAbsNum; // selected item in the knapsack
    MyFocus: TFocus;
    MyPictureCache: TPictureCache; // cache of all graphics in the game
    MyLife: Integer; // lifes
    MyScores: Integer; // scores
    MyDiamonds: array of TDiamondSet; // set diamoonds
    MyPauseState: boolean; // true -> pause
    MySoundState: boolean; // false -> mute
    MyEditorMode: boolean; // true -> editmodus on
  end;

  function RoomNum(X,Y: Integer): TRoomNum;
  function PlaceNum(X,Y: Integer): TPlaceNum;
  function Place(picindex: Integer): TPlace;
  function Player(picindex: Integer; pos: TPlaceNum): TPlayer;
  function GetAbs(rnum: TRoomNum): TRoomAbsNum; // coord -> abs index
  function GetAbs(pnum: TPlaceNum): TPlaceAbsNum; // coord -> abs index
  function GetNumR(absnum: TRoomAbsNum): TRoomNum; // abs index -> coord
  function GetNumP(absnum: TPlaceAbsNum): TPlaceNum; // abs index -> coord

var
  MainForm: TMainForm;

implementation

function RoomNum(X,Y: Integer): TRoomNum;
begin
  RoomNum.X := X;
  RoomNum.Y := Y;
end;

function PlaceNum(X,Y: Integer): TPlaceNum;
begin
  PlaceNum.X := X;
  PlaceNum.Y := Y;
end;

{ ... und die ganze restliche, eigentlich wichtige und entscheidende Implementierung ... }

initialization
  {$I umainform.lrs}

end.

