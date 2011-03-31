<!-- /content -->
</div>
<div class="footer"><small><a href="<?=get_option("url")?>">Назад към сайта</a><br />
Powered by ed <?=$version?> </small>

<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];

$tend = $mtime;
$totaltime = ($tend - $tstart);

printf ("<small>Страницата зареди за %f секунди.</small>", $totaltime);
ob_flush();
?>
     <!-- /footer --></div>
  <!-- /container --></div>
</body>
</html>
