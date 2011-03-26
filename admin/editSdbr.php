
<?
if(defined(INSIDE)){
	if(isset($_POST['saveApp'])){
		$text = htmlspecialchars($_POST['txt']);
		//echo update_option("headfgcolor", $headfgcolor);
		if(update_option("text", $text)){
								?><script type="text/javascript">
gol("?do=edit&w=sdbr&message=0");
</script><?

			}
		}
?>

<form method="post" action="">
  <p>
  </p>
  <table width="700" border="0" cellspacing="5" cellpadding="5">
    <tr>
    <td><textarea rows="10" cols="80" id="txt" name="txt"><?=get_option("text")?></textarea></td>
    
    </tr>
    
    
    		<td>&nbsp;</td>
    		<td><input type="submit" class="inp" name="saveApp" id="saveApp" value="Запази промените" /></td>
    		</tr>
   
  </table>
  <p>&nbsp;</p>
</form><br />
<br />
<div id="help">
<?=getIcon("q.png", 16)?>Това е текстът, който се показва в страничната лента.<br />
</div>
<?
}
else{echo "gtfo";}
