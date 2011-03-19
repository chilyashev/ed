<?
$c="./";
include "inc/header.php";	
if(!$ok){echo "Нямате право да сте тук без да сте влезли";goHome();}else{
switch($role){
	case 0:
	case 2:
	$name = getUserDetail("name", $id);
	$email = getUserDetail("email", $id);
	$snimka = getUserDetail("snimka", $id);
	$predmetID = getUserDetail("predmetID", $id);
	$classID = getUserDetail("classID", $id);
		$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
		echo "<h2>&raquo;Профил на $name<br><br></h2>";

		$okk = true;
		$changepass = false;
		if(isset($_POST['sp'])){
			$newname = htmlspecialchars(strip_tags($_POST['name']));
			$newmail = htmlspecialchars(strip_tags($_POST['email']));
			$newpass = htmlspecialchars(strip_tags($_POST['newpass']));
			$newpasscnfrm = htmlspecialchars(strip_tags($_POST['newpasscnfrm']));
			if(strlen($newpass) > 0){
				if(strlen($newpass) <3){
				error("Паролата трябва да е поне 3 символа!", "", "600px");
				$okk = false;
				}else{
					if($newpass != $newpasscnfrm){
						error("Паролите не съвпадат!", "", "600px");
						$okk = false;
						}else{
								$changepass = true;
							}
				}
			}//if pass > 0
			if($okk){
				if($changepass){
					$newpass = md5($newpass);
				$q = mysql_query("UPDATE `user` SET `password` = '$newpass',
`email` = '$newmail',
`name` = '$newname' WHERE `id` = $id;");
				}else{
					$q = mysql_query("UPDATE `user` SET `email` = '$newmail',
`name` = '$newname' WHERE `id` =$id;");
					}
					if($q){
						if($changepass){
							gol("admin/login.php");
							}else{
								gol($_SERVER["REQUEST_URI"]."?message=0");
								
								}
						
						}
						else{error("error: ".mysql_error());}
				}
		
				else{/*нишо не правим*/}
		}
	?>

		<form method="post" action="">
<table width="660" border="0" cellspacing="0" cellpadding="5">
		<tr>
				<td width="231">
						<label for="name">Име</label></td>
				<td width="429"><input name="name" type="text" class="inp" id="name" value="<?=$name?>" size="50"></td>
		</tr>
		<tr>
				<td><label for="email">Имейл</label></td>
				<td><input name="email" type="text" class="inp" id="email" value="<?=$email?>" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td>Снимка</td>
				<td>
				<?=$sn;?>
				 <small><a href="changeavatar.php">смени</a></small></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td><label for="newpass">Нова парола</label></td>
				<td><input name="newpass" type="password" class="inp" id="newpass" size="50"></td>
		</tr>
		<tr>
				<td><label for="newpasscnfrm">Потвърди паролата</label></td>
				<td><input name="newpasscnfrm" type="password" class="inp" id="newpasscnfrm" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="sp" id="sp" value="Запази промените"></td>
		</tr>
</table>
</form>
		<?
	break;
	
	case 1:
	
	$name = getStudentDetail("ime", $id);
	$egn = getStudentDetail("egn", $id);
	$address = getStudentDetail("address", $id);
	$email = getStudentDetail("email", $id);
	$nomerVklas = getStudentDetail("nomerVklas", $id);
	$classID = getStudentDetail("classID", $id);
	$snimka = getStudentDetail("snimka", $id);
		$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
	?>
	<h2>&raquo;Профил на <?=$name?><br><br></h2>
	<form method="post" action="">
<table width="660" border="0" cellspacing="0" cellpadding="5">
		<tr>
				<td width="231">
						<label for="name">Име</label></td>
				<td width="429"><input name="name" type="text" class="inp" id="name" value="<?=$name?>" size="50" readonly="readonly"></td>
		</tr>
		<tr>
				<td><label for="email">Имейл</label></td>
				<td><input name="email" type="text" class="inp" id="email" value="<?=$email?>" size="50" readonly="readonly"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td>Снимка</td>
				<td>
				<?=$sn;?>
				 <small><a href="changeavatar.php">смени</a></small></td>
		</tr>

		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
</table>
</form>
		<?
	break;




	case 3;	
	
	$name = getParentDetail("name", $id);
	$email = getParentDetail("email", $id);
	$snimka = getParentDetail("snimka", $id);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" /><br>";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
		$okk = true;
		$changepass = false;
		if(isset($_POST['sp'])){
			$newname = htmlspecialchars(strip_tags($_POST['name']));
			$newmail = htmlspecialchars(strip_tags($_POST['email']));
			$newpass = htmlspecialchars(strip_tags($_POST['newpass']));
			$newpasscnfrm = htmlspecialchars(strip_tags($_POST['newpasscnfrm']));
			if(strlen($newpass) > 0){
				if(strlen($newpass) <3){
				error("Паролата трябва да е поне 3 символа!", "", "600px");
				$okk = false;
				}else{
					if($newpass != $newpasscnfrm){
						error("Паролите не съвпадат!", "", "600px");
						$okk = false;
						}else{
								$changepass = true;
							}
				}
			}//if pass > 0
			if($okk){
				if($changepass){
					$newpass = md5($newpass);
				$q = mysql_query("UPDATE `roditel` SET `password` = '$newpass',
`email` = '$newmail',
`name` = '$newname' WHERE `roditel`.`id` =$id;");
				}else{
					$q = mysql_query("UPDATE `roditel` SET `email` = '$newmail',
`name` = '$newname' WHERE `roditel`.`id` =$id;");
					}
					
										if($q){
						if($changepass){
							gol("rodlogin.php");
							}else{
								gol($_SERVER["REQUEST_URI"]."?message=0");
								
								}
						
						}
						else{
							error("error: ".mysql_error());
						}
				
					
				}
		
				else{/*нишо не правим*/}
		}
	?>
	<h2>&raquo;Профил на <?=$name?><br><br></h2>

		<form method="post" action="">
<table width="660" border="0" cellspacing="0" cellpadding="5">
		<tr>
				<td width="231">
						<label for="name">Име</label></td>
				<td width="429"><input name="name" type="text" class="inp" id="name" value="<?=$name?>" size="50"></td>
		</tr>
		<tr>
				<td><label for="email">Имейл</label></td>
				<td><input name="email" type="text" class="inp" id="email" value="<?=$email?>" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td>Снимка</td>
				<td>
				<?=$sn;?>
				 <small><a href="changeavatar.php">смени</a></small></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		</tr>
		<tr>
				<td><label for="newpass">Нова парола</label></td>
				<td><input name="newpass" type="password" class="inp" id="newpass" size="50"></td>
		</tr>
		<tr>
				<td><label for="newpasscnfrm">Потвърди паролата</label></td>
				<td><input name="newpasscnfrm" type="password" class="inp" id="newpasscnfrm" size="50"></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="sp" id="sp" value="Запази промените"></td>
		</tr>
</table>
</form>
		<?
	break;
}// switch role
}// if !ok
?>
</p>
</div> <!-- #main -->
<?
include "inc/footer.php";
?></div><!-- #content -->
</div> <!-- #wrapper -->
<br />
<br />
</body>
</html>
