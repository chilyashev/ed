<?
include 'admheader.php';
?>

<?
if($ok && ($role == 0 || $role ==2) && is_numeric($_GET['id']) && $_GET['id'] > 0){
if(isset($_GET['w'])){
	switch($_GET['w']){
		case "stu";
if(isset($_GET['id'])){
	$uid = $_GET['id'];
	$urole = getStudentRole(getUsernameById($uid));
/*	echo $urole;*/
	?>
    <div style="width:100%;"><img src="<?=getSnimka($uid, "stu")?>" height="40px" /><div style="float:right"><?=getNameById($uid, 1)?></div></div><hr/>
<fieldset><legend>Информация за потребителя<a rel="tooltip" id="hlp" title="aaaaaaaaaaa"><img src="<?=get_option("url")?>img/q.png" /></a></legend> 
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
    <td><input name="snimka" type="text" class="inp" id="snimka" value="<?=getSnimka($uid)?>" size="50" /></td><td><?=getTooltip("Снимката на ученика. Приемат се <strong>JPG</strong>, <strong>PNG</strong> или <strong>GIF</strong> изображения.")?>// fixme</td>
  </tr>
    <td>dateReg</td>
    <td><?=getDateReg($uid)?>&nbsp;</td>
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
	$uid = $_GET['id'];
	echo getUserDetail("name", $uid);
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
				<td>
						<input name="snimka2" type="text" class="inp" id="snimka" value="<?=getUserDetail("snimka", $uid)?>" size="50" /></td>
		</tr>
		<tr>
				<td><label for="class">Класен на</label></td>
				<td><select name="class" class="inp" id="class">
       <?=getClasses_list(getClassID($uid))?>
    </select></td>
		</tr>
		<tr>
				<td><label for="role">Роля</label></td>
				<td><select name="role" class="inp" id="role">
						<option value="0">Директор</option>
						<option value="2">Учител</option>
</select></td>
		</tr>
		<tr>
				<td>dateReg</td>
				<td><?=getUserDetail("dateReg", $uid)?></td>
		</tr>
		<tr>
				<td width="24%">&nbsp;</td>
				<td width="76%">
						<p>
								<input name="save" type="submit" class="inp" id="save" value="save" />
								</p>
						<p>username 	password 	role 	name 	email 	snimka 	dateReg 	status 	classID&nbsp; </p></td>
		</tr>
</table>
</form>
<?
}//if isset id
break;//break t
default;
echo "a";
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
