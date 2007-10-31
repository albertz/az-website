unit uRecordBeispiel;

interface
type

TMeinNeuerTyp = record
	Caption: string;
	Top, Left: integer;
	Width, Height: integer;
	Value: real;
	MeineForm: TForm1;
	{ ... }
end;

{ ... }

implementation

procedure TuWasMitNeuemTyp();
var
	stueck: TMeinNeuerTyp;
	wert: real;
begin
	wert := 42;

	stueck.Caption := 'Wilfried';
	stueck.Top := 0;
	stueck.Value := wert;

	// wir gehen davon aus, dass Form1 eine Variable vom Typ TForm1 ist
	stueck.MeineForm := Form1;

	stueck.MeineForm.Caption := 'Form von Wilfried';
	stueck.MeineForm.Top := stueck.Top;

	// wir gehen davon aus, dass TForm1 ein Label1 hat
	stueck.MeineForm.Label1.Caption := 'Hallo Welt';
end;

{ ... }

end.
