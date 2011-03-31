<?
include "admheader.php";
?>
 
<form enctype="multipart/form-data" action="" method="POST">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
				
				<td><?
if(isset($_POST['go'])){ 

$file=$_FILES['logo']['name'];
$tmp_file=$_FILES['logo']['tmp_name'];
$size=$_FILES['logo']['size'];
$upload_path= getcwd()."/../img/logo/".basename($file);
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
	unlink(getcwd()."/../img/logo/".get_option("logo"));
	$f = basename($file);
$q=mysql_query("UPDATE `option` SET `value` = '$f' WHERE `option`.`key` ='logo';");

if($q)
{
echo "Качено!<script>location.href=\"".get_option("url")."admin?do=edit&w=app\"</script>";
}else{
echo "error";
exit;
}
}
}else{
echo '<div style="margin: 0 auto;"><img src="'.get_option("url")."img/logo/".get_option("logo").'" width="100px" ></div>';

}
?></td>
		</tr>
		<tr>
				<td>Изберете лого: </td>
				<td><input name="logo" type="file" /></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
				<td><input name="go" type="submit" id="go" value="Качи" /></td>
		</tr>
</table>
</form>
<br />
<br />
<br />


 	<?
	include "footer.php";
	?>
