<b>patch:</b> <i>added_saving_and_event_support</i><br>
The patch adds the following features to the application:

<p>
Everything will be done in the local application directory. Under Linux this is
'~/.local/share/Last.fm'.</p>

<p>
- When a new track is started, the file (in the app-dir as said) 'onNewEvent'
will be executed with the parameters 'newtrack: "$artist" - "$songname"'.<br>
- When a track is over (no skipping or stop), the file 'onNewEvent' will be
executed with the parameters 'endtrack: "$artist" - "$songname"'. If the
return-code of the script is 0 (the default) then the track will be saved (in
this dir) as a MP3 "$artist - $songname.mp3". ID3V1-tags will also be included
into the file. If 'onNewEvent' is not available or not executable, the MP3 will
not be saved.<br></p>

<p>
That means, the application only behaves different if you create an executable
file called 'onNewEvent' in the local application directory. Then, if it is
just an empty executable file, you will get all songs saved as MP3s (but only
the songs you listen to till the end; songs you skip aren't saved). You can
also use the script for example to set your message in your instant messanger
or you can save a log with all played songs or something like this.</p>

The patch is available for version 1.3.1.0 and 1.3.2.13 of lastfmplayer.<br>
Download lastfmplayer-1.3.1.0: http://static.last.fm/client/Linux/last.fm-1.3.1.0.src.tar.bz2<br>
Download lastfmplayer-1.3.2.13: http://cdn.last.fm/client/src/last.fm-1.3.2.13.src.tar.bz2
