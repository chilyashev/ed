<?
if(isset($_SERVER['HTTP_REFERER']) && INSIDE){
include "../conf/fnoc.php";
include "../inc/functions.php";

	?>
	<div id="titlebar" align="left">Добави забележка</div>
<form method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
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
      <td><input type="submit" name="addn" id="addn" value="Добави" /></td>
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
