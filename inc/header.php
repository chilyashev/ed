<?
ob_start();
if(!file_exists("conf/fnoc.php")){
	define("INSIDE", false);
	die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<center>Липсва конфигурационният файл. Електронният дневник не е инсталиран. Отидете на <a href=\"install\">инсталацията</a>. Ако вече сте инсталирали, свържете се със системния си администратор.</center>");

}
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];
include $c."conf/fnoc.php";
include $c."inc/functions.php";	
global $ok, $role;
if(file_exists("install/index.php")){
	error("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />Не сте изтрили install/index.php. За сигурността на системата, трябва да го изтриете");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=get_option("title");?></title>
<link type="text/css" href="<?=$c?>css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" />	
<link href="<?=$c?>css/style_narrow.css" rel="stylesheet" type="text/css" />
<script src="<?=$c?>js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="<?=$c?>js/jquery-ui-1.8.9.custom.min.js"></script>
<script src="<?=$c?>js/core.js"></script>


</head>

<body>
<!--[if IE 6]>
<?=getIeError()?>
<![endif]-->
<div id="msg" style="display:none;"></div>
<div id="mask"></div>
<div id="grade"></div>
<div id="dialog" class="window">
</div>
</div><div id="wrapper">
<div id="head" style="background: #<?=get_option("headcolor")?>;"><div id="logo"><a href="<?=get_option("url")?>"><img src="<?=get_option("url")?>/img/logo/<?=get_option("logo")?>" height="80"/></a> <span style="color:#<?=get_option("headfgcolor")?>;float:right;padding-top:40px"><?=get_option("title");?></span><br />

</div><br />
 <?

$ok = 0;
$role=-9;
if(isset($_COOKIE['egn'])){
	
	if(checkLoginBoolEGN($_COOKIE["egn"])){
		$id = getIDbyEGN($_COOKIE["egn"]);
		$ok = 1;
		$role = 1;
		}else{
		$ok = 0;
		
	}//check
	
	}
if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
	if(checkLoginBool($_COOKIE["user"], $_COOKIE["pass"])){
		$ok = 1;
		}else{
		$ok = 0;
		
	}//check
	
	if(checkLoginBool($_COOKIE["user"], $_COOKIE["pass"], "roditel") && !$ok){
		$ok = 1;
		$role = 3;
		}else{
			//$ok=0;
			}
	}
	
	

?>
 </div>
<div id="menu" style="background: #<?=get_option("headcolor")?>;"><? include $c."inc/menu.php";?></div>


<div id="content"><div id="where"><a href="<?=get_option("url")?>index.php">Начало</a></div>
<? include($c."inc/sidebar.php"); ?>
<div id="main">

