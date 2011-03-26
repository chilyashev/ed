<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ed « Инсталация</title>
</head>

<body>
<?
function getURL($url) {
    $qmark = strpos($url, '?');
    if ($qmark) {
      $url = substr($url, 0, $qmark);
    }
    $lastSlash = (strrpos($url, '/'));
    return substr($url, 0, ($lastSlash + 1));
  }


if(isset($_POST['save'])){
	$okk = true;
	$host = $_POST['host'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$url = getURL((!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
$url = str_replace("install/", "", $url);
$title = $_POST['title'];
$mail = $_POST['email'];
	$db = $_POST['db'];
	if(!mysql_connect($host, $user, $pass) || !mysql_select_db($db)){
		 echo("Грешка при свързването: ".mysql_error());
		 $okk = false;
	}

	if($okk){
	$f = "../conf/fnoc.php";
$fh = fopen($f, 'w+') or die("Файлът не може да се отвори.");
$data = '<?
error_reporting(E_ALL);
ini_set("display_errors", 1); 
//nastroiki
$version = "v 1.66b (2010-03-16 00:36)";
include "data.php";
###### glavni ######
$global = array();
$global[\'sqlserver\'] = "'.$host.'";
global $ok, $role, $id;
###### /glavni #######

###### sql #######
$sql = array();
$sql[\'host\'] = "'.$host.'";
$sql[\'user\'] = "'.$user.'";
$sql[\'pass\'] = "'.$pass.'";
$sql[\'db_prefix\'] = ""; //в следващата версия...
$sql[\'db\'] = $sql[\'db_prefix\']."'.$db.'";
###### /sql ######
mysql_connect($sql[\'host\'], $sql[\'user\'], $sql[\'pass\']) or die("Error connecting to mysql: ".mysql_error());
mysql_select_db($sql[\'db\']) or die("Error selecting db: ".mysql_error());
define("INSIDE", "true");
define("PATH", getcwd());
?>
';
fwrite($fh, $data);
fclose($fh);






///sql inserts
$q = mysql("DROP TABLE `class` ,
`files` ,
`news` ,
`notes` ,
`ocenka` ,
`option` ,
`otsastvie` ,
`page` ,
`predmet` ,
`roditel` ,
`uchenik` ,
`user` ;
");
$f = "sql.sql";
$fh = fopen($f, 'r') or die("Грешка при отварянето на SQL файла");

$sql = explode(";",file_get_contents($f));// 
fclose($fh);
foreach($sql as $q)
 mysql_query($q);// or die(mysql_error());

$q = mysql_query("INSERT INTO `option` (`id` ,`key` ,`value`)VALUES (NULL , 'url', '$url');");
$q = mysql_query("INSERT INTO `option` (`id` ,`key` ,`value`)VALUES (NULL , 'title', '$title');");
$q = mysql_query("INSERT INTO `option` (`id` ,`key` ,`value`)VALUES (NULL , 'email', '$mail');");
/*$q = mysql_query("INSERT INTO `option` (`id`, `key`, `value`) VALUES
(NULL, 'headfgcolor', '000000'),
(NULL, 'headcolor', '0093DD'),
(NULL, 'email', 'gmail@chucknorris.com'),
(NULL, 'address', 'address<br />\r\n'),
(NULL, 'direktor', 'direktor'),
(NULL, 'logo', 'logo.png'),
(NULL, 'phone', '+35912345678910');");*/
$p = md5("admin");
//$q = mysql_query("
//INSERT INTO `user` (`id`, `username`, `password`, `role`, `name`, `email`, `snimka`, `dateReg`, `predmetID`, `approved`, `classID`) VALUES
//(NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'Administrator', 'admin@nowhere.com', '', '16 ???? 2011 01:41:04', -9, 1, -9)");

if($q){
	$ok = true;
	}else{echo "here".mysql_error();$ok = false;}
	}//if okk
	}
?>
<form method="post">
<table width="960" border="0" cellspacing="0" cellpadding="5" align="center">
		<tr>
				<td height="103" colspan="2" align="center" bgcolor="#0099FF"><h2>Електронен дневник - инсталация</h2></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td colspan="2">Стъпка 1 - SQL<??><hr /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td colspan="2"><?if($ok){echo "<span style=\"color:green\">Инсталацията мина успешно. Можете да видите новоинсталирания дневник <a href=\"$url\">тук</a>. Използвайте потребителско име <i>admin</i> и парола <i>admin</i>, за да влезете в системата.
<br>
Изтрийте install.php, за да можете да ползвате системата сигурно!</span>";}?></td>
		</tr><tr bgcolor="#D9DEFF">
				<td width="480">SQL <hr /></td>
				<td width="480">&nbsp;</td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Сървър</td>
				<td><input type="text" name="host" id="host" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Потребител</td>
				<td><input type="text" name="user" id="user" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Парола</td>
				<td><input type="password" name="pass" id="pass" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>База </td>
				<td><label for="db"></label>
						<input type="text" name="db" id="db" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Данни за училището
						<hr /></td>
				<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Име на училището</td>
				<td><label for="title"></label>
						<input name="title" type="text" id="title" value="testschool" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>Имейл</td>
				<td><label for="email"></label>
						<input name="email" type="text" id="email" value="gmail@chucknorris.com" /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td>&nbsp;</td>
				<td><input type="submit" name="save" id="save" value="Инсталирай..." /></td>
		</tr>
		<tr bgcolor="#D9DEFF">
				<td width="480">&nbsp;</td>
				<td width="480">&nbsp;</td>
		</tr>
		
</table>
</form>
<?
// един празен ред за suspens:

?>
</body>
</html>
