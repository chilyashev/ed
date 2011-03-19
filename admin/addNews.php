
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		language : "bg",
		plugins : "style,layer,table,save,advhr,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
	});
function addtxt(input, txt) {
var obj=document.getElementById(input)
obj.value+= txt;
tinyMCE.get('nbody').setContent(tinyMCE.get('nbody').getContent()+txt);
}

</script>
<h2>&raquo;Добавяне на новина</h2><br />

<?
if($inside){
	if(isset($_POST['addNews'])){
		$date = data();//date("l, F d Y H:i:s");
		$title = mysql_escape_string(htmlspecialchars($_POST['title']));
		$nbody = mysql_escape_string($_POST['nbody']);
		$nbody = preg_replace("/\.\.\\/files\\//", "files\\/", $nbody);
		$notok = false;
		/*** proverka ***/
		if(strlen($title) <=0){
			error("Въведете заглавие");
			$notok = true;
			}
		if(strlen($title) <=0 && !$notok){
			error("Въведете текст");
			$notok = true;
			}
		/*** proverka ***/
		
		if(!$notok){
		$q = mysql_query("INSERT INTO `news` (
`id` ,
`title` ,
`body` ,
`authorID` ,
`date`
)
VALUES (
NULL , '$title', '$nbody', '$id', '$date'
);
");
if($q){wrn("Новината добавена успешно");}else{echo "fail";}
		}else{/*not ok true*/}
	}
?>
<br />

<form name="news" method="post" action="">
		<table width="566" border="0" cellpadding="3" cellspacing="0">
				<tr>
						<td><label for="title">Заглавие</label></td>
						<td><input name="title" type="text" class="inp" id="title" size="50"></td>
				</tr>
				<tr>
						<td rowspan="2">&nbsp;</td>
						<td align="right"><a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('nbody').show();">Графичен редактор</a>
								<a href="#" id="spl" class="switch" onmousedown="tinyMCE.get('nbody').hide();">HTML</a></td>
								
				</tr>
				<tr>
						<td><textarea class="inp" name="nbody" cols="100" rows="20" id="nbody"></textarea></td><td align="right">Добави файл:<br /><?=list_files(getcwd()."/../files/", 1);?></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
						<td align="right"><input class="inp" type="submit" name="addNews" id="addNews" value="Добави"></td>
				</tr>
		</table>
</form><br />
<br />
<br />

<div id="help">
<?=getIcon("q.png", 16)?>От тук може да добавяте новини, които ще се показват на главната страница. <br />
<em>Полета:</em><br />
<strong>Заглавие</strong> - заглавието на новината<br />
<strong>Текст</strong> - текстът на новината
</div>
<?
}
else{echo "gtfo";}
?>
