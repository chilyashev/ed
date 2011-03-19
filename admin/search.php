<?
if(INSIDE){
include "admheader.php";
include "search.bc.php";
if(isset($_POST['search']) && isset($_GET['t'])){
$search=$_POST["search"];
$t = $_GET['t'];


switch($t){
case "subjs";
$result = mysql_query("SELECT * FROM `predmet` WHERE name LIKE '%$search%' order by id desc");
$inw = "Предмети";
break;
case "classes";
$result = mysql_query("SELECT * FROM `class` WHERE name LIKE '%$search%' order by id desc");
$inw = "Класове";
break;
case "user";
$result = mysql_query("SELECT * FROM `user` WHERE name LIKE '%$search%' order by id desc");
$inw = "Учители";
break;
case "roditel";
$result = mysql_query("SELECT * FROM `roditel` WHERE name LIKE '%$search%' order by id desc");
$inw = "Родители";
break; // break roditel
case "uchenik";
$result = mysql_query("SELECT * FROM `uchenik` WHERE ime LIKE '%$search%' order by id desc");
$inw = "Ученици";
break; // break uchenik
default;
echo 'err';
break;
}//switch t
echo "<h2>Търсене за „<em>$search</em>“</h2> <small>(в $inw)</small>";
getSearch($t, $search);
$results=mysql_num_rows($result);
if($results>0){
 echo "<hr>";
}else{
echo "<br><br>Нищо не е намерено.";
}
//grab al the content
$i=0;
what($t, $result, $i);  

echo "<br /><br /><div id=\"footer\" align=\"left\" style=\"border-top: 1px solid black\">Намерих <b>$results </b>".  (($results > 1) ? "резултата" : "резултат").".<br>";
echo "</div>";

}
else {getSearch("user");} 
}//if inside
else{
echo "403";
}
?>

</div>
