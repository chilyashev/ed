<?
$c="./";
include "inc/header.php";	
if(!$ok){goHome();}
switch($role){
	case 0:
	case 2:
	$snimka = getUserDetail("snimka", $id);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" width=\"40\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
 
	break;
	
	case 1:
	$snimka = getStudentDetail("snimka", $id);
		$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\"  height=\"100\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
 
	break;




	case 3;	
	$snimka = getParentDetail("snimka", $id);
	$sn = "<img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\" />";
		if(strlen($snimka) <3){
			$sn = "<img src=\"".get_option("url")."img/userpics/nopic.png\" height=\"100\" /><br>";
		}
 
	break;
}//switch role
?>

<h2>&raquo;Промяна на снимка</h2><br><br><br>
<form enctype="multipart/form-data" action="" method="POST">
		
		<table width="600px" border="0" cellspacing="0" cellpadding="0">
		<tr>
				
				<td><?
if(isset($_POST['go'])){ 

$file=$_FILES['logo']['name'];
$tmp_file=$_FILES['logo']['tmp_name'];
$size=$_FILES['logo']['size'];
$ext = substr(strrchr($file, "."), 1); 
$rndm = uniqid(rand()).".".$ext;//basename($file);
$upload_path= getcwd()."/img/userpics/".$rndm;
/*if(file_exists($upload_path)){
echo "file exists";
exit;
}*/
if($size==0){
echo "Повреден файл.";
exit;
}
if($size>9999999999){
echo "Файлът е прекалено голям.";
exit;
}

$extensions = array("jpg","png","gif");
$extension_file = end(explode(".",$file));
$extension_file = strtolower($extension_file);
if(!in_array($extension_file,$extensions)){
echo "Неразрешен файл.";
exit;
}
$upload=move_uploaded_file($tmp_file,$upload_path);
if($upload){
	if(strlen($snimka) > 4){
	unlink(getcwd()."/img/userpics/".$snimka);
	}
	$f = $rndm;
switch($role){
	case 0:
	case 2:
	$q=mysql_query("UPDATE `user` SET `snimka` = '$f' WHERE `id` ='$id';");
	$snimka = getUserDetail("snimka", $id);
	break; //0
	case 1;
	$q=mysql_query("UPDATE `uchenik` SET `snimka` = '$f' WHERE `id` ='$id';");
	$snimka = getStudentDetail("snimka", $id);
	break;// 1
	case 3;//3
	$q=mysql_query("UPDATE `roditel` SET `snimka` = '$f' WHERE `id` ='$id';");
	$snimka = getParentDetail("snimka", $id);
	break; //3
	
	}//role
if($q)
{
wrn("Снимката сменена успешно", "", "600px");
echo "<center><img src=\"".get_option("url")."img/userpics/".$snimka."\" height=\"100\"/></center><br><br><br>";
}else{
echo "error";
exit;
}
}
}else{
echo "<center>".$sn."</center><br>";
}
?></td>
		</tr>
		<tr>
				<td>Нова снимка: <input name="logo" type="file" /><input name="go" type="submit" id="go" value="Качи" /></td>
		</tr>
</table>
</form></p>
</div> <!-- #main -->
<?
include "inc/footer.php";
?></div><!-- #content -->
</div> <!-- #wrapper -->
<br />
<br />
</body>
</html>
