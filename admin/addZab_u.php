<?
if(INSIDE){
	if(isset($_POST['addzab'])){
		$okk = true;
 $date = data();//date("l, F d Y H:i:s");
	$note = htmlspecialchars($_POST['note']);
	$predmetID = $_POST['predmetID'];
	$uchenikID = htmlspecialchars($_POST['uchenikID']);
	$userID = $id;//htmlspecialchars($_POST['userID']);	
	
	if($uchenikID == -9 && $okk){$okk = false;error("Изберете ученик!");}
	if($predmetID == -9 && $okk){$okk = false;error("Изберете предмет!");}
	if(strlen($note) < 1 && $okk){$okk = false;error("Въведете текст!");}
	
		if($okk){
	$q = mysql_query("INSERT INTO `notes` (
`id` ,
`note` ,
`predmetID`,
`date` ,
`uchenikID` ,
`userID`
)

VALUES (
NULL , '$note', '$predmetID', '$date', '$uchenikID', '$userID'
);
");

	if($q){wrn("Забележката добавена");}else{echo "BOOOM! ".mysql_error();}
	}else{
		// 10 NEVER
		// 20 GONNA
		// 30 HAPPEN
		// 40 GOTO 10
		}
		
		}//if isset stuff
	?>
<form method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
   <tr>
    		<td><label for="uchenikID">Ученик</label></td>
    		<td>
    				<select name="uchenikID" id="uchenikID" class="inp">
					<?=getStudents_list()?>
   						</select></td>
    		</tr>
  <tr>
  	<td>Предмет</td>
  	<td><select class="inp" name="predmetID" id="predmetID">
<?=getSubjs_list()?>
      </select></td>
  </tr>
    <tr>
      <td>Забележка</td>
      <td><textarea class="inp" name="note" cols="40" rows="10" id="note"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td><input class="inp" type="submit" name="addzab" id="addzab" value="Добави" /></td>
    </tr>
  </table>
  <br />
</form>
<br />
<?
}
else{
	echo "gtfo/";
	}

 ?>
