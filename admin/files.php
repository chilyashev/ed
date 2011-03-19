<? 
include "admheader.php";
if(INSIDE && $ok){
?>
<script>actadmlink("#files")</script>
<h2>&raquo;Файлове</h2>	
<br />
<br />
		<h3>Качване:</h3>
		Файл: <form enctype="multipart/form-data" action="" method="POST">
<input name="logo" type="file" /><input name="go" type="submit" id="go" value="Качи" /></form>
<br />
<br />
<br />

<h3>Файлове:</h3>
	<?
if(isset($_POST['go'])){ 
$date = data();
$file=$_FILES['logo']['name'];
$tmp_file=$_FILES['logo']['tmp_name'];
$size=$_FILES['logo']['size'];
$upload_path= getcwd()."/../files/".basename($file);
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
$type = 1; // за да може всички файлове да са в една таблица type{0=avatar, 1=img}
	$f = basename($file);
$q=mysql_query("INSERT INTO `files` (
`id` ,
`file` ,
`type` ,
`date` ,
`userID`
)
VALUES (
NULL , '$f', '$type', '$date', '$id'
);
");
if($q)
{
echo "uploaded";
}else{
echo "error";
exit;
}
}
}else{

}
list_files(getcwd()."/../files/");
include "footer.php";
}//if inside
else{
echo "403";

}
?>
