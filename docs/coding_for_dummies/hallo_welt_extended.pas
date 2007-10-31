program hallo_welt_extended;

// BubbleSort aus dem vorherigen Beispiel (nur mit char statt integer)
procedure BubbleSort(var list: array of char);
var
	x: char;
	i,j: integer;
begin
	for i := 0 to High(list) do
	begin
		for j := 0 to High(list)-1 do
		begin
	  		if list[j] > list[j+1] then
			begin
  				x := list[j];
  				list[j] := list[j+1];
  				list[j+1] := x;
			end;
		end;
	end;
end;


// Hauptprozedur
procedure main();
var
	zeichen: array[0..9] of char;
	i: integer;
begin
	// Eingabe
	write('Gib 10 Zeichen ein: ');
	for i := 0 to 9 do
	begin
		// lese Zeichen vom Benutzer ein
		read(zeichen[i]);
	end;


	// Ausgabe
	write('Du hast eingegeben: ');
	for i := 0 to 9 do
	begin
		// gib Zeichen einzeln aus
		write(zeichen[i]);
	end;
	writeln(''); // und noch einen Zeilenumbruch am Ende
	

	// Sortieren
	writeln('Wir sortieren nun...');
	BubbleSort(zeichen);


	// neue Ausgabe
	write('Fertig, das Ergebnis ist: ');
	for i := 0 to 9 do
	begin
		write(zeichen[i]);
	end;
	writeln('');

end;



// Hauptcode unseres Programms
begin
	// starte unsere Hauptprozedur
	main();

	// hier ist bereits nun das Ende des Programms
end.
