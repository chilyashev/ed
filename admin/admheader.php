<?
ob_start();
$c="../";
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
include $c."conf/fnoc.php";
include $c."conf/messages.php";
include $c."inc/functions.php";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?=get_option("title");?> &laquo; Администрация</title>
  <link href="css/a_style.css" rel="stylesheet" type="text/css" />

 <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.9.custom.css" rel="stylesheet" />	
<script src="<?=$c?>js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="<?=$c?>js/jquery-ui-1.8.9.custom.min.js"></script>
<script src="<?=$c?>js/core.js"></script>
<script src="./js/adminjs.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
<script type="text/javascript" src="js/colorpicker.js"></script></head>
<style type="text/css">

</style></head>

<body>
<div id="wrap">
<!--[if IE 6]>
<?=getIeError()?>
<![endif]-->
	<?
	if(isset($_GET['message'])){
		wrn(get_msg($_GET['message']));		
	}
	?>
<div id="msg" style="display:none;"></div>
<div id="mask"></div>
<div id="dialog" class="window">
</div>
 <div id="head"><div id="logo"><a href="<?=get_option("url")?>"><?=get_option("title")?></a></div><br />
<div id="greeting">
<?

$ok = 0;
$role=-9;
if(isset($_COOKIE['egn'])){ // 03:00, myrzi me da gledam, setih se, che se ebava, ako im set-nata egn biskvitka, le fu
	if(checkLoginBoolEGN($_COOKIE["egn"])){
		$ok = 0;
		$role = 1;
		}else{
		$ok = 0;
		
	}//check
	}
if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ //proverqvame dali e lognat, ako ne e, otivame nadolu
	if(checkLoginBool($_COOKIE["user"], $_COOKIE["pass"])){

		$ok = 1;
		}else{
		$ok = 0;
		
	}//check
	}
	if($ok){
		if($role == -9){//normalen login
		$role = getRole($_COOKIE['user']);
		$id = getID($_COOKIE['user']);
		echo "<strong>Здравей, </strong>" . getNamebyID($id, $role) . "!<a href=\"logout.php\">Изход</a><br />";
		}else{//egn login
		 $id = getID(getNamebyEGN($_COOKIE['egn']));
			echo "<strong>Здравей, </strong>" . getNamebyEGN($_COOKIE['egn']) . "!";
		}
	}

else{	
		//echo "<strong>y'all need to <a href='".$c."login.php'>login</a></strong>!<br />";

		}
	
?>
</div>
</div>




 
  <div id="side">
    
    <? include "menu.php";?>
    <!-- side --></div>
	  <div id="content">

	  
