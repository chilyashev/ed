<?
if(isset($inside)){
?><form name="form1" method="post" action="">
  <p>Клас</p>
  <table width="80" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="74%"><sup>
        <input name="gore" type="text" class="inp" id="gore" size="4" maxlength="3" />
      </sup></td>
      
    </tr>
    <tr>
      <td><input name="name" type="text" class="inp" id="name" size="3" maxlength="2" /></td>
      <td width="74%">&nbsp;</td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td><input name="dolu" type="text" class="inp" id="dolu" size="4" maxlength="2" /></td>
    </tr>
  </table>
  <p><br>
    Специалност 
    <input class="inp" type="text" name="specialnost" id="specialnost">
    <br>
    <input type="submit" name="addClass" id="addClass" value="Добави">
  </p>
</form><br /><br />
<div id="help">
<?=getIcon("q.png", 16)?>Добавяне на родител<br />
<em>Полета:</em><br />
<strong>Клас</strong> - номерът на класа, долен и горен индекс. <small>(примери: 10<sub>7</sub><sup>г</sup>, 8<sub>д</sub>, 11)</small><br />
<strong>Специалност</strong> - специалността на паралелката<br />
</div>
<?


} //inside set
else{
	echo "GTFO!";
}//
?>
