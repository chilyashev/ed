<?
if(INSIDE){

$c = "./";
include "inc/header.php";
if(isset($_POST['search'])){
	?>
	<script type="text/javascript">
	where("<a href='<?=get_option("url")?>'>Начало</a> &rarr; Търсене");
	</script>
<?
$search=$_POST["search"];
$result = mysql_query("SELECT * FROM `news` WHERE `body` LIKE '%$search%' OR `title` LIKE '%$search%' order by id desc");
//echo "SELECT * FROM `news` WHERE body LIKE '%$search%' OR `title` LIKE '%$search%' order by id desc";
$inw = "Новини";

echo "<h2>&raquo;Търсене за „<em>$search</em>“</h2> <small>(в $inw)</small>";
//getSearch($t, $search);
$results=mysql_num_rows($result);
 echo "<hr>";
if($results>0){

//grab al the content
$i=0;
//what($t, $esult, $i);  
while($r = mysql_fetch_array($result)){
	echo "<a href=\"".get_option("url")."?do=view&w=news&id=$r[id]\">$r[title]</a><small>".substr($r['body'],0,30)."...</small><br /><br />";
	}
	
	}//if results > 0
	else{
echo "<br><br>Нищо не е намерено.";
}
echo "<br /><br /><div id=\"sfooter\" align=\"left\" style=\"width:600px;border-top: 1px solid black\">Намерих <b>$results </b>".  (($results > 1) ? "резултата" : "резултат").".<br>";
echo "</div>";

}
else {getSearch("user");} 
}//if inside
else{
echo "403";
}

include "inc/footer.php";
?>


