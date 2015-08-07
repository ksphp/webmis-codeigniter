<div sytle="font-size: 12px;">
<p>
<h1>WebMIS</h1>
<p>WEBMIS is MVC framework based on the development of multi users, multi access solutions, integration of CodeMirror, TinyMCE, Chart, Jquery and other plug-ins!</p>
</p>
<p>
Home：<a href="http://www.ksphp.com/" target="_blank">www.ksphp.com</a><br/>
Docs：<a href="https://www.ksphp.com/docs/CodeIgniter.html" target="_blank">CodeIgniter Documentation</a><br/>
Online：<a href="http://webmis.ksphp.com/admin" target="_blank">webmis.ksphp.com/admin</a> [ Uname: webmis Passwd:ksphp.com ]
</p>
<p>
<h2>Install</h2>
<p>
1、Download：<a href="https://github.com/ksphp/codeigniter-webmis" target="_blank">https://github.com/ksphp/codeigniter-webmis</a><br/>
2、Browse ./install 
</p>
<h2>Hide index.php</h2>
<p><h3>1、Apache</h3></p>
<p>
Open rewrite<br>
[...]<br>
&nbsp;&nbsp;&nbsp;&nbsp;AllowOverride All<br>
&nbsp;&nbsp;&nbsp;&nbsp;Require all granted<br>
&nbsp;&nbsp;&nbsp;&nbsp;Options Indexes FollowSymLinks<br>
[...]
</p>
<p>
Linux/Unix/Mac：<br>
> a2enmod rewrite
</p>
<p>
Edit .htaccess <br><br>
</p>
<h3>2、Nginx</h3>
<p>
location / {<br>
&nbsp;&nbsp;&nbsp;&nbsp;#Hide index.php<br>
&nbsp;&nbsp;&nbsp;&nbsp;if (!-e $request_filename) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rewrite ^/(.*) /index.php last;<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
location /admin/ {<br>
&nbsp;&nbsp;&nbsp;&nbsp;#Hide index.php<br>
&nbsp;&nbsp;&nbsp;&nbsp;if (!-e $request_filename) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rewrite ^/admin/(.*) /admin/index.php last;<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
</p>
</div>
