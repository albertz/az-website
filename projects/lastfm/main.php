<b>patch:</b> <i>added_saving_and_event_support</i><br>
The patch adds the following features to the application:

<p>
Everything will be done in the local application directory. Under Linux this is
'~/.local/share/Last.fm' and under MacOSX, this is '~/Library/Application Support/Last.fm'.</p>

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

<p>The source patch is available for version 1.3.1.0, 1.3.2.13 and 1.4.1.57486
of lastfmplayer.</p>

<h2>Mac OS X</h2>

<p>I created also a patched MacOSX package. Download the <i>Last.fm-1.6.1.1337.dmg</i>. You can install it by simply opening the DMG and copying the Last.fm application to your applications directory.</p>

<p>Now for an easy setup (to actually let Last.fm save your songs), open a Terminal (under Applications / Utilities) and type the following:
<pre>
# download an easy onNewEvent script
mkdir -p ~/"Library/Application Support/Last.fm"
cd ~/"Library/Application Support/Last.fm"
curl "http://www.az2000.de/projects/lastfm/onNewEvent-simple" > onNewEvent
chmod +x onNewEvent

# create a link in your Music directory
cd ~/Music
ln -s ~/"Library/Application Support/Last.fm" LastFM
</pre>

Your Last.fm should be ready to save songs now. It will save all fully heard songs. You can browse all saved songs in your Music / LastFM directory. Don't touch the non-MP3 files there, they belong to Last.fm.
</p>

<br>

<p>If you want to compile Last.fm by yourself on MacOSX (<i>You don't need to do that. Do that only if you understand that fully.</i>), you need to install the Xcode developer tools and the Qt4 SDK. Then do something like the following:
<pre>
svn co svn://svn.audioscrobbler.net/clientside/Last.fm/tags/1.4.1.57486 lastfm
curl "http://www.az2000.de/projects/lastfm/1.4.1.57486-added_saving_and_event_support.patch" > lastfm.patch
curl "http://www.az2000.de/projects/lastfm/lastfm--build-release-osx.sh" > lastfm--build-release-osx.sh
curl "http://www.az2000.de/projects/lastfm/lastfm--add-Qt-to-bundle.sh" > lastfm--add-Qt-to-bundle.sh

chmod +x lastfm--build-release-osx.sh
chmod +x lastfm--add-Qt-to-bundle.sh

cd lastfm

patch -p1 --dry-run < ../lastfm-1.4.1.57486-added_saving_and_event_support.patch
# if dry-run was ok, then do it:
patch -p1 --dry-run < ../lastfm-1.4.1.57486-added_saving_and_event_support.patch

# now let's build everything:
../lastfm--build-release-osx.sh

# if that was successfull, you have the Last.fm-1.6.1.1337.dmg in lastfm/dist/
</pre>
</p>

<hr>

<h2>Download files</h2>
<?php ListFiles("."); ?>
<br>
<b>external Download-links to Last.fm</b>
<a href="http://static.last.fm/client/Linux/last.fm-1.3.1.0.src.tar.bz2">lastfmplayer-1.3.1.0</a>
<a href="http://cdn.last.fm/client/src/last.fm-1.3.2.13.src.tar.bz2">lastfmplayer-1.3.2.13</a>
<a href="http://cdn.last.fm/client/src/last.fm-1.4.1.57486.src.tar.bz2">lastfmplayer-1.4.1.57486</a>
