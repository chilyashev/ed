<?
include 'admheader.php';

$uid = (isset($_GET['id']))? $_GET['id']:"";
echo "<script>setID($uid)</script>";
if($ok && ($role == 0 || $role ==2) && is_numeric($_GET['id']) && $_GET['id'] > 0){
if(isset($_GET['w'])){
	switch($_GET['w']){
		case "stu";
		$snimka = getStudentDetail("snimka", $uid);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
if(isset($_GET['id'])){
	$uid = $_GET['id'];
	$urole = getStudentRole(getUsernameById($uid));
/*	echo $urole;*/
	?>
    <div style="width:100%;"><img src="<?=getSnimka($uid, "stu")?>" height="40px" /><div style="float:right"><?=getNameById($uid, 1)?></div></div><hr/>
<fieldset><legend>Информация за потребителя</legend> 
<table width="" border="0" cellspacing="1" cellpadding="1" style="vertical-align:top;float:left">
     <form action="<?="$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]"?>" method="post"><tr>
    <td>Име</td>
    <td><input name="name" type="text" class="inp" id="name" value="<?=getNameById($uid, 1)?>" size="50" /> </td><td><?=getTooltip("Името на ученика. <br />Собствено, бащино и фамилно.")?></td>
    </tr>
  <tr>
    <td>ЕГН</td>
    <td>
      <input name="egn" type="text" class="inp" id="egn" value="<?=getEGN($uid)?>" size="50" maxlength="10" /></td><td><?=getTooltip("Единен Граждански Номер на ученика.<br />Трябва да е валидно ЕГН.")?></td>
    </tr>
  <tr>
    <td>Клас</td>
    <td><select name="class" class="inp" id="class">
       <?=getClasses_list(getClassID($uid))?>
    </select></td><td><?=getTooltip("Класът на ученика")?></td>
  </tr>
  <tr>
  <td>Адрес</td>
  <td valign="top"><textarea name="address" cols="45" rows="6" class="inp" id="address"><?=getStudentDetail("address", $uid)?></textarea></td><td valign="top"><?=getTooltip("Адресът на ученика.<br /> Добре е форматът на адреса на всички ученици да бъде еднакъв.")?></td>
  </tr>
  <tr>
  <td><label for="email">Имейл</label></td>
  <td> 
  		<input name="email" type="text" class="inp" id="email" value="<?=getStudentDetail("email", $uid)?>" size="50" /></td><td><?=getTooltip("Електронната поща на ученика.<br />Това поле приема само валидни имейли от типа на <strong>'<em>email@domain.com</em>'</strong>, където <em>domain.com</em> трябва да е съществуващ домейн.<br />Пример: uchenik@abv.bg")?></td>
  </tr>
  <tr>
    <td>Номер в клас</td>
    <td>
      <input name="nomer" type="text" class="inp" id="nomer" value="<?=getStudentDetail("nomerVklas", $uid)?>" size="50" maxlength="2" /></td><td><?=getTooltip("Номерът на ученика в клас.")?></td>
    </tr>
  <tr>
    <td>Снимка</td>
    <td><?=$sn?>

<a href="changeAvatar.php?t=stu&id=<?=$uid?>">смени</a></td><td><?=getTooltip("Снимката на ученика. Приемат се <strong>JPG</strong>, <strong>PNG</strong> или <strong>GIF</strong> изображения.")?></td>
  </tr>
   
  <tr style="background:#C6C6C6;text-align:right;">
    <td>&nbsp;</td>
	<input type="hidden" id="uid" value="<?=$uid?>"/>
    <td><input class="inp" type="submit" name="saveStu" id="saveStu" value="Запази промените" /></td>
    <td>&nbsp;</td>
  </tr><br />
</form></table>
</fieldset>
<br />
<div style="/*float:right*/">
<fieldset>
<legend>Оценки</legend>
<?
echo getGrades_e($uid, 0);?>
<div id="editGrade" style="display:none"></div>
</fieldset>
<br />
<fieldset>
<legend>Отсъствия <? echo "<a id=\"addAbs\" href=\"$uid\"><img src=\"".get_option("url")."img/add.png\"/></a><br />";?></legend>
<?=getAbs($uid, 0)?>
</fieldset>
<br />
<fieldset>
<legend>Забележки  <? echo "<a id=\"addNotes\" href=\"$uid\"><img src=\"".get_option("url")."img/add.png\"/></a><br />";?></legend>
<?=getNotes($uid, 0)?>
</fieldset>
</div>

	<?	 
}// if is set id


break;//break u
case "teach";
if(isset($_GET['id'])){
	$okk = true;
	$chpass = false;
	$uid = $_GET['id'];
	$snimka = getUserDetail("snimka", $uid);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
	echo "<h2>&raquo; Профил на ".getUserDetail("name", $uid)."</h2><br /><br />";
	if(isset($_POST['saveT'])){
			$username = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['pass']);
$name = htmlspecialchars($_POST['name']);
$mail = htmlspecialchars($_POST['email']);
$predmetID = $_POST['predmetID'];
$classID = $_POST['classID'];

if(strlen($username) < 3){error("Потребителското име трябва да е поне 3 символа!");$okk=false;}
if(strlen($pass) >= 3 && $okk){$chpass = true;}
if(strlen($pass) < 3 && $okk && $chpass){error("Паролата трябва да е поне 3 символа!");$okk=false;}
if(strlen($name) < 3 && $okk && $chpass){error("Името трябва да е поне 3 символа!");$okk=false;}
if(strlen($mail) < 3 && $okk){error("Невалиден имейл!");$okk=false;}
//if($predmetID < 1 && $okk){error("Изберете предмет!");$okk=false;}
//if($classID < 1 && $okk){error("Изберете клас!");$okk=false;}



if($chpass){
$pass = md5($pass);
$q = mysql_query("UPDATE `user` SET `username` = '$username',
`password` = '$pass',
`name` = '$name',
`email` = '$mail',
`predmetID` = '$predmetID',
`classID` = '$classID' WHERE `id` =$uid;");
}//chpass
else{
$q = mysql_query("UPDATE `user` SET `username` = '$username',
`name` = '$name',
`email` = '$mail',
`predmetID` = '$predmetID',
`classID` = '$classID' WHERE `user`.`id` =$uid;");

}//else chpass
if($q){wrn("Промените запазени!");}else{}

	}
?>
 <form method="post" action="">
	<table width="100%" border="0" cellspacing="5" cellpadding="5" style="float:left;">
		<tr>
				<td>Име</td>
				<td><input name="name" type="text" class="inp" id="name" value="<?=getUserDetail("name", $uid)?>" size="50" /></td>
		</tr>
		<tr>
				<td><label for="username">Потребителско име</label></td>
				<td><input name="username" type="text" class="inp" id="username" value="<?=getUserDetail("username", $uid)?>" size="50" /></td>
		</tr>
		<tr>
				<td><label for="pass">Парола</label></td>
				<td><input name="pass" type="text" class="inp" id="pass" size="50" /></td>
		</tr>
		<tr>
				<td><label for="email">Имейл</label></td>
				<td><input name="email" type="text" class="inp" id="email" value="<?=getUserDetail("email", $uid)?>" size="50" /></td>
		</tr>
		<tr>
				<td><label for="snimka">Снимка</label>&nbsp;</td>
				<td><?=$sn?><a href="changeAvatar.php?t=teach&id=<?=$uid?>">смени</a></td>
		</tr>
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
				<td width="24%">&nbsp;</td>
				<td width="76%">
						<p>
								<input name="saveT" type="submit" class="inp" id="saveT" value="Запази промените" />
								</p>
						</td>
		</tr>
</table>
</form>
<?
}//if isset id
break;//break t

case "par";
	$name = getParentDetail("name", $uid);
	$email = getParentDetail("email", $uid);
	$snimka = getParentDetail("snimka", $uid);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
		$okk = true;
		$changepass = false;
		if(isset($_POST['sp'])){
			$newname = htmlspecialchars(strip_tags($_POST['name']));
			$newmail = htmlspecialchars(strip_tags($_POST['email']));
			$newpass = htmlspecialchars(strip_tags($_POST['newpass']));
			$newpasscnfrm = htmlspecialchars(strip_tags($_POST['newpasscnfrm']));
			$kids = getParentDetail("kidID", $uid);
			$kids_e = explode(", ", $kids);
			if(strlen($newpass) > 0){
				if(strlen($newpass) <3){
				error("Паролата трябва да е поне 3 символа!");
				$okk = false;
				}else{
					if($newpass != $newpasscnfrm){
						error("Паролите не съвпадат!");
						$okk = false;
						}else{
								$changepass = true;
							}
				}
			}//if pass > 0
			if($okk){
				if($changepass){
					$newpass = md5($newpass);
				$q = mysql_query("UPDATE `roditel` SET `password` = '$newpass',
`email` = '$newmail',
`name` = '$newname' WHERE `roditel`.`id` =$uid;");
				}else{
					$q = mysql_query("UPDATE `roditel` SET `email` = '$newmail',
`name` = '$newname' WHERE `roditel`.`id` =$uid;");
					}
					
										if($q){	gol($_SERVER["REQUEST_URI"]."&message=0"); }
						else{
							error("error: ".mysql_error());
						}
				
					
				}
		
				else{/*нищо не правим*/}
		}
	?>
	<h2>&raquo;Профил на <?=$name?><br><br></h2>

		<form method="post" action="">
<table width="660" border="0" cellspacing="0" cellpadding="5">
		<tr>
				<td width="231">
						<label for="name">Име</label></td>
				<td width="429"><input name="name" type="text" class="inp" id="name" value="<?=$name?>" size="50"></td>
		</tr>
		<tr>
				<td><label for="email">Имейл</label></td>
				<td><input name="email" type="text" class="inp" id="email" value="<?=$email?>" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td>Снимка</td>
				<td>
				<?=$sn;?>
				 <small><a href="changeAvatar.php?t=par&id=<?=$uid?>">смени</a></small></td>
		</tr>
		<tr>
				<td>Родител на<?="<a class=\"addS\" href=\"$kids\" id=\"$uid\" rel=\"tooltip\" title=\"Добавяне на ученик\">".getIcon("add.png", 16)."</a>";?></td>
				<td>
				<?
				foreach ($kids_e as $t){
				$kids = getParentDetail("kidID", $uid);
			$kids_e = explode(", ", $kids);
					echo getStudentDetail("ime", $t)."<a class=\"rmStu\" id=\"$uid\" href=\"$t\" rel=\"$kids\" >".getIcon("delete.png", 16)."</a><br />";
				}				
				?>
				<br />
					<div id="addSdiv" style="display:none;background:#E3E3E3;width:250px;"><a href="#" id="closeAddS" style="float:right">[X]</a>
					<form method="post">
					<select name="uchenikID" id="uchenikID" class="inp"><?=getStudents_list(1)?></select>
					<input type="submit" id="<?=$uid?>" href="<?=$kids?>" rel="" class="doAddS" value="Добави">
   					</form>
   					</div>
				</td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td><label for="newpass">Нова парола</label></td>
				<td><input name="newpass" type="password" class="inp" id="newpass" size="50"></td>
		</tr>
		<tr>
				<td><label for="newpasscnfrm">Потвърди паролата</label></td>
				<td><input name="newpasscnfrm" type="password" class="inp" id="newpasscnfrm" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="sp" id="sp" value="Запази промените"></td>
		</tr>
</table>
</form>
<?
break; //break par

default;
echo "not gonna happen";
break;//

	}//swich w
	}//if isset w
}
else{
error("Несъществуващ ученик.");
if($role == 1){
echo "no right to be here";
die();
}else if(!$ok){
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	}
}
?>
	<?
	include "footer.php";
	?>
