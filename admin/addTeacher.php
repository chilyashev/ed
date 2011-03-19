<?
if(INSIDE && $ok){
echo "<h2>&raquo;Добавяне на учител</h2><br />";

if(isset($_POST['addteach'])){
$okk = true;
$date = data();
$username = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['pass']);
$name = htmlspecialchars($_POST['name']);
$mail = htmlspecialchars($_POST['mail']);
$predmetID = $_POST['predmetID'];
$classID = $_POST['classID'];

if(strlen($username) < 3){error("Потребителското име трябва да е поне 3 символа!");$okk=false;}
if(userNameExists($username) && $okk){error("Потребител с такова потребителско име вече съществува!");$okk=false;}
if(strlen($pass) < 3 && $okk){error("Паролата трябва да е поне 3 символа!");$okk=false;}
if(strlen($name) < 3 && $okk){error("Името трябва да е поне 3 символа!");$okk=false;}
if(strlen($mail) < 3 && $okk){error("Невалиден имейл!");$okk=false;}
if($predmetID < 1 && $okk){error("Изберете предмет!");$okk=false;}
if($classID < 1 && $okk){error("Изберете клас!");$okk=false;}


if($okk){
$pass = md5($pass);
$q = mysql_query("INSERT INTO `user` (
`id` ,
`username` ,
`password` ,
`role` ,
`name` ,
`email` ,
`snimka` ,
`dateReg` ,
`predmetID` ,
`approved` ,
`classID`
)
VALUES (
NULL , '$username', '$pass', '2', '$name', '$mail', '', '$date' , '$predmetID', '1', '$classID');");

}//if okk

}
?>

<form method="post" action="">
	
<br>
  </p>
  <table border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td>Потребителско име<span style="color:red;">*</span></td><td><input class="inp" type="text" name="username" id="username"  size="50" ></td>
  </tr><tr>
    <td>Парола<span style="color:red;">*</span></td><td><input class="inp" type="password" name="pass" id="pass"  size="50" ></td></tr>
    <tr>
      <td>Име<span style="color:red;">*</span></td>
      <td><input class="inp" name="name" type="text" id="name" size="50" /></td>
    </tr>
    <tr>
      <td>Имейл<span style="color:red;">*</span></td>
      <td><input class="inp" name="mail" type="text" id="mail" size="50" /></td>
    </tr>
        	<tr>
      <td>Учител по<span style="color:red;">*</span></td>
      <td><select class="inp" name="predmetID" id="predmetID">
        <?=getSubjs_list()?>
      </select></td>
    </tr>
    	<tr>
      <td>Клас<span style="color:red;">*</span></td>
      <td><select class="inp" name="classID" id="classID">
        <?=getClasses_list()?>
      </select></td>
    </tr>
    	<tr>
    			<td>&nbsp;</td>
    			<td><small>Полетата с <span style="color:red;">*</span> са задължителни</small></td>
    			</tr>
    	<tr>
      <td>&nbsp;</td>
      <td><input class="inp" type="submit" name="addteach" id="addteach" value="Добави" /></td>
    </tr>
  </table>
</form><br />
<br />
<div id="help"><?=getIcon("q.png", 16)?>Добавяне на учител<br />
<em>Полета:</em><br />
<strong>Потребителско име</strong> - името, което учителят ще ползва, за да влезе в системата<br />
<strong>Парола</strong> - паролата, която учителят ще ползва, за да влезе в системата<br />
<strong>Име</strong> - името на учителя<br />
<strong>Имейл</strong> - електронната поща на учителя<br />
<strong>Учител по</strong> - предметът, по който преподава учителят<br />
<strong>Клас</strong> - класът, на който е класен<br />

</div>
<?


} //inside set
else{
	echo "GTFO!";
}//
?>
