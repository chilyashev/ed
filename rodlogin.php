<?
ob_start();
$c="./";
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
include $c."conf/fnoc.php";
include $c."inc/functions.php";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=get_option("title");?> &laquo; Администрация</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" />	
</head>
<body>
<!--[if IE 6]>
<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0pt 0.7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span> 
					Използвате стар браузър. Заради това няма да можете да се насладите на сайта както иска дизайнерът му. Вземете истински браузър, ползвайте <a href="http://getfirefox.com">Firefox</a>!</p>
				</div>

			</div>
<![endif]-->
<div id="nazad"> <a href="<?=get_option("url")?>">&larr; Назад към сайта</a></div>
<div id="wrapper">
<div id="content">
<div id="main">


 <form id="loginfrm" method="post" action="">
 <div align="center"><img src='<?=get_option("url")."/img/logo/".get_option("logo");?>' height="100"/></div>
  <?
 if(isset($_POST['login'])){
	$username = htmlspecialchars($_POST['username']);
	$pass = md5(htmlspecialchars($_POST['pass']));
	$role = 0;
	$realpass = "";
	$role = -9;
	$q = mysql_query("SELECT * FROM `roditel` WHERE `username` = '$username' AND `state` = 1");
	while($r = mysql_fetch_array($q)){
		//username 	pass 	
		$realpass = $r['password'];
		$role = $r['role'];
		$realname = $r['username'];
		$rn = $realname;
		}

			if($pass != $realpass || $username != $realname){
				error("Грешно име или парола! Опитайте пак.", 1);
				}
			else{
				echo "ok";
				$ok = 1;
				$expire=time()+60*60*24*30;
				setcookie("user", "$username", $expire, "/");
				setcookie("pass", "$pass", $expire, "/");
 				echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
 
				}//veche moje da vleze

		}
		?>
  <label for="username">Име:</label>
  <input  type="text" name="username" id="username" />
  <br />
  <label for="pass">Парола: </label>
  <input type="password" name="pass" id="pass" />
  <br />
  <input type="checkbox" name="nemezabravqi" class="nemezabravqi" id="nemezabravqi" />
  <label for="nemezabravqi">Запомни ме</label><br />
  	<input 	type="submit" name="login" id="loginbtn" value="Влез" />
  <br />
  
 </form> 
<!-- </div> login -->



</div> <!-- #main -->
</div><!-- #content -->
</div> <!-- #wrapper -->


<script type="text/javascript">
function uname_focus(){
setTimeout( function(){ try{
d = document.getElementById('username');
d.value = '';
d.focus();
} catch(e){/* vse edno nqkoga shte stane :D */}
}, 200);
}

uname_focus();

</script>
</body>
</html>
<? ob_flush(); ?>