<?
include 'admheader.php';
?>

<script type="text/javascript">
where("<a href=\"index.php\">Начало</a> -> <a href=\"/<?=get_option("url")?>admin/\">Администрация</a> - > Редактиране на клас");
</script>
 <?
if($ok && ($role == 0 || $role ==2)){

if(isset($_GET['id'])){
	$cid = $_GET['id'];
	?>
    <div style="width:100%;"><h2>&raquo;Редактиране на <?=getFullClassName($cid)?></h2></div><br />
<br />

             <form action="" method="post"> 
<table width="80" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%">&nbsp;</td>
        <td width="74%"><sup>
          <input name="gore" type="text" class="inp" id="gore" value="<?=getClassDetail("gore", $cid)?>" size="4" maxlength="2" />
        </sup></td>
      </tr>
      <tr>
        <td><input name="name" type="text" class="inp" id="name" value="<?=getClassDetail("name", $cid)?>" size="3" maxlength="2" /></td>
        <td width="74%">&nbsp;</td>
      </tr>
      <tr>
        <td width="3%">&nbsp;</td>
        <td><input name="dolu" type="text" class="inp" id="dolu" value="<?=getClassDetail("dolu", $cid)?>" size="4" maxlength="3" /></td>
      </tr>
    </table>
  <p><br>
      Специалност
      <input class="inp" type="text" name="specialnost" id="specialnost" value="<?=getClassDetail("specialnost", $cid)?>" s>
    </p>
    <input type="submit" name="save" id="save" value="{SAVE_CHANGES}" />
    </form>
    <br />
	<div>
	<fieldset class="titled">
	<legend>Ученици</legend>
	<?=getClassStudents($cid);?>
	</fieldset>
	</div>


    <?
	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$dolu = $_POST['dolu'];
		$gore = $_POST['gore'];
		$specialnost = $_POST['specialnost'];
	$q = mysql_query("UPDATE `class` SET `name` = '$name',
`dolu` = '$dolu',
`gore` = '$gore',
`specialnost` = '$specialnost' WHERE `class`.`id` =$cid;");

	if($q){echo "<meta http-equiv=\"refresh\" content=\"0;URL=".get_option("url")."admin/?do=view&w=classes\">";}else{echo "fail.";}
	}

	echo "<br />
<br />
<br />
<br />
<br />
<br />
";
	
	
	
	
}// if is set id
}
else{
	echo "No right to be here, GTFO.";
	}

?>
<br />
<br />
<br />


	<?
	include "footer.php";
	?>

