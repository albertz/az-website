procedure BubbleSort(var list: array of Integer);
var
	x,i,j: Integer;
begin
	for i := 0 to High(list) do				{1}
	begin
		for j := 0 to High(list)-1 do			{2}
		begin
	  		if list[j] > list[j+1] then		{3}
			begin
  				x := list[j];			{4}
  				list[j] := list[j+1];		{5}
  				list[j+1] := x;			{6}
			end;
		end;
	end;
end;
