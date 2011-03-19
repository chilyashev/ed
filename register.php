<?
$c="./";
include "inc/header.php";
echo "<h2>&raquo;Регистрация</h2><br /><br />";
if($ok){goHome();}else{
	
	if(isset($_POST['reg'])){
		$okk = true;
		$date = data();
		$username = htmlspecialchars($_POST['username']);
		$pass = md5(htmlspecialchars($_POST['pass']));
		$pass_une = $_POST['pass'];
		$email = htmlspecialchars($_POST['email']);
		$name = htmlspecialchars($_POST['name']);
		$kidID = $_POST['kid'];
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
`state` ,
`passkey`
)
VALUES (
NULL , '$username', '$pass', '$email', '$name', '$kidID', '$date', '0', '$confirm_code'
);
");
 
// subject
$subject="Регистрацията Ви в електронния дневник на".get_option("title");

// From
$header="From: ed-admin";

// message
$message="Здравейте, \r\n";
$message="Вие се регистрирахте в електронния дневник на ".get_option("title"). "  \r\n";
$message.="За да можете да проверявате информацията на детето си в системата, трябва да бъдете одобрени от учител.\r\n";
$message.="Ако това не стане до няколко часа, свържете се с класния ръководител на детето Ви.\r\n\r\n";
$message.="Данни за вход:\r\n\r\n";
$message.="Потребителско име: <em>$username</em>\r\n";
$message.="Парола: <em>$pass_une</em>\r\n";
// send email
$sentmail = mail($email, $subject, $message, $header);
if($sentmail && $q){
		wrn("<small>Регистрацията беше успешна!<br />Имейл с данни за вход е изпратен на имейла ви (<em>$email</em>)</small>"," ", "660px");
	}else{
		if($q){ // даваме шанс да се регистрира, въпреки неуспешното пращане на мейла.
		wrn("<small>Регистрацията премина успешно, но не можа да бъде изпратен имейл.</small>", "", "660px");		
		}
		}
		
		

		

		}
		
		}//okk
		else {//?err?
		}
?>

<form method="post" action="">
		<table border="0" align="center" cellpadding="5" cellspacing="0">
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
						<td><select name="kid" id="kid">
								
								<?=getStudents_list()?>
						</select></td>
				</tr>
				<tr><td><small>Полетата с <span style="color:red;">*</span> са задължителни</small></td><td>&nbsp;</td></tr>
				<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="reg" id="reg" value="Регистрирай се" /></td>
				</tr>
		</table></form>
<?
}//else ok
include "inc/footer.php";
?>
