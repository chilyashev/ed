</div>
<!-- #main --> 
<br />
<br />
<br />
<div id="footer">
<p style="font-size: 0.8em;">Powered by Електронен дневник <?=$version?><br />
© <a href="http://chilyashev.com" target="_blank">Mihail Chilyashev</a> 2011<br />
<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];

$tend = $mtime;
$totaltime = ($tend - $tstart);

printf ("Страницата зареди за %f секунди.", $totaltime);
ob_flush();
?> </p></div></div>
</div>
<!-- #content -->
</div>
<!-- #wrapper --> 
<br />
<br />
</body></html>