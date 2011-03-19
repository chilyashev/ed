<?
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
</head>
<style type="text/css">

</style></head>

<body>
<div class="container">
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




 
  <div class="sidebar1">
    
    <? include "menu.php";?>
    <!-- end .sidebar1 --></div>
  <div class="content">
    
	  
<?
if($ok){
$username = $_COOKIE['user']; // vzimame imeto na potrebitelq ot biskvitkata
$pass = $_COOKIE['pass']; // i parolata
$q = mysql_query("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$pass'");
	while($r = mysql_fetch_array($q)){
		$realpass = $r['password'];
		$role = $r['role'];
		$realname = $r['username'];
		}
		if($role == 1){
				echo "Вие нямате администраторски права. <a href='../index.php'>Назад</a>.";
			}
			else if($role == 0 || $role == 2){
				$d = !isset($_GET['do']) ? "0":$_GET['do']; // a quickie //rev 160: WTF!? kakvo sym pravil tuka?
				switch($d){
					default;
				?>
<div id="info">
	<div id="title">
	  <h3>&nbsp;Статистика</h3>
	</div>	
    <table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>
    <td>      <?
echo "Всички ученици: ";
echo "<a href=\"?do=view&w=students\"><em>";
getStudentsCount();
echo "</em></a>";
?></td>
    <td>Извинени отсъствия: --</td>
  </tr>
  <tr>
    <td>Всички учители: --</td>
    <td>Неизвинени отсъствия: --</td>
  </tr>
  <tr>
    <td>Онлайн потербители: --</td>
    <td>Страници: --</td>
  </tr>
  <tr>
    <td>Оценки: <?=getGradesCount();?></td>
    <td> Забележки: --</td>
  </tr>
  <tr>
    <td>Нещо: --</td>
    <td>Друго: --</td>
  </tr>
</table>
</div>
<div id="info">
	<div id="title">
	  <h3>&nbsp;Последни 6 оценки</h3>
	</div>	
<?=getAllGrades(6);?>
</div>

				<?
				break; //default
				case "add";
				if(isset($_GET['w'])){
					switch($_GET['w']){
						default;
						?>
						<a href="?do=add&amp;w=student">Ученик</a> <a href="?do=add&amp;w=teacher">Учител</a> <a href="?do=add&amp;w=admin">Директор</a> <a href="?do=add&amp;w=parent">Родител</a>
<?
						break; //break default
						case "student";
				$inside = true;
				include "addUser.php";
						break; //break user
						}//switch add&w
					}else{
						?>
					<a href="?do=add&amp;w=student">Ученик</a> <a href="?do=add&amp;w=teacher">Учител</a> <a href="?do=add&amp;w=admin">Директор</a> <a href="?do=add&amp;w=parent">Родител</a>
					<?
					}
				break; //add
				case "addClass";
				$inside = true;
				include "addClass.php";
				break; //addClass
				case "addSubj";
				$inside = true;
				include "addSubj.php";
				break; //addClass
				case "addNews";
				$inside = true;
				include "addNews.php";
				break;
					case "edit";
					if(isset($_GET['w'])){
						switch($_GET['w']){
							case "news";
							if(isset($_GET['id'])){
								$inside = true;
								include("editNews.php?id=".$_GET['id']);
								}//if isset id
							break;
							
							case "main";
 							echo "<script type=\"text/javascript\">
</script>
Общи настройки<br>Име на училището, адрес, глупости, ала-бала<br />";
							include "editMain.php";
						break;
						
							
							
							default;
							echo "error w";
							break;
							}// switch w					
						}// if isset w
					break; //break edit
				case "view";
				if(isset($_GET['w'])){
					$w = $_GET['w'];
					switch($w){
						case "all";
 							echo "<div id=\"users\"><script type=\"text/javascript\">
get(\"process.php?do=getAll\", \"#users\");
</script>
loading ...&nbsp;</div>";
						break;
						
						case "subjs";
							echo "<div id=\"subjs\">loading...<script type=\"text/javascript\">
							get(\"process.php?do=getSubjs\", \"#subjs\");
							</script></div>";
						break;
						
						case "classes";
							echo "<div id=\"classes\">loading...loading...<script type=\"text/javascript\">
get(\"process.php?do=getClasses\", \"#classes\");
</script></div>";
						break;
						
						case "teachers";
							echo "<div id=\"teachers\">loading...loading...<script type=\"text/javascript\">
get(\"process.php?do=getTeachers\", \"#teachers\");
</script></div>";
						break;
						case "students";
 							echo "<div id=\"students\"><script type=\"text/javascript\">
get(\"process.php?do=getStudents\", \"#students\");
</script>
loading...&nbsp;</div>";
						break;
					
					case "news";
					echo "<div id=\"news\"><script type=\"text/javascript\">
get(\"process.php?do=getNews\", \"#news\");
</script>
loading...&nbsp;</div>";
					break;
					
					
					
					
				
					default;
					echo "error";
					break;
					case "addSubject";
					
					break;
					}//switch w
				}//if isset w
				break;// view
 case "edit";

					
			}//switch
			}//if
//getAllStudents();

}// if ok
else{
if($role == 1){
echo "no right to be here";
die();
}else{
	header("Location: login.php");
	}

//echo "need to login!";	
}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- end .content --></div>
  <div class="footer">
    <p>This .footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the .footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
