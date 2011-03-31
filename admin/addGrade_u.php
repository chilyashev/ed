<?
if(INSIDE){
	?>
<form method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
  <?
  	if(isset($_POST['addgr'])){
		$okk = true;
	$date = data();//date("l, F d Y H:i:s");
	$val = htmlspecialchars($_POST['val']);
	$predmetID = htmlspecialchars($_POST['predmetID']);
	$opisanie = htmlspecialchars($_POST['opisanie']);	
	$uchenikID = htmlspecialchars($_POST['uchenikID']);	
	if($uchenikID == -9 && $okk){$okk = false;error("Изберете ученик!");}
	if($predmetID == -9 && $okk){$okk = false;error("Изберете предмет!");}
	if(!is_numeric($val) && $okk){$okk = false;error("Невалидна стойност на оценката!");}
	if($okk){
	$q = mysql_query("INSERT INTO `ocenka` (
`id` ,
`value` ,
`predmetID` ,
`opisanie` ,
`date` ,
`uchenikID`
)
VALUES (
NULL , '$val', '$predmetID', '$opisanie', '$date', '$uchenikID'
);
");
//echo "$val $predmetID $opisanie $uchenikID";
	if($q){wrn("Оценката добавена");}else{echo "err";}
}else{
	echo "err";
	}
		}
  ?>
    <tr>
    		<td><label for="uchenikID">Ученик</label></td>
    		<td>
    				<select name="uchenikID" id="uchenikID" class="inp">
					<?=getStudents_list()?>
   						</select></td>
    		</tr>
    <tr>
    		<td>Предмет</td>
    		<td><select name="predmetID" id="predmetID" class="inp">
    				<?=getSubjs_list()?>
    				</select></td>
    		</tr>
    <tr>
      <td width="50%">Оценка</td>
      <td width="50%"><input class="inp" type="text" name="val" id="val" /></td>
    </tr>
   <!-- <tr>
      <td>Предмет</td>
      <td>
        <select name="predmetID" id="predmetID">
         <?=getSubjs_list()?>
      </select></td>
    </tr>-->
    <tr>
      <td>Описание</td>
      <td><textarea class="inp" name="opisanie" cols="40" rows="10" id="opisanie"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="inp" type="submit" name="addgr" id="addgr" value="Добави оценка" /></td>
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
