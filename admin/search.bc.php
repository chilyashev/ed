<?
##########################################################################
## файл с много глупости, за да може search.php да изглежда по-добре :D ##
##########################################################################

function what($w, $result, $i, $ok=0, $role=-9){
	if(mysql_num_rows($result) == 0){exit();}
	if(isset($w)){
 
		/*echo <<<tbl
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0"><tr></tr>
tbl;
while($r=mysql_fetch_array($result))
{	
$i++;
what($t, $r, $i);  
}//while
echo <<<tble
<tr id="nfooter"><td>&nbsp;</td></tr></table>
tble;*/
		switch($w){
		default;
		echo "default //must add ($w)";
		break;
		
		
		
		
		case "uchenik";
		//id 	ime 	egn 	pass 	address 	email 	nomerVklas 	classID 	snimka 	dateReg 	note 	role 	roditelID

			echo <<<EOT
<table width="100%" id="tbl" border="0" cellspacing="0" cellpadding="0">
<tr height="1em" id="ntitle">
		<td style="padding-left:6px">Име</td>
		<td>Операции</td>
		<td>Клас</td>
</tr>	
EOT;
$v=1;
while($r=mysql_fetch_array($result)){
	?>

<tr bgcolor="<?=($v%2==0) ? "#E3E3E3":"white"?>">
  <td><?=$r['ime']?>
    &nbsp;</td>
  <td><a href="editUser.php?w=stu&id=<?=$r['id'];?>"><img src="<?=get_option("url")?>img/edit.png"/></a> <a id="delStudent" href="<?=$r['id'];?>"><img src="<?=get_option("url")?>img/delete.png"/></a></td>
  <td><?=getClassDetail("name", $r['classID'])?><sup><?=getClassDetail("gore", $r['classID'])?></sup><sub><?=getClassDetail("dolu", $r['classID'])?></sub></td>
</tr>
<?
$v++;
}
	 
	echo '<tr id="nfooter"><td>&nbsp;</td></tr></table>';
 
		break;//break uchenik
		
		
		
		
		
		
		case "user";
		while($r = mysql_fetch_array($result)){
		$id=$r['id'];
 		$class = $r['classID'];
 		$cd = getFullClassName($class);
  		$username=$r['username'];
 
  		 $name = getUserDetail("name", $id);
   echo "<a title=\"Редактирай $name\" href=\"editUser.php?w=teach&id=$r[id]\" \">$name</a> - учител на клас <a href=\"editClass.php?id=$class\">$cd</a> по <a href=\"editSubj.php?id=$r[predmetID]\" \">$r[name]</a><hr/>";
		
		}//while
		break;//break user
		
		
		
		
		case "roditel";
		while($r = mysql_fetch_array($result)){
		   $id=$r['id'];
 
   $username=$r['username'];
   $name = $r['name'];
   $kidID=$r['kidID'];
   $kid = getStudentDetail("ime", $kidID);
   echo "<a title=\"Редактирай $name\" href=\"editUser.php?w=par&id=$r[id]\" \">$username</a>, родител на <a href=\"editUser.php?w=stu&id=$kidID\">$kid</a><hr/>";
		
		}//while
		
		break; // break roditel
		
		
		
		
		
		
		
		
		
		
		
		
		case "subjs";
while($r = mysql_fetch_array($result)){
		   $id=$r['id'];
 
   $name=$r['name'];
   $class=$r['class'];
   $userID=$r['userID'];
   //display the row
   $cd = getFullClassName($class);
   $ud = getUserDetail("name", $userID);
   echo "<a title=\"Редактирай $name\" href=\"editSubj.php?id=$r[id]\" \">$r[name]</a> за клас <a href=\"editClass.php?id=$class\">$cd</a>, учител <a href=\"editUser.php?w=teach&id=$userID\">$ud</a><hr />";
		
		}//while
		
		break; //break subjs
		
		
		case "classes";
while($r = mysql_fetch_array($result)){
	$id=$r['id']; 
	$specialnost = $r['specialnost'];
	$name = getFullClassName($id);
	
	echo "<a title=\"Редактирай $name\" href=\"editClass.php?id=$r[id]\" \">$name</a> $specialnost<hr />";
		
		}//while
		
		break; //break subjs
		
		
		
		
		
		}//switch $w
		}//if isset $w	
	}
?>
