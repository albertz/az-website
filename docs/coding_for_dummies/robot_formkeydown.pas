procedure TMainForm.FormKeyDown(Sender: TObject; var Key: Word;
  Shift: TShiftState);
begin
  if Key = Ord('P') then
    SetPauseState(not MyPauseState)
  else
    SetPauseState(false);
    
  if not (ssCtrl in Shift) then // TODO: change to: nothing in Shift
  case Key of
  37: // left
  begin
    if MyFocus = fcRoom then MoveToPlace(mdLeft);
    if MyFocus = fcKnapsack then ChangeKnapsackSelection(mdLeft);
  end;
  39: // right
  begin
    if MyFocus = fcRoom then MoveToPlace(mdRight);
    if MyFocus = fcKnapsack then ChangeKnapsackSelection(mdRight);
  end;
  38: // up
  begin
    if MyFocus = fcRoom then MoveToPlace(mdUp);
    if MyFocus = fcKnapsack then ChangeKnapsackSelection(mdUp);
  end;
  40: // down
  begin
    if MyFocus = fcRoom then MoveToPlace(mdDown);
    if MyFocus = fcKnapsack then ChangeKnapsackSelection(mdDown);
  end;
  Ord(' '), 9: // space, tab
  begin
    ChangeFocus();
    DrawRoom();
    DrawKnapsack();
  end;
  13: // enter
  begin
    UseKnapsackSelection();
    SetFocus(fcRoom);
  end;
//  8, 46: // backspace, del
//  begin
//    MyKnapsack[MyKnapsackSelection].PicIndex := GetPictureCacheIndex(BACKGROUND_PIC);
//    DrawKnapsack();
//  end;
  else
//    WriteLn('pressed key: ' + IntToStr(Key));
  end;

  // only allow the following in editor mode
  if MyEditorMode then
  begin
    if ssCtrl in Shift then
    case Key of
    37: // left
      MoveToRoom(mdLeft);
    39: // right
      MoveToRoom(mdRight);
    38: // up
      MoveToRoom(mdUp);
    40: // down
      MoveToRoom(mdDown);
    end;
  end;
end;

