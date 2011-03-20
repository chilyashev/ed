<?
$c="./";
include "inc/header.php";	
 
if($ok){
	if($role == 1){
		getGrades_e(getIDbyEGN($_COOKIE["egn"]), 1, 0);
	}else if($role == 3){
		getGrades_e(($_GET['id']), 1, 0);
	}else if(!isset($_GET['id'])){
		echo "Вие не сте ученик.";
		}
	
	
	}// if logged
	else{
		echo "Трябва да влезете, за да си видите отсъствията.";
		}// else logged
 
include "inc/footer.php";
?> 