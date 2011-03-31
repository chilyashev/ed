<?
include "admheader.php";
?>
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
				$d = !isset($_GET['do']) ? "0":$_GET['do']; // a quickie //rev 160: WTF!?
				switch($d){
					default;
					
					if(file_exists("../install/index.php")){
						
						error("<a href=\"rminst.php\">Файлът install/index.php не е премахнат. За сигурността на приложението трябва да го премахнете. Кликнете тук, за да го премахнете.</a>");
					echo "<br /><br /><br />";
					}
					
					
				if(cnt("roditel", "WHERE `state` = 0") > 0){
				?>
				<h3>&nbsp;Родители, очакващи одобрение</h3>
				<?
	echo <<<EOT
	<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Потребителско име</td>
		<td>Име</td>
		<td>Имейл</td>
		<td>Родител на</td>
		<td>Одобрен</td>
		<td>Операции</td>
</tr>	
EOT;
$q = mysql_query("SELECT * FROM `roditel` WHERE `state` = 0 ORDER BY `date` ");
$v=1;
while($r=mysql_fetch_array($q)){
	?>
				<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
						<td><?=$r['username']?></td>
						<td><?=$r['name']?></td>
						<td><?=$r['email']?></td>
						<td><?
		$kids = explode(", ", $r['kidID']);
		$a=0;
		//print_r($kids);
		while($a < count($kids)){
			echo "<a href=\"editUser.php?w=stu&id=$kids[$a]\">".getStudentDetail("ime", $kids[$a])."</a>";
			echo ($a<count($kids)-1)? ", ":"";
		$a++;
		}
		?></td>
						<td><?=($r['state'] > 0)?"<span style=\"color:green\">да</span>":"<span style=\"color:red\">не</span>" ?></td>
						<td><a href="editUser.php?w=par&id=<?=$r['id'];?>">
								<?=getIcon("edit.png", 16)?>
								</a> <a id="delParent" href="<?=$r['id'];?>">
								<?=getIcon("delete.png", 16)?>
								</a> / <a href="<?=$r['id']?>" id="apprP">
								<?=getIcon("ok.png", 16)?>
								</a> <a href="<?=$r['id']?>" id="unapprP"><? echo getIcon("cancel.png", 16)?></a></td>
				</tr>
				<?
$v++;
}

	echo '<tr id="nfooter"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>';

				}//if unappr
				?>
				<script>actadmlink("#dashboard")</script>
				<div id="info" style="float:left;">
						<div id="title">
								<h3>&nbsp; <a href="stats.php">Статистики</a></h3>
						</div>
						<table width="100%" border="0" cellspacing="0" cellpadding="5">
								<tr>
										<td><?
echo "Ученици: ";
echo "<a href=\"?do=view&w=students\"><em>";
getStudentsCount();
echo "</em></a>";
?></td>
										<td>Извинени отсъствия:<strong>
												<?=cnt("otsastvie", "WHERE `type` ='1'")?>
												</strong></td>
								</tr>
								<tr>
										<td>Учители:<strong> <a href="<?=get_option("url")?>admin/?do=view&amp;w=teachers">
												<?=cnt("user", "WHERE `role`=2")?>
												</a></strong></td>
										<td>Неизвинени отсъствия: <strong>
												<?=cnt("otsastvie", "WHERE `type` ='0'")?>
												</strong></td>
								</tr>
								<tr>
										<td>Потребители: <strong>
												<?=(cnt("user")+cnt("uchenik")+cnt("roditel", "WHERE `state` = 1"))?>
												</strong></td>
										<td>Страници: <strong>
												<?=cnt("page")?>
												</strong></td>
								</tr>
								<tr>
										<td>Оценки: <strong>
												<?=cnt("ocenka")?>
												</strong></td>
										<td>Забележки: <strong>
												<?=cnt("notes")?>
												</strong></td>
								</tr>
						</table>
				</div>
				<div id="info" style="float:right;;">
						<div id="title">
								<h3>&nbsp;Последни оценки</h3>
						</div>
						<?=getAllGrades(6);?>
				</div>
				<div id="info" style="clear:both">
						<div id="title">
								<h3>&nbsp;Последни <a href="?do=view&amp;w=news">новини</a></h3>
						</div>
						<?=getNewsTitles(6);?>
				</div>
				<?
				break; //default
				case "add";
				
				if(isset($_GET['w'])){
					switch($_GET['w']){
						default;
						?>
				<h2>&raquo;Добавяне на потребител</h2>
				<br />
				<br />
				<a href="?do=add&amp;w=student" rel="tooltip" title="Добавяне на ученик">
				<?=getIcon("uchenik.png")?>
				</a> <a href="?do=add&amp;w=teacher" rel="tooltip" title="Добавяне на учител">
				<?=getIcon("uchitel.png")?>
				</a> <a href="?do=add&amp;w=parent"  rel="tooltip" title="Добавяне на родител">
				<?=getIcon("roditel.png")?>
				</a><br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Изберете какъв потребител да добавите:<br />
						<?=getIcon("rodite.png", 16)?>
						- за родител<br />
						<?=getIcon("edit.png", 16)?>
						- за родител<br />
						<?=getIcon("edit.png", 16)?>
						- за родител<br />
				</div>
				<?
						break; //break default
						case "student";
						echo "<script>actadmlink(\"#addstu\")</script>";
				$inside = true;
				include "addUser.php";
						break; //break user
						
						case "teacher";
						echo "<script>actadmlink(\"#addteach\")</script>";
						include "addTeacher.php";
						break; //break teacher
						case "parent";
						echo "<script>actadmlink(\"#addpar\")</script>";
						include "addParent.php";
						break; //break parent 
						}//switch add&w
					}else{
						?>
				<script>actadmlink("#addusr")</script>
				<h2>&raquo;Добавяне на потребител</h2>
				<br />
				<br />
				<a href="?do=add&amp;w=student" rel="tooltip" title="Добавяне на ученик">
				<?=getIcon("uchenik.png")?>
				</a> <a href="?do=add&amp;w=teacher" rel="tooltip" title="Добавяне на учител">
				<?=getIcon("uchitel.png")?>
				</a> <a href="?do=add&amp;w=parent"  rel="tooltip" title="Добавяне на родител">
				<?=getIcon("roditel.png")?>
				</a> <br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Изберете какъв потребител да добавите:<br />
						<?=getIcon("uchenik.png", 16)?>
						- за ученик<br />
						<?=getIcon("roditel.png", 16)?>
						- за родител<br />
						<?=getIcon("uchitel.png", 16)?>
						- за учител<br />
				</div>
				<?
					}
				break; //add
				case "addClass";
				echo "<h2>&raquo;Добавяне на клас</h2><br /><br />";
				echo "<script>actadmlink(\"#addclass\")</script>";
				$inside = true;
				include "addClass.php";
				break; //addClas
				
				case "addGrade";
				echo "<h2>&raquo;Добавяне на оценка</h2><br /><br />";
				echo "<script>actadmlink(\"#addgrade\")</script>";
				$inside = true;
				include "addGrade_u.php";
				break; //addGrade
				
				case "addAbs";
				echo "<h2>&raquo;Добавяне на оценка</h2><br /><br />";
				echo "<script>actadmlink(\"#addabs\")</script>";
				$inside = true;
				include "addAbs_u.php";
				break; //addGrade
				
				case "addSubj";
				echo "<h2>&raquo;Добавяне на предмет</h2><br /><br />";
				echo "<script>actadmlink(\"#addsubj\")</script>";
				$inside = true;
				include "addSubj.php";
				break; //addClass
				case "addNews";
				echo "<script>actadmlink(\"#dobavinovina\")</script>";
				$inside = true;
				include "addNews.php";
				break;
				case "addPage";
				echo "<script>actadmlink(\"#addpages\")</script>";
				$inside = true;
				include "addPage.php";
				break;
					case "edit";
					if(isset($_GET['w'])){
						switch($_GET['w']){
							case "news";
							if(isset($_GET['id'])){
								$inside = true;
								include("editNews.php?id=".$_GET['id']);
								?>
				редактиране
				<?
								}//if isset id
							break;
							
							case "main";
							echo "<h2>&raquo;Общи настройки</h2><br />";
 							echo "<script type=\"text/javascript\">actadmlink('#obshti')</script>";
							include "editMain.php";
						break;
						case "app";
 							echo "<script type=\"text/javascript\">actadmlink('#lgo')</script>";
							echo "<h2>&raquo;Лого</h2><br /><br />";
							include "editApp.php";
						break;
						
						case "sdbr";
 							echo "<script type=\"text/javascript\">actadmlink('#sdbr')</script>";
							echo "<h2>&raquo;Страничен текст</h2><br /><br />";
							include "editSdbr.php";
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
						echo "<h2>&raquo;Всички потребители</h2><br />";
 							echo "<div id=\"users\"><script type=\"text/javascript\">
get(\"process.php?do=getAll\", \"#users\");
</script>
loading ...&nbsp;</div>";
						break;
						
						case "subjs";
						echo "<h2>&raquo;Предмети</h2><br />";
							echo "<div id=\"subjs\">loading...<script type=\"text/javascript\">
							get(\"process.php?do=getSubjs\", \"#subjs\");
							actadmlink(\"#subjsv\");
							</script></div>";
							?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Тук можете да редактирате и триете предмети.<br />
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените предмета или
						<?=getIcon("delete.png", 16)?>
						, за да го изтриете. </div>
				<?
						break;
						
						case "classes";
						echo "<h2>&raquo;Класове</h2><br />";
							echo "<div id=\"classes\">loading...loading...<script type=\"text/javascript\">
get(\"process.php?do=getClasses\", \"#classes\");
actadmlink(\"#classesv\");
</script></div>";
?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените класа или
						<?=getIcon("delete.png", 16)?>
						, за да го изтриете. </div>
				<?
						break;
						
						case "teachers";
						echo "<script>actadmlink(\"#teachers\")</script>";
						echo "<h2>&raquo;Учители</h2><br />";
					echo "<div id=\"news\"><script type=\"text/javascript\">
actadmlink('#teachers');</script>
</div>";
						getSearch("user");
						pagination("user");
					?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените учителя или
						<?=getIcon("delete.png", 16)?>
						, за да го изтриете. </div>
				<?
						break;
						
						case "students";
						echo "<h2>&raquo;Ученици</h2><br />";
					echo "<div id=\"news\"><script type=\"text/javascript\">
actadmlink('#students');</script>
</div>";
						getSearch("uchenik");
						pagination("uchenik");
?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените ученика или
						<?=getIcon("delete.png", 16)?>
						, за да го изтриете. </div>
				<?						break; // break students
					case "parents";
					echo "<script>actadmlink(\"#parents\")</script>";
						echo "<h2>&raquo;Родители</h2><br />";
					echo "<div id=\"news\"><script type=\"text/javascript\">
actadmlink('#parents');</script>
</div>";
						getSearch("roditel");
						pagination("roditel");
						?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените родителя или
						<?=getIcon("delete.png", 16)?>
						, за да го изтриете.<br />
						За да одобрите родител, кликнете
						<?=getIcon("ok.png", 16)?>
						.<br />
						За да премахнете правото му да влиза, кликнете
						<?=getIcon("cancel.png", 16)?>
				</div>
				<?
					break; //break parents
					case "news";
					echo "<h2>&raquo;Новини</h2><br />";
					getSearch("news");
					//pagination($tbl, $sysedni= 3, $limit = 5, $ok=0, $role=-9)
					pagination("news", 3, 10, 1, 0, 1);
					echo "<div id=\"news\"><script type=\"text/javascript\">
actadmlink('#novini');</script>
</div>";?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените новината или
						<?=getIcon("delete.png", 16)?>
						, за да я изтриете. </div>
				<?
					break;
					
					case "pages";
					echo "<h2>&raquo; Страници</h2><br /><br />";
					echo "<div id=\"news\"><script type=\"text/javascript\">
actadmlink('#pages');</script>
</div>";
					getSearch("page");
					pagination("page");
					?>
				<br />
				<br />
				<div id="help">
						<?=getIcon("q.png", 16)?>
						Кликнете
						<?=getIcon("edit.png", 16)?>
						, за да промените страницата или
						<?=getIcon("delete.png", 16)?>
						, за да я изтриете. </div>
				<?
					break;
					
					
				
					default;
					error("error");
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
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	}

//echo "need to login!";	
}
?>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<?
	include "footer.php";
	?>
