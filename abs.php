<?
$c="./";
include "inc/header.php";	
?>
<script type="text/javascript">
actsidebarlink("#absp");
where("<a href='<?=get_option("url")?>'>Начало</a> &rarr; Отсъствия");
</script>
<h2>&raquo;Отсъствия</h2><br /><br />
<?
/*** messy, messy... ***/
if($ok){
	if($role == 1){
getAbs(getIDbyEGN($_COOKIE["egn"]), 1);
	}else if($role == 3){
		getAbs($_GET['id'], 1);
	}else if(!isset($_GET['id'])){
		echo "Вие не сте ученик.";
		}
	
	
	}// if logged
	else{
		echo "Трябва да влезете, за да си видите отсъствията.";
		}// else logged
 
include "inc/footer.php";
?>