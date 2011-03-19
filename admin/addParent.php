<h2>&raquo;Добавяне на родител</h2><br /><br />
<?
	if(isset($_POST['reg'])){
		$okk = true;
		$date = data();
		$username = htmlspecialchars($_POST['username']);
		$pass = md5(htmlspecialchars($_POST['pass']));
		$pass_une = $_POST['pass'];
		$email = htmlspecialchars($_POST['email']);
		$name = htmlspecialchars($_POST['name']);
		$kidID = "";
		/*$test=$_POST['test'];
	if ($test){
	 foreach ($test as $t){echo 'You selected ',$t,'<br />';}
	}*/
	$kids=$_POST['kid'];
	if ($kids){
	 foreach ($kids as $t){$kidID .= $t.", ";}
	}
	$kidID = substr($kidID,0,-2);
		$confirm_code=md5(uniqid(rand())); 
		
if(strlen($username) <3){
error("Потребителското име трябва да е поне 3 символа", "", "660px");
$okk = false;
	}
if(userNameExists($username) && $okk){
error("Това потребителско име е заето.", "", "660px");	
$okk = false;
	}
if(strlen($pass_une) < 3 && $okk){
error("Паролата трябва да е поне 3 символа", "", "660px");
$okk = false;
}

if(strlen($email) < 3 && $okk){
error("Въведете имейл.", "", "660px");
$okk = false;

}
	$username = trim($username, " ");
if($okk){		
		
	$q = mysql_query("INSERT INTO `roditel` (
`id` ,
`username` ,
`password` ,
`email` ,
`name` ,
`kidID` ,
`date` ,
`state` )
VALUES (
NULL , '$username', '$pass', '$email', '$name', '$kidID', '$date', '1');");

if($q){
		wrn("<small>Потребителят добавен успешно</small>");
	}else{
	error("error:".mysql_error());
			}
		
		

		

		}
	}
		?>

<form method="post" action="">
		<table border="0" cellpadding="5" cellspacing="0">
				<tr>
						<td><label for="username">Потребителско име<span style="color:red;">*</span></label></td>
						<td><input name="username" type="text" class="inp" id="username" size="50" /></td>
				</tr>
				<tr>
						<td><label for="pass">Парола<span style="color:red;">*</span></label></td>
						<td><input class="inp" name="pass" type="password" id="pass" size="50" /></td>
				</tr>
				<tr>
						<td><label for="name">Име</label></td>
						<td><input class="inp" name="name" type="text" id="name" size="50" /></td>
				</tr>
				<tr>
						<td><label for="email">Имейл<span style="color:red;">*</span></label></td>
						<td><input class="inp" name="email" type="text" id="email" size="50" /></td>
				</tr>
				<tr>
						<td><label for="kid">Родител на<span style="color:red;">*</span></label></td>
						<td><select name="kid[]" size="10" multiple="multiple" id="kid[]" class="inp">
										<?=getStudents_list()?>
						</select></td>
				</tr>
				<tr><td><small>Полетата с <span style="color:red;">*</span> са задължителни</small></td><td>&nbsp;</td></tr>
				<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="reg" id="reg" value="Давай" /></td>
				</tr>
		</table></form><br />
<br />
<div id="help">
<?=getIcon("q.png", 16)?>Добавяне на родител<br />
<em>Полета:</em><br />
<strong>Потребителско име</strong> - името, което ще ползва родителят, за да влезе<br />
<strong>Парола</strong> - паролата, която ще използва<br />
<strong>Име</strong> - името на родителя<br />
<strong>Имейл</strong> - електронната поща на родителя<br />
<strong>Родител на</strong> - учениците, на които е родител<br />
</div>
