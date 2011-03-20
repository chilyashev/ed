<?
#######################################
# @return all the students
#######################################
function getAllStudents($start=0, $end=100){
	//echo "<table width=100% border=1 ><tr><td>name</td><td>options</td><td>class</td></tr>";
	echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Име</td>
		<td>Операции</td>
		<td>Клас</td>
</tr>	
EOT;
$q = mysql_query("SELECT * FROM `uchenik` ORDER BY `dateReg` DESC LIMIT $start, $end ");
$v=1;
while($r=mysql_fetch_array($q)){
	?>

<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
		<td><?=$r['ime']?>&nbsp;</td>
		<td><a href="editUser.php?w=stu&id=<?=$r['id'];?>"><?=getIcon("edit.png", 16)?></a> <a id="delStudent" href="<?=$r['id'];?>"><?=getIcon("delete.png", 16)?></a></td>
		<td><?=getFullClassName($r['classID'])?></td>
</tr>
<?
$v++;
}

	echo '<tr id="nfooter"><td>&nbsp;</td></tr></table>';
}//getStudents

function getTeachers(){
		echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Име</td>
		<td>Операции</td>
		<td>Предмет</td>
		<td>Класен на</td>
</tr>	
EOT;
$q = mysql_query("SELECT * FROM `user` WHERE `role`='2' OR `role`='0'");
$v = 1;
while($r=mysql_fetch_array($q)){
	?>
<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
		<td width="107"><a href="editUser.php?w=teach&id=<?=$r['id'];?>">
				<?=$r['username']?>
				</a>&nbsp;</td>
		<td width="58"><a href="editUser.php?w=teach&id=<?=$r['id'];?>"><?=getIcon("edit.png", 16)?></a> <a id="delUser" href="<?=$r['id'];?>"><?=getIcon("delete.png", 16)?></a></td>
		<td width="58"><?=getSubjDetail("name", $r['predmetID'])?></td>
		<td width="58"><?=getFullClassName($r['classID'])?></td>
</tr>
<?
	$v++;
	}//all students array
	echo '<tr id="nfooter"><td>&nbsp;</td></tr></table>';
	}//getTeachers

function error($err, $inc=0, $width="100%"){
?>
<div class="ui-widget" style="width:<?=$width?>">
		<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
						<? if($inc == 1){echo "<strong>Грешка:</strong>";} echo $err; ?>
				</p>
		</div>
</div>
<?
	}



function wrn($wrn, $a="", $width="100%"){
	
?>
<div class="ui-widget" style="width:<?=$width?>">
		<div class="ui-state-highlight ui-corner-all" style=" padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
						<?=$a?>
						<?=$wrn?>
				</p>
		</div>
</div>
<?
			}
			
function get_msg($mesg){
	
$msg = array();
$msg[0] = 'ОК';
$msg[1] = "Промените запазени успешно.";
$msg[2] = "Потребителят добавен успешно";
if($mesg < count($msg)){
	return $msg[$mesg];
}else{return "unknown msg";}
	}//get msg

