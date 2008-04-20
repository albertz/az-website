<p>
<a href="?lang=de">Fuer die deutsche Version hier klicken.</a>
</p>

<h1>Description</h1>
<p>
This script basically shows the content of a directory with thumbnailed
versions of the included images or it shows different quality versions of an
image. The main intention was to be very fast and easy.
</p>

<p><b>Live Demonstration</b>:
<a href="http://www.az2000.de/pics">my picture collection</a></p>

<h1>Cache</h1>
<p>
The recent version also includes a caching system for the images. In the past,
the preview-image was always generated on-the-fly which is of course very
slow (imagine a directory with 100 pictures in it and on each request the
script had to generate 100 thumbnails).<br>
The PHP-script will save the generated preview-image in <i>/var/tmp/pics/</i>
at the moment, though you can easily change this. It generates the pictures
the first time you request it and uses the cache after (if it is not older
than the image).
</p>

<h1>Installation</h1>
<p>
I use some URL-rewrite-rules to map the URL (like ".../pics/finland/"
or "../pics/picture.jpg")
to the PHP-script. In <i>lighttpd</i>, these are the following rules:
</p>

<pre>
url.rewrite = (
    "^/pics/(.*)\?get" => "/pics/$1",
    "^/pics/(.*)/\?(.*)type=pic(.*)" => "/pics/pic.cml?dir=$1&$2$3",
    "^/pics/(.*)/\?(.*)" => "/pics/pics.php?dir=$1&$2",
    "^/pics/(.*)\?(.*)" => "/pics/pics.php?dir=$1&$2",
    "^/pics/(.*)" => "/pics/pics.php?dir=$1" )
</pre>

<p>In <i>Apache</i>, I use the following ruleset:</p>

<pre>
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule "^(.*/)?pics/(.*/)?$" "$1pics/pics.php?dir=$2" [last,QSA]

RewriteCond %{REQUEST_FILENAME} -d
RewriteRule "^/var/www/localhost/htdocs/(.*/)?pics/(.*)$" "/$1pics/$2/" [R,last,QSA]

RewriteCond %{QUERY_STRING} =get
RewriteRule "^(.*/)?pics/(.*)$" "$1pics/$2" [last]

RewriteCond %{REQUEST_FILENAME} !(.*)/pics.php
RewriteRule "^(.*/)?pics/(.*)$" "$1pics/pics.php?dir=$2" [last,QSA]
</pre>

<h1>mod_cml</h1>
<p>
I also use <i>mod_cml</i> as you can see from the rules. This increases
the speed a lot, especially in the case of a big amount of pictures in
a directory. The <i>pic.cml</i> script basically checks if there is
already a cached version of the requested image and if this is up-to-date
and in this case, it just returns this cached image. In all other cases
it runs the PHP-script.<br>
I have also added this routine in the PHP-script in case you don't want
to use <i>mod_cml</i> but though you want the use of the caches. Though
as I said, PHP is much slower by doing this and forwarding the data of
the cached image. It should be sufficient in the rewrite-rules to
replace "pic.cml" with "pics.php".
</p>

<h1>Downloads</h1>
<p>
<b>Source Code</b>:
<a href="http://www.az2000.de/viewvc/Website/pics/pics.php?view=markup">pics.php</a>
<a href="http://www.az2000.de/viewvc/Website/pics/pic.cml?view=markup">pic.cml</a>
</p>

