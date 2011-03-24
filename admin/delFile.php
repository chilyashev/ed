<?
include "admheader.php";
if(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'];
	
	if(isset($_GET['c'])){
	$q = mysql_query("DELETE FROM `files` WHERE `id` = $id");
	if($q){
		wrn("Файлът изтрит успешно.");
		echo '<meta http-equiv="refresh" content="1;URL=files.php">';
		}
	}

?>
<style>
#y{
	background: #0C0;
	border-radius: 6px;
	padding: 3px;
}

#n{
	background: #F00;
	border-radius: 6px;
	padding: 3px;
}
#y a, #n a{text-decoration:none;}
</style>
<h2>&raquo;Изтриване на <?=getFileDetail("file", $id)?>?</h2>
<br>
<br>
<span id="y"><a href="?id=<?=$id?>&c=y">Да</a></span>
<span id="n"><a href="files.php">Не</a></span>
<br>
<br>
<br>
<br>
<br>
<br>

<?
}else{
	error("Невалидно id.");
	}

include "footer.php";
?>