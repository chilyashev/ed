<?
include "admheader.php";
?>
 <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
	});
</script>
<?

	if(isset($_POST['save'])){
		$date = date("l, F d Y H:i:s");
		$title = htmlspecialchars($_POST['title']);
		$body = $_POST['body'];
		$q = mysql_query("UPDATE `page` SET `title` = '$title',
`body` = '$body' WHERE `id` =$_GET[id];
");
if($q){wrn("Промените запазени.");}else{wrn("Грешка!");}
	}
?>
<form name="news" method="post" action="">
		<table width="566" border="0" cellpadding="3" cellspacing="0">
				<tr>
						<td><label for="title">Заглавие</label></td>
						<td colspan="2"><input name="title" type="text" class="inp" id="title" value="<?=getPageDetail("title", $_GET['id'])?>" size="50"></td>
				</tr>
				<tr>
						<td rowspan="2">&nbsp;</td>
						<td colspan="2" align="right">
								<a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('body').show();">Графичен редактор</a>
								<a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('body').hide();">HTML</a>
								</td>
				</tr>
				<tr>
						<td colspan="2"><textarea class="inp" name="body" cols="100" rows="20" id="body"><?=getPageDetail("body", $_GET['id'])?>
						</textarea></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td align="right">&nbsp;</td>
						<td align="right"><input class="inp" type="submit" name="save" id="save" value="Submit" /></td>
				</tr>
		</table>
</form>

<br />
<br />
<br />


	<?
	include "footer.php";
	?>
