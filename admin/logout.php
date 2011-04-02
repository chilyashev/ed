<? ob_start() ?>
<script>
function deletecookie(name) {
var expdate = new Date();
expdate.setTime(expdate.getTime() - 1);
document.cookie = name += "=; expires=" + expdate.toGMTString();
}
deletecookie("user");
deletecookie("pass");
deletecookie("egn");
</script>

<?

   
      setcookie("user", "", 1, "/");
      setcookie("pass", "", 1, "/");
      setcookie("egn", "", 1, "/");
/*
 if(setcookie("user", "", time()+3600, "/") &&  setcookie("pass", "", time()+3600, "/") && setcookie("egn", "", time()+3600, "/")){*/
echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
/* }
 else{
	 echo "BOOOOM!";
	 }*/
	 ob_flush();
 ?>
