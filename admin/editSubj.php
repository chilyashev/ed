<?
include "admheader.php";
echo "<h2>&raquo; Промяна на предмет</h2><br /><br />";
	if(isset($_POST['saveSubj'])){
		$name = htmlspecialchars($_POST['name']);
		$class = $_POST['class'];
		$userID = $_POST['userID'];
		$q = mysql_query("UPDATE `predmet` SET `name` = '$name', `class` = '$class', `userID` = '$userID' WHERE `id` =$_GET[id];");
if($q){wrn("Промените запазени успешно!");}else{echo "fail";}
	
	}
?>
<form name="news" method="post" action="">
		<table width="253" border="0" cellpadding="5" cellspacing="5">
				<tr>
						<td width="25%">Име </td>
						<td width="70%"><input name="name" type="text" class="inp" id="name" value="<?=getSubjDetail("name", $_GET['id'])?>" /></td>
				</tr>
				<tr>
						<td>Учител</td>
						<td><select class="inp" name="userID" id="userID">
								<option value="-9">Изберете учител...</option>
								<?
	  	$q = mysql_query("SELECT * FROM `user` WHERE `role`='0' OR `role` = '2'");
		while($r = mysql_fetch_array($q)){		
						if(getSubjDetail("userID", $_GET['id']) == $r['id']){
					echo "<option value=\"$r[id]\" selected=\"selected\">>$r[name]</option>\n";
						}else{
					echo "<option value=\"$r[id]\">$r[name]</option>\n";
							}
		}
	  ?>
						</select></td>
				</tr>
				<tr>
						<td>Клас</td>
						<td><select name="class" class="inp" id="class">
								<?=getClasses_list(getSubjDetail("class", $_GET['id']))?>
						</select></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td><input type="submit" class="inp" name="saveSubj" id="saveSubj" value="Запази" /></td>
				</tr>
		</table>
</form>

<br />
<br />
<br />


	<?
	include "footer.php";
	?>
