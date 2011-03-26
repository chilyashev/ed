<?
$c="./";
include "inc/header.php";	
 ?>
 <script type="text/javascript">
actsidebarlink("#grades");
where("<a href='<?=get_option("url")?>'>Начало</a> &rarr; Оценки");
</script>
<h2>&raquo;Оценки</h2><br /><br />

 <?
if($ok){
		$vid = get_option("ocenkiVid");
	if($role == 1){

		getGrades_e(getIDbyEGN($_COOKIE["egn"]), 1, $vid);
	}else if($role == 3){
		getGrades_e(($_GET['id']), 1, $vid);
	}else if(!isset($_GET['id'])){
		echo "Вие не сте ученик.";
		}
	
	
	}// if logged
	else{
		echo "Трябва да влезете, за да си видите отсъствията.";
		}// else logged
 
include "inc/footer.php";
?> 
