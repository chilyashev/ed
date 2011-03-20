<?
$c="./";
include "inc/header.php";	
//include "inc/all_classes.php";
//include "inc/header.php";
?><script type="text/javascript">
actlink("#contacts");
where("<a href='<?=get_option("url")?>'>Начало</a> &rarr; Контакти");
</script>
		<table width="600px" border="0" cellspacing="5" cellpadding="5" style="vertical-align:top">
				<tr>
						<td width="41">e-mail</td>
						<td width="524"><img  src="inc/mailimg.php?mail=<?=base64_encode(get_option("email"))?>" /></td>
				</tr>
				<tr>
						<td height="29" valign="top">Адрес</td>
						<td valign="top"><?=get_option("address")?></td>
				</tr>
				<tr>
						<td height="29">Телефон</td>
						<td><?=get_option("phone")?></td>
				</tr>
		</table>
<?
include "inc/footer.php";
?>