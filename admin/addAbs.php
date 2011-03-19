<?
if(isset($_SERVER['HTTP_REFERER']) && INSIDE){
include "../conf/fnoc.php";
include "../inc/functions.php";

	?>
	<div id="titlebar" align="left">Добави отсъствие</div>
<form method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
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
      <td><input type="submit" name="addo" id="addo" value="Добави" /></td>
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