function checkLogin($uname, $p, $pp=0, $admin=0){
	
	$username = htmlspecialchars($uname);
	$pass = $p;
	$realpass = "";
	$role = 9;
	$q = mysql_query("SELECT * FROM `user` WHERE `username` = '$username'");
	while($r = mysql_fetch_array($q)){
		$realpass = $r['password'];
		$role = $r['role'];
		$realname = $r['username'];
		$rn = $realname;
		}

			if($pass != $realpass || $username != $realname){
				error("Грешно име или парола! Опитайте пак.", 1);
				}
			else{/*if($admin == 1) {
					if($role !=0){
					error("Нямате администраторски привилегии.", 1);
					}}
					} // ne e admin, ne moje da vleze
					else{}}*/
				
				/*error("good", 1);*/
				$expire=time()+60*60*24*30;
//				$_COOKIE["user"]
				//setcookie("user", "$username", $expire, '/', 'eldnevnik');
				setcookie("user", "$username", $expire, "/");
				setcookie("pass", "$pass", $expire, "/");
				if($pp==0){
				echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
				}
				else{
					
					return 1;
					}
				}//veche moje da vleze
			}
	
	
	
	function checkLoginBool($uname, $p, $tbl="user"){
	$username = htmlspecialchars($uname);
	$pass = $p;
	$role = 9;
	$q = mysql_query("SELECT * FROM `$tbl` WHERE `username` = '$username'");
	if(mysql_num_rows($q) > 0){
	while($r = mysql_fetch_array($q)){
		$realpass = $r['password'];
		$role = $r['role'];
		$realname = $r['username'];
		}

		if($pass != $realpass || $username != $realname){return 0;}
			else{return 1;}
	}else{return 0;}
	}
	
	
	function checkLoginBoolEGN($egn){
		$egn = htmlspecialchars($egn);
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
		if(mysql_num_rows($q) > 0){
			while($r = mysql_fetch_array($q)){
				$realegn = $r['egn'];
				$id = $r['id'];
			}

		if($egn != $realegn){return 0;}else{return 1;}
		}
		else{return 0;}
	}
	
	function checkLoginEGN($egn){
	$egn = htmlspecialchars($egn);
	//echo $egn;
	$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
	//echo mysql_num_rows($q);
	if(mysql_num_rows($q) == 0){
				error("Грешно ЕГН!", 0);
				}
			else{
			$expire=time()+60*60*24*30;
				//setcookie(name, value, expire, path, domain); 
				setcookie("user", "-", time()+3600, "/");
				setcookie("pass", "-", time()+3600, "/");
				if(setcookie("egn", "$egn", $expire, "/")){				
				echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
				}
			}
	/*$realegn = "ararararr"; //fixme
	$q = mysql_query("SELECT * FROM `user` WHERE `egn` = '$egn' AND `role` = '1'");
	while($r = mysql_fetch_array($q)){
		$realegn = $r['egn'];
		}
		
			if($egn != $realegn){
				error("Грешно ЕГН!", 1);
				}
			else{
				echo "good";
				$expire=time()+60*60*24*30;
				if(setcookie("egn", "$egn", $expire)){				
				echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
				}
				
				}//veche moje da vleze*/
			}
	
	
	function getGrades($id, $predmetId){
			$q = mysql_query("SELECT * FROM `ocenka` WHERE `uchenikID` = '$id' AND `predmetID`='$predmetId'");
			while($r = mysql_fetch_array($q)){
				echo "$r[value], ";
			}

		}
		
		

	function getGrades_e($uid, $role, $vid=1){
		$rol = getStudentRole(getUsernameById($uid));
		if($vid == 1){
		/*if($rol != 1){echo "not a student, no grades";}//if
		else{*/
				$classid = getClassID($uid);
				//echo $classid;
				$classname = getClassName($classid);
				//echo $classname;
				$predmeti = mysql_query("SELECT * FROM `predmet` WHERE `class` = '$classid'");
				while($p = mysql_fetch_array($predmeti)){
				$ocenki = array(); // vsichki ocenki, za da smetna sredno po-lesno
				$ocenkiv = ""; // promenliva za normalnite ocenki
				$sr = 0;
				$i = 0;
				$ii = 0;
				
					
				$q = mysql_query("SELECT * FROM `ocenka` WHERE `uchenikID` = '$uid' AND `predmetID` = '$p[id]' ORDER BY `date` ASC");
					//echo "$p[name]: ".getGrades($uid, $p['id'])."<br />";
				while($r = mysql_fetch_array($q)){
                $ocenki[$i] = $r['value'];          //        onmouseover=\"showGradeInfo('$r[opisanie]', '$r[date]')\"
				$ocenkiv .=  "<span id=\"gra\" title=\"$r[opisanie]\" data=\"$r[date]\">".$r['value']."</span>, "; 
				$i++;
				//echo "$p[id]: $ocenkiv<br/>";
                 }
		
				 if($i > 0){
			$sr = array_sum($ocenki)/count($ocenki);
				 }
					echo "<table width=\"\" id=\"subjtbl\" style=\"float:left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
					echo "<tr><td id=\"subjh\">$p[name]";
					if(isset($role)){
					if($role != 1){
					echo "<a id=\"addGrade\" href=\"$uid\" name = $p[id]>".getIcon("add.png", 16)."</a>";
					}
					}
					echo "</td></tr><tr><td border=1>Текущи оценки: ".$ocenkiv."</td></tr>";
					echo "<tr><td>Приблизителна срочна оценка: </td><td>".number_format($sr, 2, '.', '')."</td></tr>";
					echo "</table>";	
					}//predmeti
				


			//}//else
		} ///$vid == 1
		else{
			
			
			
			
			
			
			
			
			/*if($rol != 1){echo "not a student, no grades";}//if
		else{*/
				$classid = getClassID($uid);
				//echo $classid;
				$classname = getClassName($classid);
				//echo $classname;
				$predmeti = mysql_query("SELECT * FROM `predmet` WHERE `class` = '$classid'");
				while($p = mysql_fetch_array($predmeti)){
				$ocenki = array(); // vsichki ocenki, za da smetna sredno po-lesno
				$ocenkiv = ""; // promenliva za normalnite ocenki
				$sr = 0;
				$i = 0;
				$ii = 0;
				
					
				$q = mysql_query("SELECT * FROM `ocenka` WHERE `uchenikID` = '$uid' AND `predmetID` = '$p[id]' ORDER BY `date` ASC");
					//echo "$p[name]: ".getGrades($uid, $p['id'])."<br />";
				
				while($r = mysql_fetch_array($q)){
                $ocenki[$i] = $r['value'];          //        onmouseover=\"showGradeInfo('$r[opisanie]', '$r[date]')\"
				$ocenkiv .=  "<span id=\"gra\" title=\"$r[opisanie]\" data=\"$r[date]\">".$r['value']."</span>, "; 
				$i++;
				//echo "$p[id]: $ocenkiv<br/>";
                 }
		
				 if($i > 0){
			$sr = array_sum($ocenki)/count($ocenki);
				 }
					echo "<table width=\"\" id=\"subjtbl\" style=\"float:left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
					echo "<tr><td id=\"subjh\">$p[name]";
					if(isset($role)){
					if($role != 1){
					echo "<a id=\"addGrade\" href=\"$uid\" name = $p[id]><img src=\"".get_option("url")."img/add.png\"/></a>";
					}
					}
					echo "</td></tr><tr><td border=1>Текущи оценки: ".$ocenkiv."</td></tr>";
					echo "<tr><td>Приблизителна срочна оценка: </td><td>".number_format($sr, 2, '.', '')."</td></tr>";
					echo "</table>";	
					}//predmeti
				
			//}//else
			
			
			
			
			
			
			
			
			
			
			
			
			
			}//else vid == 1
		}
		
		
		
	function getClasses(){
			echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">клас</td>
		<td>Специалност</td>
		<td>Операции</td>
</tr>	
EOT;
		$q = mysql_query("SELECT * FROM `class`");
		$v = 0;
		while($r=mysql_fetch_array($q)){
	?>
<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
		<td ><a href="editClass.php?id=<?=$r['id'];?>">
				<?=$r['name']?>
				<sub>
				<?=$r['dolu']?>
				</sub><sup>
				<?=$r['gore']?>
				</sup></a>&nbsp;</td>
		<td><?=$r['specialnost'];?></td>
		<td><a href="editClass.php?id=<?=$r['id'];?>"><?=getIcon("edit.png", 16)?></a><a id="delClass" href="<?=$r['id'];?>"><?=getIcon("delete.png", 16)?></a></td>
</tr>
<?
	$v++;
	}//all students array
	echo '<tr id="nfooter"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>';

		}
		
		function delUser($id){
		$q = mysql_query("DELETE FROM `user` WHERE `id` = '$id'");
		if($q){echo "deleted";}else{echo "error: ".mysql_error();}
		}
		
		function delStudent($id){
		$q = mysql_query("DELETE FROM `uchenik` WHERE `id` = '$id'");
		$q1 = mysql_query("DELETE FROM `ocenka` WHERE `uchenikID` = '$id'");
		if($q){echo "deleted";}else{echo "error: ".mysql_error();}
		}
		
		function delNews($id){
		$q = mysql_query("DELETE FROM `news` WHERE `id` = '$id'");
		if($q){echo "deleted";}else{echo "error: ".mysql_error();}
		}
		
		function delSubj($id){
		$q = mysql_query("DELETE FROM `predmet` WHERE `id` = '$id'");
		if($q){echo "ok";}else{echo "error: ".mysql_error();}
		}
		
		function delClass($id){
		
		$q = mysql_query("DELETE FROM `class` WHERE `class`.`id` = '$id'");
		if($q){echo "deleted";}else{echo "error: ".mysql_error();}
		
		
		}
    	function userExists($usr){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `ime` = '$usr'");
		if(mysql_num_rows($q) >0){return 1;}else{return 0;}
		}
	
	function userNameExists($usr){
		$q = mysql_query("SELECT * FROM `user` WHERE `username` = '$usr'");
		$q1 = mysql_query("SELECT * FROM `roditel` WHERE `username` = '$usr'");
		if(mysql_num_rows($q) >0 || mysql_num_rows($q1) >0){return 1;}else{return 0;}
		}
		
		
	function EGNExists($egn){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
		if(mysql_num_rows($q) >0){return 1;}else{return 0;}
		}
		
	function getRole($usr){
		$q = mysql_query("SELECT * FROM `user` WHERE `username` = '$usr'");
		while($r = mysql_fetch_array($q)){
				return "$r[role]";
			}
		}
		function getStudentRole($usr){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `ime` = '$usr'");
		while($r = mysql_fetch_array($q)){
				return "$r[role]";
			}
		}
	function getEGN($id){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[egn]";
			}
		}
		
		
		
		
	function getStudentsCount(){
		$q = mysql_query("SELECT * FROM `uchenik`");
		echo mysql_num_rows($q);/*
		while($r = mysql_fetch_array($q)){
				return "$r[egn]";
			}*/
		}
	function getGradesCount(){
		$q = mysql_query("SELECT * FROM `ocenka`");
		echo (mysql_num_rows($q)>0)?mysql_num_rows($q):"";/*
		while($r = mysql_fetch_array($q)){
				return "$r[egn]";
			}*/
		}	
		
		
		
	function getID($usr, $tbl = "user"){

		$q = mysql_query("SELECT * FROM `$tbl` WHERE `username` = '$usr'");
		while($r = mysql_fetch_array($q)){
				return "$r[id]";
			}
		}
		function getIDbyEGN($egn){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
		while($r = mysql_fetch_array($q)){
				return "$r[id]";
			}
		}
		function getClassID($id){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[classID]";
			}
		}
		function getClassName($id){
		$q = mysql_query("SELECT * FROM `class` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[name]";
			}
		}
	
		function getSnimka($id, $w="stu"){
		switch($w){
		case "stu";
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = '$id'");
		break;
		case "teach";
		$q = mysql_query("SELECT * FROM `user` WHERE `id` = '$id'");
		break;
		default;
		die("error");
		break;
		}
		while($r = mysql_fetch_array($q)){
			
			if(strlen($r['snimka']) >6){
				return "$r[snimka]";
			}else{
			return get_option("url")."img/nopic.png";
			}
		}
		
		}
		function getUsernameById($id){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[ime]";
			}
		}
		
		function getNameById($id, $role){
			if($role == 1){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[ime]";
			}
			}
			else{
				$q = mysql_query("SELECT * FROM `user` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[name]";
			}
				}
		}
		function getNamebyEGN($egn){
			$q = mysql_query("SELECT * FROM `uchenik` WHERE `egn` = '$egn'");
		while($r = mysql_fetch_array($q)){
				return "$r[ime]";
			}	
		}
		function getPredmetById($id){
			$q = mysql_query("SELECT * FROM `predmet` WHERE `id` = '$id'");
		while($r = mysql_fetch_array($q)){
				return "$r[name]";
			}
			}
		
		function  getSubjs_list($id=-9){
			$q = mysql_query("SELECT * FROM `predmet`");
			echo "<option value=\"-9\" selected=\"selected\">------</option>\n";
		while($r = mysql_fetch_array($q)){
					if($id == $r['id']){
					echo "<option value=\"$r[id]\" selected=\"selected\">>$r[name]</option>\n";
						}else{
					echo "<option value=\"$r[id]\">$r[name]</option>\n";
					}
			}
		}
		function getSubjects(){
			$c = 0;
			 $predmeti = mysql_query("SELECT * FROM `predmet`");
				?>
<table id="tbl" width="100%" border="0">
<tr id="ntitle">
		<td><input name="" type="checkbox" onclick="$('input[name=bulk]').attr('checked') ?$('input[name=bulk]').attr('checked', false):$('input[name=bulk]').attr('checked', true)"/></td>
		<td>Предмет</td>
		<td>Клас</td>
		<td>Учител</td>
		<td>Операции</td>
</tr>
<?
				while($p = mysql_fetch_array($predmeti)){
					$bg =($c%2)==0?"white":"#E3E3E3";
						echo "<tr bgcolor=\"".$bg."\"><td><input name=\"bulk\" type=\"checkbox\" value=\"$p[id]\" /></td><td><a href=\"editSubj.php?id=$p[id]\">$p[name]</a></td><td>".getClassDetail("name", $p['class'])."</td><td><a href=\"editUser.php?w=teach&id=$p[userID]\">".getUserDetail("name", $p['userID'])."</a></td><td><a href=\"editSubj.php?id=$p[id]\"><img src=\"".get_option("url")."img/edit.png\" /><a href=\"$p[id]\" id=\"delSubj\"><img src=\"".get_option("url")."img/delete.png\" /></a></td></tr>";
						$c++;
					}//predmeti
				echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>";
			}

			
		function getClasses_list($cid=-9){
			$q = mysql_query("SELECT * FROM `class`");
			
			echo "<option value=\"-9\" selected=\"selected\">------</option>\n";
			
		while($r = mysql_fetch_array($q)){
				if($cid == $r['id']){
					
				echo "<option value=\"$r[id]\" selected=\"selected\">>$r[name]<sub>$r[dolu]</sub><sup>$r[gore]</sup></option>\n";
				}else
				{
					echo "<option value=\"$r[id]\" >$r[name]<sub>$r[dolu]</sub><sup>$r[gore]</sup></option>\n";
				}
			}

			}
			
			
			function getClasses_list_subj(){
			$q = mysql_query("SELECT * FROM `class`");
			$pr = array();
			$i = 0;
		while($r = mysql_fetch_array($q)){
					$pr[$i] = "<option value=\"$r[name]\">$r[name]</option>\n";
					$i++;
			}	
				$pr = array_unique($pr);
				$a = 0;
				while($a < $i){
					echo $pr[$a]; 
					$a++;
					}
			}
			
			
		function getNomer($id){
			return get("user", "id", $id, "nomerVklas");
		}
		function getDateReg($id){
			return get("user", "id", $id, "dateReg");
		}
		
			function getAllGrades($limit){
			$q = mysql_query("SELECT * FROM `ocenka` LIMIT $limit");
			echo "<table width=\"500px\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><th>Оценка</th><th>Предмет</th><th>Дата</th><th>ученик</th>";
			while($r = mysql_fetch_array($q)){
				echo "<tr>
    <td>$r[value] &nbsp;</td>
    <td>".getPredmetById($r['predmetID'])."</td>
    <td>$r[date]</td>
	<td><a href=\"editUser.php?w=stu&id=$r[uchenikID]\">".getNameById($r['uchenikID'], 1)."</a></td></tr>";
			}
			echo "</table>";
		}	
		
		
		function getNovina($id, $ok=0, $role=-9, $type=0) {
			if(!is_numeric($id)){echo("wrong id;");}else{
		$q = mysql_query("SELECT * FROM  `news` WHERE `id`=$id");
		if(mysql_num_rows($q) > 0)	{
			while($r = mysql_fetch_array($q)){
					echo "";
					if($type == 0){
					?>
<table width="660px" id="novina" border="0" cellspacing="0" cellpadding="0">
		<tr id="ntitle">
				<td width="6">&nbsp;</td>
				<td width="394" style="padding-left:6px"><center>
								<h2>
										<?=$r['title']?>
								</h2>
						</center></td>
				<td width="147" align="right" style="padding-right:6px"><? if(isset($ok) && ($role == 0 || $role == 2)){?>
						<a href="<?=get_option("url")?>admin/editNews.php?id=<?=$r['id']?>">edit</a>, delete, etc
						<? }?></td>
		</tr>
		<tr>
				<td></td>
				<td style="padding-top:5px;padding-bottom:5px;" colspan="3"><?=$r['body']?></td>
		</tr>
		<tr style="border-top: 1px solid black;">
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td width="113" align="right" style="padding-right:6px">Публикувано от <a href="<?=$r['authorID']?>">
						<?=getNameById($r['authorID'], $role)?>
						</a> на
						<?=$r['date']?></td>
		</tr>
</table>
<?
					}//type
					else{
					?>
<table width="660px" border="0" cellspacing="0" cellpadding="0">
		<tr id="ntitle">
				<td><center>
								<h2>
										<?=$r['title']?>
								</h2>
						</center></td>
		</tr>
		<tr>
				<td align="right"><? if(isset($ok) && ($role == 0 || $role == 2)){?>
						<a href="<?=get_option("url")?>admin/editNews.php?id=<?=$r['id']?>"><img src="<?=get_option("url")?>img/edit.png" /></a>
						<? }?></td>
		</tr>
		<tr>
				<td><?=$r['body']?></td>
		</tr>
		<tr>
				<td align="right">Публикувано от <a href="user.php?w=teach&id=<?=$r['authorID']?>">
						<?=getNameById($r['authorID'], 0)?>
						</a> на
						<?=$r['date']?></td>
		</tr>
</table>
<br />
<br />
<?						}
				}			
		}//if num rows
		else{
			echo "Няма такава новина.";
			}
			}// if is numeric id
		}//get novina
		
		function getNews($limit, $ok=0, $role=-9, $start=0, $admin=0){
			if($admin == 1){
					$q = mysql_query("SELECT * FROM  `news` ORDER BY `date` DESC LIMIT $start, $limit");	
echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em">
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
		<td><a href="<?=get_option("url")?>?do=view&w=news&id=<?=$r['id']?>">
				<?=$r['title']?>
				</a></td>
		<td><span style="padding-right:6px"> <a href="<?=get_option("url")?>admin/editNews.php?id=<?=$r['id']?>"><img src="<?=get_option("url")?>img/edit.png" width="16" height="16" /></a> <a id="delNews" href="<?=$r['id']?>"><img src="<?=get_option("url")?>img/delete.png" width="16" height="16" /></a> </span></td>
		<td><a href="editUser.php?w=teach&id=<?=$r['authorID']?>">
				<?=getNameById($r['authorID'], 0)?>
				</a></td>
		<td align="right" style="padding-right:6px"><?=$r['date']?></td>
</tr>
<?
$ch++;
				}	
				echo "<tr id=\"nfooter\"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>";
				}else{
			if(!is_numeric($limit)){die("wrong limit");}
			if($limit > 0){
		$q = mysql_query("SELECT * FROM  `news` ORDER BY `date` DESC LIMIT $start, $limit");	
			}else{$q = mysql_query("SELECT * FROM  `news` ORDER BY `date` DESC");	}
			while($r = mysql_fetch_array($q)){
					echo "";
					?>
<table id="novina" width="660" border="0" cellspacing="0" cellpadding="0">
		<tr>
				<td width="528"><a href="?do=view&w=news&id=<?=$r['id']?>"><strong>
						<h2>
								<?=$r['title']?>
						</h2>
						</strong></a></td>
				<td width="132" rowspan="2"><? if(isset($ok) && ($role == 0 || $role == 2)){?>
						<a href="<?=get_option("url")?>admin/editNews.php?id=<?=$r['id']?>"><img src="<?=get_option("url")?>img/edit.png" alt=""/></a>
						<? }?></td>
		</tr>
		<tr>
				<td><small>Публикувана на
						<?=$r['date']?>
						от <a href="user.php?w=teach&id=<?=$r['authorID']?>">
						<?=getNameById($r['authorID'], 0)?>
						</a></small></td>
		</tr>
		<tr>
				<td id="bdy" colspan="2"><?=$r['body']?>
						&nbsp;</td>
		</tr>
</table>
<br />
<?
				}	
			}//ok i role else
		}
		
		
		function getNewsTitles($limit){
			$q = mysql_query("SELECT * FROM  `news` ORDER BY `date` DESC LIMIT $limit");
			while($r=mysql_fetch_array($q)){
					echo "<a href=\"".get_option("url")."?do=view&w=news&id=$r[id]\">$r[title]</a>"."<br />";
				}
			}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function getClassStudents($cid){
			
			$q = mysql_query("SELECT * FROM `uchenik` WHERE `classID` = '$cid'");
	echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Име</td>
		<td>Номер в клас</td>
		<td>Операции</td>

</tr>	
EOT;
$v = 0;
		while($r = mysql_fetch_array($q)){
			?>
		<tr bgcolor="<?=($v%2 == 0) ? "#E3E3E3":"white"?>">
				<td><?=$r['ime']?></td>
				<td><?=$r['nomerVklas']?></td>
				<td><a href="editUser.php?w=stu&id=<?=$r['id'];?>"><img src="<?=get_option("url")?>img/edit.png"/></a> <a id="delStudent" href="<?=$r['id'];?>"><img src="<?=get_option("url")?>img/delete.png"/></a></td>
		</tr>
		<?
		$v++;
			}
			?>
<tr id="nfooter"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
<?
	
		}
		
		
		function getIeError(){
		echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0pt 0.7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span> 
					Използвате стар браузър и няма да можете да ползвате сайта както трябва! Вземете истински браузър, ползвайте <a href="http://getfirefox.com">Firefox</a>!</p>
				</div>

			</div>';		
		}
		
		function goHome(){echo "<script>gol('".get_option("url")."')</script>";}
		function gol($where){?><meta http-equiv="refresh" content="0;URL=<?=$where?>" /><? }
		function getClassDetail($det, $cid){
			$q = mysql_query("SELECT * FROM `class` WHERE `id` = $cid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}
		function getFullClassName($cid){
			$q = mysql_query("SELECT * FROM `class` WHERE `id` = $cid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[name]<sub>$r[dolu]</sub><sup>$r[gore]</sup>";
			}
		}
		
		function getStudentDetail($det, $uid){
		$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = $uid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}//get student detail
		
		function getUserDetail($det, $uid){
		$q = mysql_query("SELECT * FROM `user` WHERE `id` = $uid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}//get user detail
		
		function getSubjDetail($det, $uid){
		$q = mysql_query("SELECT * FROM `predmet` WHERE `id` = $uid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}//get subj detail
		
		function getParentDetail($det, $pid){
		$q = mysql_query("SELECT * FROM `roditel` WHERE `id` = $pid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}
		
		function setParentDetail($wha, $det, $pid){
		$q = mysql_query("UPDATE `roditel` SET `$wha` = '$det' WHERE `id` = $pid;");
		if($q){echo "ok";}else{echo "err";}
		}
		
		function setAbsDetail($wha, $det, $aid){
		$q = mysql_query("UPDATE `otsastvie` SET `$wha` = '$det' WHERE `id` = $aid;");
		if($q){echo "ok";}else{echo "err";}
		}
		function setUserDetail($wha, $det, $pid){
		$q = mysql_query("UPDATE `user` SET `$wha` = '$det' WHERE `id` = $pid;");
		if($q){echo "ok";}else{echo "err";}
		}
		
		function getStudents_list($id=-9){
		$q = mysql_query("SELECT * FROM `uchenik` ORDER BY `ime` ASC");
		while($r = mysql_fetch_array($q)){
					if($id == $r['id']){
					echo "<option value=\"$r[id]\" selected=\"selected\">>$r[name]</option>\n";
						}else{
					echo "<option value=\"$r[id]\">$r[ime]</option>\n";
					}
			}
		}
		
		function getAbs($uid, $rol=1){
		//id 	type 	date 	uchenikID 
		$q = mysql_query("SELECT * FROM `otsastvie` WHERE `uchenikID` = $uid");
		$izv = 0;
		$neizv = 0;
		$bri = "";
		$brn = "";
if($rol == 1){
	
	
	
	
	
	while($r = mysql_fetch_array($q)){
			if($r['type'] ==0){
				//echo "Неизвинено отсъствие от $r[date]<br />";
				$neizv++;
				$brn .= "<br />(<a rel=\"tooltip\" title=\"$r[date]<hr />$r[opisanie]\">$r[date]</a>)";
			}else{
				//echo "Извинено отсъствие от $r[date]<br />";
				$izv++;
				$bri .= "<br />
(<a rel=\"tooltip\" title=\"$r[date]<br />$r[opisanie]\">$r[date]</a>)";
}
			}
		echo "Извинени: $izv $bri<hr>";
		echo "Неизвинени: $neizv $brn";
	
	
	
	
	
	
	
	
	}else{
		while($r = mysql_fetch_array($q)){
			if($r['type'] ==0){
				//echo "Неизвинено отсъствие от $r[date]<br />";
				$neizv++;
				$brn .= "<br />(<a rel=\"tooltip\" title=\"$r[date]<hr />$r[opisanie]\">$r[date]</a>)<a rel=\"tooltip\" title=\"Изтриване на това отсъствие\" id=\"delAbs\" href=\"$r[id]\">".getIcon("delete.png", 16)."</a> <a rel=\"tooltip\" title=\"Извиняване на това отсъствие\" id=\"chAbs\" href=\"$r[id]\">".getIcon("ok.png", 16)."</a>";
			}else{
				//echo "Извинено отсъствие от $r[date]<br />";
				$izv++;
				$bri .= "<br />
(<a rel=\"tooltip\" title=\"$r[date]<br />$r[opisanie]\">$r[date]</a>)<a rel=\"tooltip\" title=\"Изтриване на това отсъствие\" id=\"delAbs\" href=\"$r[id]\">".getIcon("delete.png", 16)."</a>";
}
			}
		echo "Извинени: $izv $bri<hr>";
		echo "Неизвинени: $neizv $brn";
}//else
		}
		
		
		
		function getNotes($uid, $rol){
		$q = mysql_query("SELECT * FROM `notes` WHERE `uchenikID` = $uid");
		if(mysql_num_rows($q) < 1){echo("Този ученик няма забележки");}else{
		if($rol == 0 || $rol == 2){
		echo <<<ntbl
		<table id="tbl" width="100%"><tr id="ntitle"><td>id</td><td>Забележка</td><td>Предмет</td><td>Дата</td><td>От</td><td>Операции</td></tr>
		
ntbl;
		while($r = mysql_fetch_array($q)){
			echo "<tr><td>$r[id]</td><td>$r[note]</td><td><a href=\"editSubj.php?id=$r[predmetID]\">".getSubjDetail("name", $r['predmetID'])."</a></td><td>$r[date]</td><td>".getUserDetail("name", $r['userID'])."</td><td> <a id=\"delNote\" href=\"$r[id]\">".getIcon("delete.png", 16)."</a></td></tr>";
		}
		echo "<tr id=\"nfooter\"><td>&nbsp;</td><td>&nbsp;</td></tr></table>";
		}else{

		while($r = mysql_fetch_array($q)){
			?>
							<div id="abs"><?=$r['note']?>&nbsp;
							<small>sпо <?=getSubjDetail("name", $r['predmetID'])?>
							от <?=getUserDetail("name", $r['userID'])?></small></div>

<?
		}
			}
		}//else num zab
		}
		
		
		
		
		##########################################################
		##   Иначе трябва навсякъде да се пише един и същи код  ##
		##########################################################
		function getSearch($type, $srch=""){
			if(strlen($srch) < 1){
				$srch = "Търси...";
			}
		echo <<<srch
		<div id="searchfrm" style="float:right;margin-bottom:5px;">
		<form method="post" action="search.php?t=$type">
		<input type="text" class="inp" id="search" name="search" value="$srch"  onFocus="if(this.value=='Търси...')this.value='';"/>
		<input type="submit" value="Търси" class="inp" name="searchbtn" id="searchbtn" />
		</form></div><br /><br/>
srch;
		}


		
		function validateEmail($email){
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		function validateEGN($egn){
	$EGN_WEIGHTS = array(2,4,8,5,10,9,7,3,6);
	if (strlen($egn) != 10)
	{
		return false;
	}
	$year = substr($egn,0,2);
	$mon  = substr($egn,2,2);
	$day  = substr($egn,4,2);
	if($mon > 40)
	{
		if(!checkdate($mon-40, $day, $year+2000))
		{
			return false;
		}
	}
	else if ($mon > 20)
	{
		if (!checkdate($mon-20, $day, $year+1800))
		{
			return false;
		}
	}
	else
	{
		if (!checkdate($mon, $day, $year+1900))
		{
			return false;
		}
	}
	$checksum = substr($egn,9,1);
	$egnsum = 0;
	for($i=0;$i<9;$i++)
	{
		$egnsum += substr($egn,$i,1) * $EGN_WEIGHTS[$i];
	}
	$valid_checksum = $egnsum % 11;
	if ($valid_checksum == 10)
	{
		$valid_checksum = 0;
	}
	if ($checksum == $valid_checksum)
	{
		return true;
	}
		}










		
		function getNewsDetail($det, $nid){
			if(!is_numeric($nid)){die();}
				$q = mysql_query("SELECT * FROM `news` WHERE `id` = $nid");
			
		while($r = mysql_fetch_array($q)){
			echo "$r[$det]";
			}
			}


	function getPageDetail($det, $nid){
			if(!is_numeric($nid)){die();}
				$q = mysql_query("SELECT * FROM `page` WHERE `id` = $nid");
			
		while($r = mysql_fetch_array($q)){
			echo "$r[$det]";
			}
			}



			####
			# @param $tablica tablicata, v koqto da byrkame
			# @param $row red
			# @param $ret tova, koeto shte vryshta funkciqta
			####

		function get($tablica, $row, $var, $ret){ //universalen get
			$q = mysql_query("SELECT * FROM `$tablica` WHERE `$row` = '$var'");
		while($r = mysql_fetch_array($q)){
				return "$r[$ret]";
			}
			}
		function get_option($key){
			
				$q = mysql_query("SELECT * FROM `option` WHERE `key` ='". mysql_real_escape_string($key)."'");
				while($r = mysql_fetch_array($q)){
						return "$r[value]";
					}
			}//get option
			
		function update_option($key, $newvalue){
				$q = mysql_query("UPDATE `option` SET `value` = '$newvalue' WHERE `option`.`key` ='$key';");
				if($q){
					return 1;
					}else{
					return 0;
					}
		}//update option
		
		function getTooltip($tip){echo '<a rel="tooltip" id="hlp" title="'.$tip.'">'.getIcon("q.png", 16).'</a>';}
		
			
			
			
			
			
			// DA GO OPRAVQ POSLE
	function startPagination($tbl){
		pagination($tbl);
	}
			
			
			
	function pagination($tbl, $sysedni= 3, $limit = 5, $ok=0, $role=-9, $adm=0){
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/

	$query = "SELECT COUNT(*) as num FROM $tbl";
	$all_pgs = mysql_fetch_array(mysql_query($query));
	$all_pgs = $all_pgs['num'];
	
	/* Setup vars for query. */
	 	//your file name  (the name of this file)
 	$page = isset($_GET['page']) ? $_GET['page']:"";
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	//echo "$start $limit";
	/* Get data. *//*
	$sql = "SELECT * FROM $tbl LIMIT $start, $limit";
	$result = mysql_query($sql);
	*/
	switch($tbl){
	case "uchenik";
	$targetpage = "?do=view&w=students&page";
	getAllStudents($start, $limit);
	break;
	case "user";
	getTeachers($start, $limit);
	break;
	case "news";
	//($limit, $ok=0, $role=-9, $start=0, $admin=0)
 	if($adm ==1){
		
		getNews($limit, $ok, $role, $start, 1);
		$targetpage = "?do=view&w=news&page";
	}else{
	
		getNews($limit, $ok, $role, $start, 0);
	$targetpage = "?page";
	}
	break;
	case "news_admin";
	//$limit, $ok=0, $role=-9, $start=0, $admin=0
	getNews($limit, 1, 0, $start, 1);
	$targetpage = "&page";
	break;

	case "page";
	$targetpage = "?do=view&w=pages&page";
	getPages($role, $start, $limit);

	break; //break 	pages
	
	case "roditel";
	$targetpage = "?do=view&w=parents&page";
	getParents($role, $start, $limit);
	break; //break roditel
	
	
	
	default;
	break;
	}
	/* data */
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($all_pgs/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the stranici object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$stranici = "";
	if($lastpage > 1)
	{	
		$stranici .= "<br /><br /><small>Резултати от ".($start+1)." до ".$limit." от $all_pgs</small><div class=\"stranici\">";
		//previous button
		if ($page > 1) 
			$stranici.= "<a href=\"$targetpage=$prev\">&laquo; предишна</a>";
		else
			$stranici.= "<span class=\"disabled\">&laquo; предишна</span>";	
		
		//pages	
		if ($lastpage < 7 + ($sysedni* 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$stranici.= "<span class=\"current\">$counter</span>";
				else
					$stranici.= "<a href=\"$targetpage=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($sysedni* 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($sysedni* 2))		
			{
				for ($counter = 1; $counter < 4 + ($sysedni* 2); $counter++)
				{
					if ($counter == $page)
						$stranici.= "<span class=\"current\">$counter</span>";
					else
						$stranici.= "<a href=\"$targetpage=$counter\">$counter</a>";					
				}
				$stranici.= "...";
				$stranici.= "<a href=\"$targetpage=$lpm1\">$lpm1</a>";
				$stranici.= "<a href=\"$targetpage=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($sysedni* 2) > $page && $page > ($sysedni* 2))
			{
				$stranici.= "<a href=\"$targetpage=1\">1</a>";
				$stranici.= "<a href=\"$targetpage=2\">2</a>";
				$stranici.= "...";
				for ($counter = $page - $sysedni; $counter <= $page + $sysedni; $counter++)
				{
					if ($counter == $page)
						$stranici.= "<span class=\"current\">$counter</span>";
					else
						$stranici.= "<a href=\"$targetpage=$counter\">$counter</a>";					
				}
				$stranici.= "...";
				$stranici.= "<a href=\"$targetpage=$lpm1\">$lpm1</a>";
				$stranici.= "<a href=\"$targetpage=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$stranici.= "<a href=\"$targetpage=1\">1</a>";
				$stranici.= "<a href=\"$targetpage=2\">2</a>";
				$stranici.= "...";
				for ($counter = $lastpage - (2 + ($sysedni* 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$stranici.= "<span class=\"current\">$counter</span>";
					else
						$stranici.= "<a href=\"$targetpage=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$stranici.= "<a href=\"$targetpage=$next\">следваща &raquo;</a>";
		else
			$stranici.= "<span class=\"disabled\">следваща &raquo;</span>";
		$stranici.= "</div>\n";		
	}
	echo $stranici;
	}	
			
			
			
			
			

	//Това трябва да го сложа на повече места, иначе идват много еднакви неща от рода на del* 
	function del($table, $id){
		$q = mysql_query("DELETE FROM `$table` WHERE `id` = '$id'");
		if($q){echo "ok";}else{echo "error: ".mysql_error();}
		}
	
	function mnuitem($text, $href, $title){echo "<a id=\"umenuitem\" href=\"$href\" rel=\"tooltip\" title=\"$title\">$text</a>";}
	
	function getIcon($ico, $h=48, $attr=""){return "<img src=\"".get_option("url")."img/icons/$ico\" $attr height=\"$h\" />";}
	
	function js($js){return "<script type=\"text/javascript\">$js</script>";}
	
	function getPageTitles($addlinks = true){
			$q = mysql_query("SELECT * FROM `page`");
			while($r = mysql_fetch_array($q)){
				if($addlinks){
				echo "<a href=\"".get_option("url")."?do=view&w=pages&page_id=$r[id]\" id=\"page$r[id]\">$r[title]</a>";
				}else{
				echo "<a href=\"\" id=\"page$r[id]\">$r[title]</a>";
				}
			}//while
			
		}
	
			
	function getPages($role, $start=0, $limit=100){
			$q = mysql_query("SELECT * FROM `page` LIMIT $start, $limit");
			if(mysql_num_rows($q) <=0){
			echo "Страниците се показват тук. Добавете няколко, за да ги видите.";
			}else{
			?>

<table id="tbl" width="100%">

		<tr id="ntitle">
				<td></td>
				<td>Страница</td>
				<td>Операции</td>
				<td>Автор</td>
				<td>Дата</td>
		</tr>
		<?
			$v=1;
			while($r = mysql_fetch_array($q)){
			?>
		<tr  style="border-top: 1px solid black;background:<?=($v%2 == 0)? "#E3E3E3":"white"?>" >
				<td></td>
				<td><a href="<?=get_option("url")?>?do=view&w=pages&page_id=<?=$r['id']?>">
						<?=$r['title']?>
						</a></td>
				<td><a href="editPage.php?id=<?=$r['id']?>">
						<?=getIcon("edit.png", 16)?>
						</a><a id="delPage" href="<?=$r['id']?>">
						<?=getIcon("delete.png", 16)?>
						</a></td>
				<td><?=getUserDetail("name", $r['authorID'])?></td>
				<td><?=$r['date']?></td>
		</tr>
		<?
				$v++;
			}//while
			?>
		<tr id="nfooter">
				<td></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td></td>
		</tr>
</table>
<?		

	}//else
}

			
	function getPage($id, $ok=0, $role=-9){


		?>
<table width="660px">
		<tr>
				<td></td>
		</tr>
		<?
		$q = mysql_query("SELECT * FROM `page` WHERE `id`='$id'");
		if(mysql_num_rows($q) <=0){
			echo "error";
			}else{
			while($r = mysql_fetch_array($q)){
			?>
		<script type="text/javascript">
actlink('#page<?=$r['id']?>')
where("<a href='<?=get_option("url")?>'>Начало</a> &rarr; <?=$r['title']?>")

</script>
		<tr>
				<td height="45"><h2><?=$r['title']?></h2></td>
		</tr>
		<tr>
				<td height="197" valign="top"><?=$r['body']?></td>
		</tr>
		<tr>
				<td valign="baseline"><small>Публикувана от
						<?=getUserDetail("name", $r['authorID'])?>
						на
						<?=$r['date']?>
						<?
					echo ($ok==1 && ($role==0 || $role == 2)) ? "<a href=\"admin/editPage.php?id=$r[id]\">".getIcon("edit.png", 16)."</a>":"";
					?>
						</small></td>
		</tr>
		<?
			}//while
			
			?>
</table>
<?
		}// else 0
	}
	
	
	
	
	
	function getParents($role, $start, $end){
	echo <<<EOT
	<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Потребителско име</td>
		<td>Име</td>
		<td>Имейл</td>
		<td>Одобрен</td>
		<td>Операции</td>
</tr>	
EOT;
$q = mysql_query("SELECT * FROM `roditel` ORDER BY `date` DESC LIMIT $start, $end ");
$v=1;
while($r=mysql_fetch_array($q)){
	?>

<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
		<td><?=$r['username']?></td>
		<td><?=$r['name']?></td>
		<td><?=$r['email']?></td><td><?=($r['state'] > 0)?"<span style=\"color:green\">да</span>":"<span style=\"color:red\">не</span>" ?></td>
		<td><a href="editUser.php?w=par&id=<?=$r['id'];?>"><?=getIcon("edit.png", 16)?></a> <a id="delParent" href="<?=$r['id'];?>"><?=getIcon("delete.png", 16)?></a>  / <a href="<?=$r['id']?>" id="apprP"><?=getIcon("ok.png", 16)?></a> <a href="<?=$r['id']?>" id="unapprP"><? echo getIcon("cancel.png", 16)?></a> </td>
</tr>
<?
$v++;
}

	echo '<tr id="nfooter"><td>&nbsp;</td></tr></table>';

		
	}	
	
	
	
	
	function cnt($tbl, $more =""){
		$q = mysql_query("SELECT * FROM `$tbl` $more");
		$w = 0;
		while($r = mysql_fetch_array($q)){
			$w++;
			}
		return $w;
	}
	
	
	function list_files($dir, $t=0, $frm = ""){
		$q = mysql_query("SELECT * FROM `files` ORDER BY `date` DESC");
  if(is_dir($dir))
  {
    if($handle = opendir($dir))
    {
		if($t==0){
					echo <<<tbl
			<table id="tbl" border="0" width="100%"><tr id="ntitle"><td>&nbsp;</td><td>&nbsp;</td><td>Файл</td><td>Операции</td><td>Дата</td><td>От</td></tr>
tbl;
      //while(($file = readdir($handle)) !== false)
      $v=0;
	  while($r=mysql_fetch_array($q)){
		  $file = $r['file'];
        if($file != "." && $file != ".." && $file != "Thumbs.db"/*avoid windows crap...*/)
        {
			$c = ($v%2==0) ? "#E3E3E3":"white";
          echo '<tr bgcolor="'.$c.'"><td>&nbsp;</td><td><a target="_blank" href="'.get_option("url")."files/".$file.'"><img width="40" src="'.get_option("url")."files/".$file.'" /></a></td><td><a target="_blank" href="'.get_option("url")."files/".$file.'">'.$file.'</a><br>'."</td><td><a href=\"delFile.php?id=$r[id]\">".getIcon("delete.png", 16)."</a></td><td>$r[date]</td><td><a href=\"editUser.php?w=teach&id=$r[userID]\">".getUserDetail("name", $r['userID'])."</a></td></tr>\n";
        $v++;
        }
      }
	  echo "<tr id=\"nfooter\"><td>&nbsp</td></tr></table>";
		}//if t = 0
		else{
			while($r=mysql_fetch_array($q)){
		  $file = $r['file'];
        if($file != "." && $file != ".." && $file != "Thumbs.db"/*avoid windows crap...*/)
        {
			$img = "<img width=\'40\' src=".get_option("url")."files/".$file." />";
			echo '<img width="40" src="'.get_option("url")."files/".$file.'" onclick="addtxt(\'nbody\', \''.$img.'\')" />';
			}//if wincrap
			}//while
			}
      closedir($handle);
    }
  }
}
	
	
	
	
	
	
	?>
