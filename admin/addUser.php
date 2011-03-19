<?
if(isset($inside)){
?>
<h2>&raquo;Добавяне на ученик</h2><br /><br /><br />
<form name="form1" method="post" action="">
  <!--<p>/* TODO: Remove me <br />
    Потребителско име
<input class="inp" type="text" name="username" id="username">
    <br>
    Парола
    <input class="inp" type="password" name="pass" id="pass">
    */<br>
    <br>
    <br />
    <br />
    <br />
    <br>
    Ниво 
    <select class="inp" name="role" id="role">
      <option value="1">Ученик</option>
      <option value="2">Учител</option>
      <option value="0">Директор</option>
    </select>
<br>
  </p>-->
  <table border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td>Име<span style="color:red;">*</span></td>
      <td><input class="inp" name="name" type="text" id="name" size="50" /></td>
    </tr>
    <tr>
    		<td>Код</td>
    		<td><label for="pass"></label>
    				<input type="text" name="pass" id="pass" class="inp" /></td>
    		</tr>
    <tr>
      <td>ЕГН<span style="color:red;">*</span></td>
      <td><input class="inp" name="egn" type="text" id="egn" size="50" maxlength="10" /></td>
    </tr>
	 <td>Клас<span style="color:red;">*</span></td>
      <td><select class="inp" name="classID" id="classID">
        <?=getClasses_list()?>
      </select></td>
    </tr>
    <tr>
    		<td valign="top">Номер в клас<span style="color:red;">*</span></td>
    		<td><input class="inp" name="nomerVklas" type="text" id="nomerVklas" size="3" maxlength="3" /></td>
    		</tr>
    <tr>
    		<td valign="top">Адрес <span style="color:red;">*</span> </td>
    		<td><textarea name="address" cols="40" rows="6" class="inp" id="address"></textarea></td>
    		</tr>
    <tr>
    		<td><label for="email">Имейл</label></td>
    		<td><input name="email" type="text" class="inp" id="email" size="50" /></td>
    		</tr>
    <tr>
    		<td>&nbsp;</td>
    		<td><small>Полетата с <span style="color:red;">*</span> са задължителни</small></td>
    		</tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="inp" type="submit" name="add" id="add" value="Добави" /></td>
    </tr>
  </table>
</form><br />
<br />

<div id="help"><?=getIcon("q.png", 16)?>Добавяне на ученик<br />
<em>Полета:</em><br />
<strong>Име</strong> - името на ученика<br />
<strong>Код</strong> - кодът, който ученикът ще трябва да въведе, за да си види оценките<br />
<strong>ЕГН</strong> - ЕГН-то на учениика. Освен за индикация, то се използва и за вход<br />
<strong>Клас</strong> - класът на ученика<br />
<strong>Номер в клас</strong> - номерът на ученика в клас<br />
<strong>Адрес</strong> - адресът на ученика<br />
<strong>Имейл</strong> - електронната поща на ученика<br />
</div>
<?


} //inside set
else{
	echo "GTFO!";
}//
?>
