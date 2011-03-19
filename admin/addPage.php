
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		language : "bg",
		plugins : "style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
	});
	actadmlink("#addpages")
</script>
<h2>&raquo;Добавяне на страница</h2><br><br>
<?
if($inside){
	if(isset($_POST['addpage'])){
		$date = data();//date("l, F d Y H:i:s");
		$title = mysql_escape_string(htmlspecialchars($_POST['title']));
		$body = $_POST['body'];
		$q = mysql_query("INSERT INTO `page` (
`id` ,
`title` ,
`body` ,
`authorID` ,
`date`
)
VALUES (
NULL , '$title', '$body', '$id', '$date'
);
");
if($q){wrn("Страницата добавена успешно.");}else{wrn("fail".mysql_error());}
	}
?>
<form name="page" method="post" action="">
		<table width="566" border="0" cellpadding="3" cellspacing="0">
				<tr>
						<td><label for="title">Заглавие</label></td>
						<td><input name="title" type="text" class="inp" id="title" size="50"></td>
				</tr>
				<tr>
						<td rowspan="2">&nbsp;</td>
						<td align="right"><a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('body').show();">Графичен редактор</a>
								<a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('body').hide();">HTML</a></td>
				</tr>
				<tr>
						<td><textarea class="inp" name="body" cols="100" rows="20" id="body"></textarea></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td align="right"><input class="inp" type="submit" name="addpage" id="addpage" value="Добави"></td>
				</tr>
		</table>
</form><br />
<br />
<div id="help">
<?=getIcon("q.png", 16)?>От тук може да добавяте страници, които ще се показват на главната страница. <br />
<em>Полета:</em><br />
<strong>Заглавие</strong> - заглавието на страницата<br />
<strong>Текст</strong> - текстът на страницата
</div>
<?
}
else{echo "gtfo";}
?>
