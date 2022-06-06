# mimeTypes
<p>PHP MIME Types tools</p>

<p>Get Apache MIME Types from official Apache file : <a href="http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types">http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types</a></p>

<h2>Get all Apache MIME Types</h2>
<p>Return an array</p>
<pre>
$mime_types = new mimeTypes();
var_dump($mime_types->get_all());
</pre>

<h2>Get extensions from specified MIME Type</h2>
<p>Return an array if exists else return null</p>
<pre>
$mime_types = new mimeTypes();
var_dump($mime_types->get_extensions("plain/text"));
</pre>
