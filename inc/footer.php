</div>
<!-- #main --> 
<br />
<br />
<br />
<div id="footer">Copyleft, sasli<span style="float:right;"><?=$version?></span><br />

<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];

$tend = $mtime;
$totaltime = ($tend - $tstart);

printf ("Страницата зареди за %f секунди.", $totaltime);
ob_flush();
?> </div></div>
</div>
<!-- #content -->
</div>
<!-- #wrapper --> 
<br />
<br />
</body></html>