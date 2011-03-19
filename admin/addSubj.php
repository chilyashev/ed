<?
if(isset($inside)){
if(isset($_POST['addSubj'])){
	$name = htmlspecialchars(strip_tags($_POST['name']));
	$class = htmlspecialchars(strip_tags($_POST['class']));
	$userID = htmlspecialchars(strip_tags($_POST['userID']));
		$cl = getClassDetail("dolu", $class);

	$q = mysql_query("INSERT INTO `predmet` (
`id` ,

`name` ,
`class`,
`userID`
)

VALUES (
NULL , '$name', '$class', '$userID'
);
");
if($q){
	 wrn("\"$name\" добавен");
	 }else{echo "fail.".mysql_error();}
	}

?><form name="form1" method="post" action="">
  <table width="253" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="25%">Име      <small><span style="color:red;">*</span></small></td>
      <td width="70%"><input class="inp" type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Учител<small><span style="color:red;">*</span></small></td>
      <td><select class="inp" name="userID" id="userID">
      		<option value="-9">Изберете учител...</option>
	  <?
	  	$q = mysql_query("SELECT * FROM `user` WHERE `role`='0' OR `role` = '2'");
		while($r = mysql_fetch_array($q)){		
					echo "<option value=\"$r[id]\">$r[name]</option>\n";
		}
	  ?>
      		</select></td>
    </tr>
    <tr>
    		<td>Клас<small><span style="color:red;">*</span></small></td>
    		<td><select name="class" class="inp" id="class">
    				<?=getClasses_list()?>
    				</select></td>
    		</tr>
    <tr>
    		<td>&nbsp;</td>
    		<td><small>Полетата с <span style="color:red;">*</span> са задължителни</small></td>
    		</tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="inp" name="addSubj" id="addSubj" value="Добави" /></td>
    </tr>
  </table>
  <p><br>
  </p>
</form><br /><br />
<div id="help">
<?=getIcon("q.png", 16)?>Добавяне на родител<br />
<em>Полета:</em><br />
<strong>Име</strong> - името на предмета<br />
<strong>Учител</strong>	- учителят, който го преподава<br />
<strong>Клас</strong> - класът, който го изучава.
</div>
<?

} //inside set
else{
	echo "GTFO!";
}//
?>
