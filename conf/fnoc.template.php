<?
error_reporting(E_ALL);
ini_set("display_errors", 1); 
//nastroiki
$version = "v 1.61b";
include "data.php";
###### glavni ######
$global = array();
$global['sqlserver'] = "localhost";
global $ok, $role, $id;
###### /glavni #######

###### sql #######
$sql = array();
$sql['host'] = "localhost";
$sql['user'] = "root";
$sql['pass'] = "password";
$sql['db_prefix'] = ""; //в следващата версия...
$sql['db'] = $sql['db_prefix']."dnevnik";
###### /sql ######
mysql_connect($sql['host'], $sql['user'], $sql['pass']) or die("Error connecting to mysql: ".mysql_error());
mysql_select_db($sql['db']) or die("Error selecting db: ".mysql_error());
define("INSIDE", "true");
define("PATH", getcwd());
?>
