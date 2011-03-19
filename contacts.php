<?
$c="./";
include "inc/header.php";	
//include "inc/all_classes.php";
//include "inc/header.php";
?><script type="text/javascript">
actlink("#contacts")
</script>
<!--
<p>a&nbsp;</p>
<p>&nbsp;</p>-->
<div id="main">
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
						<td>+0000000</td>
				</tr>
		</table>
</div> 
<!-- #main -->
<?
include "inc/footer.php";
?></div><!-- #content -->
</div> <!-- #wrapper -->
<br />
<br />

</body>
</html>
