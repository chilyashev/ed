<div id="lmenu">
<?

		//echo "<hr /><div id=\"cal\"></div><br />";
if($ok)
{
?>
<div id="mnupart">
<div class="ttl"><a class="tog" id="1">Общи</a></div>
<ul id="a1">
<!--<li class="ttl" id="1">Общи</li>
-->
<li><a href="<?=get_option("url")?>admin" id="dashboard">Начало</a></li>
<li><a href="<?=get_option("url")?>admin/stats.php" id="stats">Статистики</a></li>
</ul>
</div><!-- obshti -->

<div id="mnupart"><div class="ttl"><a class="tog" id="8">Новини</a></div>
<ul id="a8">
<li><a href="<?=get_option("url")?>admin/?do=view&w=news" id="novini">Новини</a></li>
<li><a href="<?=get_option("url")?>admin/?do=addNews" id="dobavinovina">Добави новина</a></li>
</ul>
</div>


<!--<div id="mnupart"><div class="ttl"><a class="tog" id="2">Оценки</a></div>
<ul id="a2">
{CRUD}
</ul>
</div>-->

<div id="mnupart"><div class="ttl"><a class="tog" id="4">Потребители</a></div>
<ul id="a4">
 
<li><a href="<?=get_option("url")?>admin/?do=add" id="addusr">Добави потребител</a></li>
<li><a href="<?=get_option("url")?>admin/?do=view&w=students" id="students">Ученици</a></li>
<li><a href="<?=get_option("url")?>admin/?do=add&w=student" id="addstu">Добави ученик</a></li>
<li><a href="<?=get_option("url")?>admin/?do=view&w=teachers" id="teachers">Учители</a></li>
<li><a href="<?=get_option("url")?>admin/?do=add&w=teacher" id="addteach">Добави учител</a></li>
<li><a href="<?=get_option("url")?>admin/?do=view&w=parents" id="parents">Родители</a></li>
<li><a href="<?=get_option("url")?>admin/?do=add&w=parent" id="addpar">Добави родител</a></li>
<li><a href="<?=get_option("url")?>admin/?do=view&w=all" id="all">Всички потребители</a></li>

</ul>
</div>

<div id="mnupart"><div class="ttl"><a class="tog" id="5">Предмети</a></div>
<ul id="a5">
<li><a href="<?=get_option("url")?>admin/?do=view&w=subjs" id="subjsv">Всички предмети</a></li>
<li><a href="<?=get_option("url")?>admin/?do=addSubj" id="addsubj">Добави предмет</a></li></ul>
</div>

<div id="mnupart"><div class="ttl"><a class="tog" id="9">Класове</a></div>
<ul id="a9">
<li><a href="<?=get_option("url")?>admin/?do=view&w=classes" id="classesv">Всички класове</a></li>
<li><a href="<?=get_option("url")?>admin/?do=addClass" id="addclass">Добави клас</a></li>
</ul>
</div>

<div id="mnupart"><div class="ttl"><a class="tog" id="11">Файлове</a></div>
<ul id="a2">
<li><a id="files" href="<?=get_option("url")?>admin/files.php">Файлове</a></li>
</ul>
</div>


<div id="mnupart"><div class="ttl"><a class="tog" id="3">Страници</a></div>
<ul id="a3">
<li><a id="pages" href="<?=get_option("url")?>admin/?do=view&w=pages">Страници</a></li>
<li><a id="addpages" href="<?=get_option("url")?>admin/?do=addPage">Добави</a></li>

</ul>
</div>

<div id="mnupart"><div class="ttl"><a class="tog" id="6">Външен вид</a></div>
<ul id="a6">
<li><a id="lgo" href="<?=get_option("url")?>admin/?do=edit&w=app">Лого</a></li>
<li><a id="sdbr" href="<?=get_option("url")?>admin/?do=edit&w=sdbr">Страничен текст</a></li>
</ul>
</div>


<div id="mnupart"><div class="ttl"><a class="tog" id="7">Настройки</a></div>
<ul id="a7">
<li><a id="obshti" href="<?=get_option("url")?>admin/?do=edit&w=main">Общи</a></li>
</ul>
</div>

<?
}
?>
</div><!-- lmenu -->
