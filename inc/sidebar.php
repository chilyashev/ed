

<div id="lmenu">

<div id="sdbrprfl">
<?
if($ok){
		switch ($role){
		case -9;//normalen login
		case 0;
		case 2;
	
		$role = getRole($_COOKIE['user']);
		$id = getID($_COOKIE['user']);
			$snimka = getUserDetail("snimka", $id);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" width=\"40\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" width=\"40\" />";
		}
		
		echo "$sn<strong>Здравей, </strong>" . getNamebyID($id, $role) . "! <br />";
		break; //break normal
		case 1;
		 $id = getIDbyEGN($_COOKIE['egn']);
		 $snimka = getStudentDetail("snimka", $id);
		$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\"  height=\"40\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"40\" /><br>";
		}
	echo "$sn" . getNamebyEGN($_COOKIE['egn']) . "<br /><br />";
break; // break egn


case 3;//normalen login
		$role = 3;
		$id = getID($_COOKIE['user'], "roditel");
		
		$snimka = getParentDetail("snimka", $id);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"40\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"40\" /><br>";
		}
 
		echo "$sn<strong>Здравей, </strong>" . getParentDetail("name", $id) . "! <a href=\"".get_option("url")."logout.php\">Изход</a><br />";
		break; //break normal
		
		default;
		echo 'error';
		break;
		}//switch role
	}

else{	
 
		}?>
</div><!-- profile -->
<br />
Добре дошли в електронния дневник на <?=get_option("title")?><br />

<ul>
<?
if($ok)
{
switch($role){//switch
case 0; //admin
case 2;?>
Вие можете да добавяте оценки, да променяте ученици...
<li><a href="<?=get_option("url")?>admin">Администрация</a></li>
<?
//break; // break 0

// //uchitel
break; //break 2 i 0
case 1; //uchenik
?>

Тук можете да проверите оценките си, отсъствията и забележките
etc, etc
<li><a href="<?=get_option("url")?>grades.php" id="grades">Оценки</a></li>
<li><a href="<?=get_option("url")?>abs.php" id="absp">Отсъствия</a></li>
<li><a href="<?=get_option("url")?>zab.php" id="zab">Забележки</a></li>

<?
break; //break 1
case 3; // roditel
?>
<?
break; //break 3
}//switch
echo "<li><a href=\"".get_option("url")."profile.php\" id=\"profil\">Профил</a></li>";
echo '<li><a href="'.get_option("url").'logout.php">Изход</a></li>';
}else{
echo '<li></li>';
	?>	<li><a href="admin/login.php">Вход за учители </a></li>
 		<li><a href="stulogin.php">Вход за ученици</a></li>
		<li><a href="rodlogin.php">Вход за родители</a></li>
		<li><a href="register.php">Регистрация</a></li>
	<?
	}
	?>
</ul>
<!--- 
 <hr />
<br />
Debug:<br />
role = <?=$role?><br />
id = <?=$id?><br />
ok = <?=$ok?><br />
$_COOKIE['user'] = <?=$_COOKIE["user"]?><br />
$_COOKIE['pass'] = <?=$_COOKIE["pass"]?><br />
$_COOKIE['egn'] = <?=$_COOKIE["egn"]?><br />

--->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div><!-- lmenu -->
