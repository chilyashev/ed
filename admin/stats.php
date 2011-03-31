<?
include "admheader.php";
include_once 'stats/ofc-library/open_flash_chart_object.php';
?>
<h2>&raquo;Статистики</h2><br />
<br /><br />
<script type="text/javascript">actadmlink("#stats")</script>

<!--<table width="" border="0" cellspacing="0" cellpadding="0">
		<?
		/*for($i = 6; $i > 1;$i--){
$q = mysql_query("SELECT * FROM `ocenka` WHERE `value` like '$i%'");
while($r = mysql_fetch_array($q)){
	
	}
		echo"
			<tr style=\"border-bottom:1px;\">
				<td width=\"100px\">$i</td>
				<td>".((cnt("ocenka", "WHERE `value` like '$i%'") / cnt("ocenka"))*100)."%</td>
		</tr>
			";
			}*/
			
		?>
</table>-->
<?
open_flash_chart_object( 460, 250, get_option("url").'admin/stats/ocenki.php', false );
open_flash_chart_object( 360, 250, get_option("url").'admin/stats/ocenkip.php', false );
echo "<br /><br />";
open_flash_chart_object( 250, 250, get_option("url").'admin/stats/abs.php', false );

?>
<?
include "footer.php";
?>a
