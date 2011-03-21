<? 
include "../conf/fnoc.php";
if(function_exists($_GET['method']) && isset($_GET['id'])){
		$_GET['method']($_GET['id']);
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
?>