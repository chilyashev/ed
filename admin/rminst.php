<?
if(file_exists("../install/index.php")){
if(unlink("../install/index.php") && unlink("../install/sql.sql")){
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}else{
			echo "Файловете не можаха да бъдат изтрити. Уверете се, че имате права за писане в директорията или се свържете със системния си администратор.";
			}
}
?>