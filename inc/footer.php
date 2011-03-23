</div>
<!-- #main --> 
<br />
<br />
<br />
<div id="footer">
<p style="font-size: 0.81em;"><a href="<?=get_option("url")?>">Начало</a> <a href="contacts.php">Контакти</a> <a href="tools.php">Инструменти</a></p>
<p style="font-size: 0.8em; text-align:center;">Powered by Електронен дневник <?=$version?><br />
© <a href="http://chilyashev.com" target="_blank">Mihail Chilyashev</a> 2011<br />
<?
$endtime = microtime();
$endarray = explode(" ", $endtime);
$endtime = $endarray[1] + $endarray[0];
$totaltime = ($endtime - $starttime);
$totaltime = round($totaltime,6);
printf("Страницата зареди за %f секунди.", $totaltime);
ob_flush();
?> </p></div></div>
</div>
<!-- #content -->
</div>
<!-- #wrapper --> 
<br />
<br />
</body></html>