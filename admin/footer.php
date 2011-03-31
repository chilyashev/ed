<!-- /content -->
</div>
<div class="footer">Powered by ed <?=$version?> 

<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];

$tend = $mtime;
$totaltime = ($tend - $tstart);

printf ("Страницата зареди за %f секунди.", $totaltime);
ob_flush();
?>
     <!-- /footer --></div>
  <!-- /container --></div>
</body>
</html>
