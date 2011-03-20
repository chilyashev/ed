<?
$c="./";
include "inc/header.php";	
?>
<script type="text/javascript">
if(window.location.href.indexOf('page') >=0){
}else{
actlink("#home");
}
</script>
<?
/*if(isset($_GET['do'])){*/
$do = isset($_GET['do']) ? $_GET['do']:"";
switch($do){
	case "view";
	if(isset($_GET['w'])){
		switch($_GET['w']){		
		case "news";
			if(isset($_GET['id'])){
				getNovina($_GET['id'], $ok, $role, 1);
				}//isset id	
				else{
					//getNews(100, $ok, $role);
						pagination("news");
					}
		break; //break news
		case "pages";
		if(isset($_GET['page_id'])){
			getPage($_GET['page_id'], $ok, $role);
			}else{goHome();}
		break;
		default;
		goHome();
		break;
		}//switch w
		}//if isset w
	break; //break view
default;
if($ok){
	echo '<br /><br /><br /><div id="usermenu">';
switch($role){
	case 0: //admin
	case 2:
	mnuitem(getIcon("admpanel.png"), "admin/", "Администрация");
	mnuitem(getIcon("uchitel.png"), "admin/?do=view&w=teachers", "Учители");
	mnuitem(getIcon("uchenik.png"), "admin/?do=view&w=students", "Ученици");
	mnuitem(getIcon("roditel.png"), "admin/?do=view&w=parents", "Родители");
 
	break; //break admin
	case 1; //uchenik
		mnuitem(getIcon("ocenki.png"), "grades.php", "Провери си оценките");
		mnuitem(getIcon("abs.png"), "abs.php", "Провери си отсъствията");
		mnuitem(getIcon("zab.png"), "zab.php", "Забележки");
	break; //break uchenik
	case 3; // roditel
	$kids = explode(", ", getParentDetail("kidID", $id));
	echo "Виж данни за: <br />";
	for($i = 0; $i < count($kids); $i++){
		echo "<fieldset><legend>".getStudentDetail("ime", $kids[$i])."</legend>";
		mnuitem(getIcon("ocenki.png"), "grades.php?id=$kids[$i]", "Провери си оценките");
		mnuitem(getIcon("abs.png"), "abs.php?id=$kids[$i]", "Провери си отсъствията");
		mnuitem(getIcon("zab.png"), "zab.php?id=$kids[$i]", "Забележки");
		if(cnt("otsastvie", "WHERE `uchenikID`='$kids[$i]' AND `type` = '0'") >= 5){
			echo "<br />
<br />
<br />
";
			wrn("<small>".getStudentDetail("ime", $kids[$i])." има повече от 5 неизвинени отсъствия и подлежи на наказания.</small>");
		}
		echo "<br /><br /></fieldset><br />";
		}

	break; //break roditel
	
	}//switch role
echo "</div><hr style=\"width:660px;float:left\" />";
}// if $ok
else{ //ne e lognat
	echo '<div id="usermenu">';
			mnuitem(getIcon("loginU.png"), "stulogin.php", "Вход за ученици");
			mnuitem(getIcon("loginP.png"), "rodlogin.php", "Вход за родители");
			mnuitem(getIcon("loginT.png"), "admin", "Вход за учители");
			mnuitem(getIcon("reg.png"), "register.php", "Регистрация");
			
	echo '</div>';
	}//else $ok
	
	echo "<br />
<br />
<h3>Последни новини:</h3>";
	pagination("news", 3, 3, $ok, $role, 0);
break;//break default
}//switch do
//}// if isset do
?>

<?
include "inc/footer.php";
?>