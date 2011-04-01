<?
if(isset($_SERVER[HTTP_REFERER]) && INSIDE){
include "../conf/fnoc.php";
include "../inc/functions.php";
if(isset($_GET['do'])){
	$d = $_GET['do'];
	switch($d){

	
	case "delUser";
if(isset($_POST['id'])){
	
	delUser($_POST['id']);
	}
break;
	case "delStudent";
if(isset($_POST['id'])){
	
	delStudent($_POST['id']);
	}
break;

case "delClass";
if(isset($_POST['id'])){
	
	delClass($_POST['id']);
	}
break;


case "delSubj";
if(isset($_POST['id'])){delSubj($_POST['id']);}

	
break;
case "delNote";
if(isset($_POST['id'])){del("notes", $_POST['id']);}
break;

case "delParent";
if(isset($_POST['id'])){del("roditel", $_POST['id']);}
break;

case "delAbs";
if(isset($_POST['id'])){del("otsastvie", $_POST['id']);}
break;

case "chAbs";
$aid = $_POST['id'];
		setAbsDetail("type", "1", $aid);
break;
	case "apprP";
	$pid = $_POST['id'];
		setParentDetail("state", "1", $pid);
	break; // break apprP
	
	case "unapprP";
	$pid = $_POST['id'];
		setParentDetail("state", "0", $pid);
	break; // break apprP
	
	
	
	case "getAll";
	getAllStudents();
	getTeachers();
	break;
	case "getClasses";
	getSearch("classes");
	getClasses();
	break;
	case "getSubjs";
	getSearch("subjs");
	getSubjects();
	break;
	case "getTeachers";
	getSearch("users");
	getTeachers();
	break;
	case "getStudents";
	getSearch("students");
//	startPagination("uchenik");
	getAllStudents();
	endPagination("uchenik");	
	break;
	case "getNews";
	$q = mysql_query("SELECT * FROM  `news` ORDER BY `date` DESC");	
echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em">
		<td>&nbsp;</td>
		<td style="padding-left:6px">Заглавие</td>
		<td>Операции</td>
		<td>От</td>
		<td align="right" style="padding-right:6px">Дата</td>
</tr>
EOT;
$ch=0;
			while($r = mysql_fetch_array($q)){
					echo "";
					?>

<tr style="border-top: 1px solid black;background:<?=($ch%2 == 0)? "white":"#CECECE"?>" height="1em">
		<td><input name="bulk" type="checkbox" value="" />&nbsp;</td>
		<td><a href="<?=get_option("url")?>?do=view&w=news&id=<?=$r['id']?>">
				<?=$r['title']?>
		</a></td>
		<td><span style="padding-right:6px">
				
				<a href="<?=get_option("url")?>admin/editNews.php?id=<?=$r['id']?>"><img src="<?=get_option("url")?>img/edit.png" width="16" height="16" /></a> <a id="delNews" href="<?=$r['id']?>"><img src="<?=get_option("url")?>img/delete.png" width="16" height="16" /></a>
				
		</span></td>
		<td><a href="editUser.php?w=teach&id=<?=$r['authorID']?>">
				<?=getNameById($r['authorID'], 0)?>
				</a></td>
		<td align="right" style="padding-right:6px"> 
				<?=$r['date']?></td>
</tr>
<?
$ch++;
				}	
				echo "<tr id=\"nfooter\"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>";
				?>Отбележи: <a href="#" id="spl" onclick="$('input[name=bulk]').attr('checked', true);">Всички</a> <a href="#" id="spl" onclick="$('input[name=bulk]').attr('checked', false);">Никои</a>
<?
	break;
	case "add";
	$date = data();//date("l, F d Y H:i:s");
	$ime = htmlspecialchars($_POST['name']);
	$egn = htmlspecialchars($_POST['egn']);
	$pass = md5($_POST['pass']);
	$nomerVklas = htmlspecialchars($_POST['nomerVklas']);
	$snimka = htmlspecialchars($_POST['snimka']);
	$role = htmlspecialchars($_POST['role']);
	$status = htmlspecialchars($_POST['status']);
	$classID =  htmlspecialchars($_POST['classID']);
	$email = $_POST['email'];
	$address = $_POST['address'];
	if(strlen($ime) <= 0){
		error("Въведете име");
		die();
		}		
	if(strlen($egn) > 0){
		if(EGNExists($egn)){
			error("Потребител с такова ЕГН съществува");
			die();
			}
	if(strlen($egn) !=10 || !is_numeric($egn)){
		error("Невалидно ЕГН. ЕГН-то трябва да е 10 цифри");
		die();
		}		
	}else{
		error("Въведете ЕГН");
		die();
		}
		
	if(strlen($nomerVklas) <= 0){
		error("Въведете номер вклас.");
		die();
		}
	if($classID == -9){
		error("Изберете клас!");
		die();
		}
	if(strlen($address) < 1){
		error("Въведете адрес.");
		die();
		}
	/*if(!validateEmail($email)){
		error("Невалиден имейл!");
		die();
		}*/ //не е задължително всеки ученик да има имейл
	// proverka
	$q = mysql_query("INSERT INTO `uchenik` (
`id` ,
`ime` ,
`egn` ,
`address`,
`email`,
`nomerVklas` ,
`classID` ,
`snimka` ,
`dateReg` ,
`note` ,
`role`
)
VALUES (
NULL , '$ime', '$egn', '$address', '$email', '$nomerVklas', '$classID', '$snimka', '$date', '', '1'
);
");
	//("INSERT INTO `uchenik` (`id`, `ime`, `egn`, `nomerVklas`, `snimka`, `dateReg`, `status`, `classID`) VALUES (NULL, '$username', '$pass', '$role', '$ime', '$egn', '$nomerVklas', '$snimka', '$date', '$status', '$classID');" );
if($q){
	echo "ok";
	}
else{
	return 0;
	//echo mysql_error();
}
//	echo "adding: ".$username." ".$pass." ".$ime." ".$egn." ".$role;

break; //break add





		case "saveStu";
		//if(isset($_POST['saveStu'])){
		$uid = $_POST['uid'];
		$newname = $_POST['name'];
		$newegn = $_POST['egn'];
		$nomer = $_POST['nomer'];
 		$newClassID = $_POST['class'];
		$email = $_POST['email'];
		$address = $_POST['address'];

	$q = mysql_query("UPDATE `uchenik` SET 
`ime` = '$newname',
`egn` = '$newegn',
`nomerVklas` = '$nomer',
`address` = '$address',
`email` = '$email',
`classID` = '$newClassID' WHERE `uchenik`.`id` ='$uid';");
	if($q){echo("Промените запазени");}else{error("fail:".mysql_error());}
	//}
		break; //break saveStu
		







	case "addClass";
		$name = htmlspecialchars($_POST['name']);
		$gore = htmlspecialchars($_POST['gore']);
		$dolu = htmlspecialchars($_POST['dolu']);
		$specialnost = htmlspecialchars($_POST['specialnost']);



		$q = mysql_query("INSERT INTO `class` (
`id` ,
`name` ,
`dolu` ,
`gore` ,
`specialnost`
)
VALUES (
NULL , '$name', '$dolu', '$gore', '$specialnost'
);");

		if($q){
		echo "Добавен клас ". $name;
		}else{
			echo "".mysql_error();
		}

	break;
	
	case "addGrade";
	$okk = true;
	$date = data();//date("l, F d Y H:i:s");
	$val = htmlspecialchars($_POST['val']);
	$predmetID = htmlspecialchars($_POST['predmetID']);
	$opisanie = htmlspecialchars($_POST['opisanie']);	
	$uchenikID = htmlspecialchars($_POST['uchenikID']);	
	if(!is_numeric($val)){$okk= false;}
	if($okk){
	$q = mysql_query("INSERT INTO `ocenka` (
`id` ,
`value` ,
`predmetID` ,
`opisanie` ,
`date` ,
`uchenikID`
)
VALUES (
NULL , '$val', '$predmetID', '$opisanie', '$date', '$uchenikID'
);
");
//echo "$val $predmetID $opisanie $uchenikID";
	if($q){echo "ok"; return 1;}else{echo "err";}
}else{
	echo "err";
	}
	break; //addgrade
	
	
	
	
	
	
	
	
		case "addAbs";
	$date = data();//date("l, F d Y H:i:s");
	$type = htmlspecialchars($_POST['type']);
	$predmetID = -9; //FIX ME  //htmlspecialchars($_POST['predmetID']);	
	$uchenikID = htmlspecialchars($_POST['uchenikID']);	
	$opisanie = htmlspecialchars($_POST['opisanie']);	
	$q = mysql_query("INSERT INTO `otsastvie` (
`id` ,
`type` ,
`opisanie`,
`date` ,
`predmetID` ,
`uchenikID`
)
VALUES (
NULL , '$type', '$opisanie', '$date', '$predmetID', '$uchenikID'
);
");
//echo "$val $predmetID $opisanie $uchenikID";
	if($q){echo "abs added"; return 1;}else{echo "BOOOM! ".mysql_error();return 0;}
	
	break; //addabs
	
	
	
	
	
	
	case "addNotes";
	$date = data();//date("l, F d Y H:i:s");
	$note = htmlspecialchars($_POST['note']);
	$predmetID = $_POST['predmetID'];
	$uchenikID = htmlspecialchars($_POST['uchenikID']); //FIX ME  //htmlspecialchars($_POST['predmetID']);	
	$userID = htmlspecialchars($_POST['userID']);	
	$q = mysql_query("INSERT INTO `notes` (
`id` ,
`note` ,
`predmetID`,
`date` ,
`uchenikID` ,
`userID`
)

VALUES (
NULL , '$note', '$predmetID', '$date', '$uchenikID', '$userID'
);
");
//echo "$val $predmetID $opisanie $uchenikID";

	if($q){echo "note added"; return 1;}else{echo "BOOOM! ".mysql_error();return 0;}
	
	break; //addabs	


	case "delNews";
	if(isset($_POST['id'])){
	delNews($_POST['id']);
	}
	break; //break del news
	
	
	case "getGr";
	if(isset($_POST['id'])){
		echo getGradeDetail("value", $_POST['id']);	
	}
	break;
	
	case "saveGr";
	//($wha, $det, $pid)
	if(isset($_POST['id']) && isset($_POST['val'])){
		setGradeDetail("value", $_POST['val'], $_POST['id']);
	}
	break;
	
	case "delGr";
	if(isset($_POST['id'])){
		del("ocenka", $_POST['id']);	
	}
	break;

	case "rmStu";
	if(isset($_POST['id']) && isset($_POST['all']) && isset($_POST['rid'])){
	$rmid = $_POST['id']; // kid id
	$all = $_POST['all']; // all kids
	$rid = $_POST['rid']; // parentID
	//echo "id to remove: $rmid\n";
	//echo "before: $all\n";
	
	//messy code, dude, fix it later
	$all = str_replace($rmid.", ", "", $all);
	$all = str_replace(", ".$rmid, "", $all);
	$all = str_replace(", ".$rmid.", ", "", $all);		
	$all = str_replace($rmid, "", $all);
	//setParentDetail($wha, $det, $pid)
	setParentDetail("kidID", $all, $rid);
	//echo "after: $all";
	}else{echo 'boom';}
	break; //rmStu
	
	case "addS";
	if(isset($_POST['id']) && isset($_POST['all']) && isset($_POST['kid'])){
	$rid = $_POST['id']; // parent id
	$all = getParentDetail("kidID", $rid); // all kids
	$kid = $_POST['kid']; // kid id
	//echo "before: \$all = $all, \$rid = $rid, \$kid = $kid\n";
	$all = $kid.", ".$all; //dobavqm go v nachaloto, zashtoto e po-lesno :)
	
	setParentDetail("kidID", $all, $rid);
	//echo "after: $all\n";
	}//if isset stuff
	break; //addS
	
default;
break;
}//switch
}//if isset http referer
}
?>
