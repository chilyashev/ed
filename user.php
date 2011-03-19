<?
$c="./";
include "inc/header.php";
?><script type="text/javascript">
if(window.location.href.indexOf('page') >=0){
}else{
actlink("#home");
}
</script>
<br />
<?
if(isset($_GET['w'])){
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
$w = $_GET['w'];
$uid = $_GET['id'];

switch($w){
case "teach";
$q = mysql_query("SELECT * FROM `user` WHERE `id` = $uid");
if(mysql_num_rows($q) <1){error("Няма такъв потребител", 0, "660px");}else{
$mail = getUserDetail("email", $uid);
$predmetID = getUserDetail("predmetID", $uid);
$classID = getUserDetail("classID", $uid);
$class = getFullClassName($classID);
$predmet = getSubjDetail("name", $predmetID);

echo <<<tbl
<table width="660" border="0">
tbl;
echo "<tr style=\"border-bottom:1px solid black;\"><td width=\"101\"><img src=\"img/userpics/".getSnimka($uid, "teach")."\" height=\"100px\"/></td><td align=\"left\" valign=\"middle\" ><h2>".getUserDetail("name", $uid)."</h2></td></tr>";
if(strlen($mail) > 1){
echo "<tr><td>&nbsp;</td></tr><tr><td>Имейл:</td><td>$mail</td> </tr>";
}
if($predmetID> 0){
echo "<tr><td>&nbsp;</td></tr><tr><td>Учител по:</td><td>$predmet</td> </tr>";
}
if($classID > 0){
echo "<tr><td>&nbsp;</td></tr><tr><td>Класен на:</td><td>$class</td> </tr>";
}
echo "</table>";
}//else die
break; //break teach

case "stu";
$mail = getStudentDetail("email", $uid);
$classID = getStudentDetail("classID", $uid);
$class = getFullClassName($classID);

echo <<<tbl
<table width="660" border="0">
tbl;
echo "<tr style=\"border-bottom:1px solid black;\"><td width=\"101\"><img src=\"img/userpics/".getSnimka($uid, "stu")."\" height=\"100px\"/></td><td align=\"left\" valign=\"middle\" ><h2>".getStudentDetail("ime", $uid)."</h2></td></tr>";
if(strlen($mail) > 1){
echo "<tr><td>&nbsp;</td></tr><tr><td>Имейл:</td><td>$mail</td> </tr>";
}

if($classID > 0){
echo "<tr><td>&nbsp;</td></tr><tr><td>Клас:</td><td>$class</td> </tr>";
}
echo "</table>";
break;

}//switch 
}// id check

}//if isset w
else{
echo "<script>gol(\"".get_option("url")."\")</script>";
}//else isset w







?>
</div> <!-- #main -->
<?
include "inc/footer.php";
?></div><!-- #content -->
</div> <!-- #wrapper -->
<br />
<br />
</body>
</html>
