<?
if(defined(INSIDE)){
/*Това не се ползва, но понякога е полезно.*/
if(isset($_POST['addOption'])){
	$key = $_POST['key'];
	$value = $_POST['value'];
	 $q = mysql_query("INSERT INTO `option` (`id`, `key`, `value`)VALUES (NULL , '$key', '$value');");
	 if($q){
		 echo "option added.";
		 }else{echo "fail!";}
	}
	if(isset($_POST['saveApp'])){
		$headercolor = htmlspecialchars($_POST['headcolor']);
		$headfgcolor = htmlspecialchars($_POST['headfgcolor']);
		echo update_option("headfgcolor", $headfgcolor);
		if(update_option("headcolor", $headercolor)){
								?><script type="text/javascript">
gol("?do=edit&w=app&message=0");
</script><?

			}
		}
?>
<style>

#ahead {
/*	width:100%;*/
	height:80px;
	background:#F90;
	margin: 0 auto;
}

#alogo {
	width:100%;
	font-size:1.6em;
}

#amenu {
	position:relative;
	margin:0 auto;
/*	width:960px;*/
	height:auto;
	text-align:left;
}

#amenu a {
	/*	background: #333;*/
	color: #000;
	/*display: block;
/*	float: left;*/
	margin: 0;
	/*	padding: 8px 12px;*/
padding: 8px;
	text-decoration: none;
}

#amenu a:hover {
	background: #2580a2;
	color: #fff;
	/*	padding: 8px;*/
	border-bottom: 3px solid #0CF;
}

#alinks {
	padding-top: 10px;
	padding-bottom: 10px;
	position:relative;/*	padding-left:100px;*/
}

#alinks a {
	border-top-left-radius: 6px;
	-moz-border-radius-topleft: 6px;
	border-top-right-radius: 6px;
	-moz-border-radius-topright: 6px;
}

#alinks a #active {
	background:#CCC;
}

</style>
<form method="post" action="">
  <p>
  </p>
  <table width="700" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td>Лого</td>
      <td align="justify">Логото (или емблемата) на училището трябва да е изображение с размери 100x100 пиксела. Изображения, по-големи от това, ще бъдат оразмерявани.<br />      		
    	<div id="ahead" style="background: #<?=get_option("headcolor")?>;"><div id="alogo"><a href=""><img src="<?=get_option("url")?>/img/logo/<?=get_option("logo")?>" height="80"/></a> <span style="color: #<?=get_option("headfgcolor")?>"><?=get_option("title");?></span><br />
</div> </div>
<div id="amenu" style="background: #<?=get_option("headcolor")?>;"><div id="alinks"><a id="home" href=""><img src="<?=$c?>/img/house.png" />начало</a> <a id="contacts" href="">Контакти</a> <?=getPageTitles(false)?></div> </div>
      		
      		
      		
      		
      			<br />
			<input type="button" class="inp" style="width:100px" id="spl" onclick="if(confirm('Ако продължите, старата картинка ще се изтрие\n\nСигурни ли сте, че искате да изтриете старата картинка?')){window.location = 'changeLogo.php'}else{}" value="Смени"></td>
    </tr>
    <tr>
    		<td>Фон</td>
    		<td><input name="headcolor" type="text" id="headcolor" value="<?=get_option("headcolor")?>" size="7" maxlength="7" /></td>
    		</tr>
    <tr>
    		<td>Цвят на текста</td>
    		<td><input name="headfgcolor" type="text" id="headfgcolor" value="<?=get_option("headfgcolor")?>" size="7" maxlength="7" />&nbsp;</td>
    		</tr>
   <!-- <tr> // това да го оправя по-нататък
    		<td>Тема</td>
    		<td><? for($i=0;$i<10;$i++){?>
			<div style="width:100px;float:left;background:#<?="9$i$i$i$i$i"?>;margin:5px"><input name="tema[]" type="radio" value="" /><?=$i?></div>&nbsp;<? }?></td>
    		</tr>
    <tr>-->
    		<td>&nbsp;</td>
    		<td><input type="submit" class="inp" name="saveApp" id="saveApp" value="Запази промените" /></td>
    		</tr>
   
  </table>
  <p>&nbsp;</p>
</form><br />
<br />
<div id="help">
<?=getIcon("q.png", 16)?>Тук можете да редактирате изгледа на главната страница.<br />
<em>Полета:</em><br />
<strong>Фон</strong> - фон на header-а на страницата<br />
<strong>Цвят на текста</strong> - цветът на текста до логото<br />
Чрез бутона <strong>смени</strong> можете да промените логото.
</div>
<?
}
else{echo "gtfo";}
