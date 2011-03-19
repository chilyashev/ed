<?
if(isset($_SERVER['HTTP_REFERER']) && INSIDE){
include "../conf/fnoc.php";
include "../inc/functions.php";

	?>
	<div id="titlebar" align="left">Добави оценка </div>
<form id="form1" name="form1" method="post" action="">
  <table width="36%" border="0" cellpadding="1" cellspacing="1">
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
      <td><input type="submit" name="addg" id="addg" value="Добави оценка" /></td>
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
