<? 
include "../conf/fnoc.php";

if(function_exists($_GET['method']) && isset($_GET['id']) && $_GET['method'] != "getAbs"){
		$_GET['method']($_GET['id']);
	}
	
if(function_exists($_GET['method']) && isset($_GET['id']) && isset($_GET['type'])){
		$_GET['method']($_GET['id'], $_GET['type']);
	}
	
if(function_exists($_GET['method']) && isset($_GET['user']) && isset($_GET['pass'])){
		$_GET['method']($_GET['user'], $_GET['pass']);
	}

	
function getAllUsers(){
		$q = mysql_query("SELECT * FROM `user`");
		$users = array();
		while($user = mysql_fetch_array($q)){
				$users[] = $user;
			}
		$users = json_encode($users);
		echo /*$_GET['jsoncallback'].*/ '('. $users . ')';
	}

function getGrades($id){
	header('Content-type: text/xml');
		$q = mysql_query("SELECT * FROM `ocenka` WHERE `uchenikID` = $id");
		$output  = "<?xml version=\"1.0\"?>\n";
$output .= "<grades>\n";
 while($r = mysql_fetch_array($q)){
$output .= "<grade> \n";
$output .= "<grade_id>" . $r['id'] . "</grade_id> \n";
$output .= "<grade_val>" . $r['value'] . "</grade_val> \n";
$output .= "<predmet_id>" . $r['predmetID'] . "</predmet_id> \n";
$output .= "<uchenik_id>" . $r['uchenikID'] . "</uchenik_id> \n";
$output .= "<date>" . $r['date'] . "</date> \n";
$output .= "</grade> \n";
			}

		$output .= "</grades>";
		echo $output;
 
	}
	
function getSubj($id){
		$q = mysql_query("SELECT * FROM `predmet` WHERE `id` = $id");
		while($r = mysql_fetch_array($q)){
			echo $r['name'];
			}
	}

function login($user, $pass){
	$username = htmlspecialchars($_GET['user']);
	$pass = (htmlspecialchars($_GET['pass']));
	$role = 0;
	$realpass = "";
	$role = -9;
	$q = mysql_query("SELECT * FROM `roditel` WHERE `username` = '$username' AND `state` = 1");
	while($r = mysql_fetch_array($q)){
		//username 	pass 	
		$realpass = $r['password'];
		$role = $r['role'];
		$realname = $r['username'];
		$rn = $realname;
		}

			if($pass != $realpass || $username != $realname){
				echo "false";
				}
			else{
				echo "true"; 
				}//veche moje da vleze
}


function getKids($id){

	$q = mysql_query("SELECT * FROM `roditel` WHERE `id` = $id");
		while($r = mysql_fetch_array($q)){
			echo str_replace(", ", " ", $r['kidID']);
			}
	}
function getRodID($name){
		$q = mysql_query("SELECT * FROM `roditel` WHERE `username` = '$name'");
		while($r = mysql_fetch_array($q)){
			echo $r['id'];
			}			
}

function getStuName($id){
	$q = mysql_query("SELECT * FROM `uchenik` WHERE `id` = $id");
		while($r = mysql_fetch_array($q)){
			echo $r['ime'];
			}
	}

function getAbs($id, $type){
		$q = mysql_query("SELECT * FROM `otsastvie` WHERE `uchenikID` = '$id' AND `type` = '$type'");
		$w = 0;
		while($r = mysql_fetch_array($q)){
			$w++;
			}
		echo $w;
	}

function getZabXml($id){
	//note 	predmetID 	date 	uchenikID 	userID
			header('Content-type: text/xml');
		$q = mysql_query("SELECT * FROM `notes` WHERE `uchenikID` = $id");
		$output  = "<?xml version=\"1.0\"?>\n";
$output .= "<zab>\n";
 while($r = mysql_fetch_array($q)){
$output .= "<note> \n";
$output .= "<note_id>" . $r['id'] . "</note_id> \n";
$output .= "<note_val>" . $r['note'] . "</note_val> \n";
$output .= "<predmet_id>" . $r['predmetID'] . "</predmet_id> \n";
$output .= "<uchenik_id>" . $r['uchenikID'] . "</uchenik_id> \n";
$output .= "<date>" . $r['date'] . "</date> \n";
$output .= "</note> \n";
			}

		$output .= "</zab>";
		echo $output;
 
	}

function getZab($id){
	//note 	predmetID 	date 	uchenikID 	userID
		$q = mysql_query("SELECT * FROM `notes` WHERE `uchenikID` = $id");
		if(mysql_num_rows($q) < 1){
			echo "Този ученик няма забележки.\n";
			}
		while($r = mysql_fetch_array($q)){
			echo "$r[note] от дата $r[date] в час по ".getSubjDetail("name", $r['predmetID'])."\n";
			}
	}



function getSubjDetail($det, $uid){
		$q = mysql_query("SELECT * FROM `predmet` WHERE `id` = $uid");
			
		while($r = mysql_fetch_array($q)){
			return "$r[$det]";
			}
		}//get subj detail



	function cnt($tbl, $more =""){
		$q = mysql_query("SELECT * FROM `$tbl` $more");
		$w = 0;
		while($r = mysql_fetch_array($q)){
			$w++;
			}
		return $w;
	}
?>