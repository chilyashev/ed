<?
if(defined(INSIDE)){
if(isset($_POST['addOption'])){
	$key = $_POST['key'];
	$value = $_POST['value'];
	 $q = mysql_query("INSERT INTO `option` (`id`, `key`, `value`)VALUES (NULL , '$key', '$value');");
	 if($q){
		 echo "опцията добавена.";
		 }else{echo "fail!";}
	}
	if(isset($_POST['save'])){
		$newtitle = htmlspecialchars($_POST['title']);
		$newmail = htmlspecialchars($_POST['email']);
		$newdirektor = htmlspecialchars($_POST['direktor']);
		$newaddress = nl2br(htmlspecialchars($_POST['address']));
		$newurl = htmlspecialchars($_POST['url']);
		$newphone = htmlspecialchars($_POST['phone']);
		if(update_option("title", $newtitle) && update_option("direktor", $newdirektor) && update_option("email", $newmail) && update_option("address", $newaddress) && update_option("url", $newurl) && update_option("phone", $newphone)){
		wrn("Промените запазени!");
		}
		}
?>
<form name="form1" method="post" action="<?="$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]"?>">
  <p>
  </p>
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="166"><label for="title">Име на училището</label></td>
      <td width="427"><input name="title" type="text" class="inp" id="title" value="<?=get_option("title");?>" size="50"></td>
    </tr>
    <tr>
      <td><label for="email">email на училището</label>&nbsp;</td>
      <td>
      <input name="email" type="text" class="inp" id="email" value="<?=get_option("email");?>" size="50"></td>
    </tr>
    <tr>
      <td><label for="direktor">Директор</label>&nbsp;</td>
      <td>
      <input name="direktor" type="text" class="inp" id="direktor" value="<?=get_option("direktor");?>" size="50"></td>
    </tr>
    <tr>
      <td><label for="url">Адрес на дневника</label>&nbsp;</td>
      <td>
      		<input name="url" type="text" class="inp" id="url" value="<?=get_option("url")?>" size="50" /></td>
    </tr>
    <tr>
      <td><label for="addres">Телефон</label>
      		&nbsp;</td>
      <td><input name="phone" type="text" class="inp" id="phone" value="<?=get_option("phone")?>" size="50" /></td>
    </tr>
	<tr>
      <td><label for="addres">Адрес</label>
      		&nbsp;</td>
      <td><textarea class="inp" name="address" cols="40" rows="6" id="address" ><?=preg_replace('/<br\\s*?\/??>/i', '', get_option("address"));?>
      </textarea></td>
    </tr>
    
	<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    		</tr>

      <td>&nbsp;</td>
      <td><input class="inp" type="submit" name="save" id="save" value="Запази промените"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <!--  <td>Добавяне на опция:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>  <label for="key">Ключ</label>
  </td>
      <td> <input class="inp" type="text" name="key" id="key">&nbsp;</td>
    </tr>
    <tr>
      <td><label for="value">Стойност</label>&nbsp;</td>
      <td><input class="inp" type="text" name="value" id="value">&nbsp;</td>
    </tr>
    <tr>
      <td><p>&nbsp;</p></td>
      <td><input class="inp" type="submit" name="addOption" id="addOption" value="Добавяне"></td>
    </tr>-->
  </table>
  <p>&nbsp;</p>
</form>


<div id="help">
<?=getIcon("q.png", 16)?>Тук можете да редактирате основните опции на дневника:<br />
<strong>Име на училището</strong> - името на училището <small>(пример: ПГСАГ "Ангел Попов", гр. Велико Търново)</small> <br />	
<strong>email на училището </strong> - електронният адрес за връзка на училището. <br />
<strong>Директор</strong> - името на директора. <small>(Полето е свободно, защото директорът може да не желае да ползва системата.)</small><br />
<strong>Адрес на дневника</strong> - Интернет адреса на страницата. Важно е това поле да е точно, защото иначе системата няма да работи. Адресът трябва да е <em>валиден</em> и да сочи към директорията, в която е инсталиран днвеника. Важно е да завършва с наклонена черта(<strong>/</strong>)!  <small>(пример: <em>http://address.com/dnevnik<strong>/</strong>)</em> </small><br />
<br />
<br />
 
</div>

<?
}
else{echo "gtfo";}
