<?
if(isset($_SERVER[HTTP_REFERER])){
include "../conf/fnoc.php";
include "functions.php";
if(isset($_GET['do'])){
	$d = $_GET['do'];
	switch($d){
		case "checkLogin";
			if(isset($_POST['egn'])){
				checkLoginEGN($_POST['egn']);
			}else{
				echo "err";
			}
		break;
		
		
	default;
	echo "error";
	break;
	}//switch do
	}//isset do
}//if referer
	
?>