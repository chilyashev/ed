<?
########################################################
## трябва да изкара нещо от рода на 6 март 2011 16:56 ##
########################################################


//echo $data;
function data(){
	
$meseci = array();
$meseci[1] = "януари";
$meseci[2] = "февруари";
$meseci[3] = "март";
$meseci[4] = "април";
$meseci[5] = "май";
$meseci[6] = "юни";
$meseci[7] = "юли";
$meseci[8] = "август";
$meseci[9] = "септември";
$meseci[10] = "октомври";
$meseci[11] = "ноември";
$meseci[12] = "декември";
$dni = array();
$den = date("d");
$mes = $meseci[date("n")];
$god = date("Y");
$chas = date("H:i:s");
$data = "$den $mes $god $chas";
		return $data;
	}


?>