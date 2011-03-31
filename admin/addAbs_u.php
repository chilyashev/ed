<?
if(INSIDE){
	if(isset($_POST['addou'])){
		$okk = true;
	$date = data();//date("l, F d Y H:i:s");
	$type = htmlspecialchars($_POST['type']);
	$predmetID = -9; //FIX ME  //htmlspecialchars($_POST['predmetID']);	
	$uchenikID = htmlspecialchars($_POST['uchenikID']);	
	$opisanie = htmlspecialchars($_POST['opisanie']);
	if($uchenikID == -9){$okk = false;error("Изберете ученик!");}
	if($okk){	
	$q = mysql_query("INSERT INTO `otsastvie` (
`id` ,
`type` ,
`opisanie`,
`date` ,
`predmetID` ,
`uchenikID`
)
VALUES (
NULL , '$type', '$opisanie', '$date', '$predmetID', '$uchenikID'
);
");
	if($q){wrn("Отсъствието добавено.");}else{error("BOOOM! ".mysql_error());}

	}else{
		// or else what?
		}
		//exactly
	}//if isset addou
	?>
<form method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
    <tr>
    		<td>Ученик</td>
    		<td><select name="uchenikID" id="uchenikID" class="inp">
					<?=getStudents_list()?>
   						</select>&nbsp;</td>
    		</tr>
    <tr>
      <td width="50%">Вид</td>
      <td width="50%"><select class="inp" name="type" id="type">
        <option value="0">Неизвинено</option>
        <option value="1">Извинено</option>
      </select></td>
    </tr>
    <tr>
      <td>Описание</td>
      <td><textarea class="inp" name="opisanie" cols="40" rows="10" id="opisanie"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" class="inp" name="addou" id="addou" value="Добави" /></td>
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
