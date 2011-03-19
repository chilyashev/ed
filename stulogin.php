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
<title>
<?=get_option("title");?>
&laquo; Вход за ученици</title>
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
<?
$ok = 0;
$role=-9;
if(isset($_COOKIE['egn'])){
 	if(checkLoginBoolEGN($_COOKIE["egn"])){
 		goHome();
		}else{
		$ok = 0;
		
	}//check
	}
if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
	if(checkLoginBool($_COOKIE["user"], $_COOKIE["pass"])){

		 		goHome();

		}else{
		$ok = 0;
		
	}//check
	}
	 ?>
<div id="nazad"> <a href="<?=get_option("url")?>">&larr; Назад към сайта</a></div>
<div id="wrapper">
		<div id="content">
				<div id="main">
						<form id="loginfrm" method="post" action="">
								<div align="center"><img src='<?=get_option("url")."/img/logo/".get_option("logo");?>' height="100"/></div>
								<?
if($ok){
	echo '<meta http-equiv="refresh" content="0;URL='.get_option("url").'" />';
	}
if(isset($_POST['login'])){
//echo $_POST['egn'];
//checkLoginEGN($_POST['egn']);
$egn = htmlspecialchars($_POST['egn']);
	//echo $egn;
	$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
	//echo mysql_num_rows($q);
	if(mysql_num_rows($q) == 0){
				error("Грешно ЕГН!", 0);
				}
			else{
			$expire=time()+60*60*24*30;
				//setcookie(name, value, expire, path, domain); 
				setcookie("user", "", time()+3600, "/");
				setcookie("pass", "", time()+3600, "/") ;
				if(setcookie("egn", "$egn", $expire, "/")){		
				echo '<meta http-equiv="refresh" content="0;URL='.get_option("url").'" />';
				echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
				}
			}
}
?>
								<label for="egn">ЕГН</label>
								<input name="egn" type="text" id="egn" />
								<label for="id">Идентификационен код</label>
								&nbsp;
								<input name="id" type="text" id="id" value="//fixme" />
								<br />
								<input name="login" type="submit" id="login" value="Вход" />
						</form>
				</div>
				<!-- #main --> 
		</div>
		<!-- #content --> 
</div>
<!-- #wrapper --> 

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
<?
ob_flush();
?>