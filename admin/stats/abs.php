<?php
include "../../conf/fnoc.php";
include "../../inc/functions.php";
error_reporting(E_ALL);
ini_set("display_errors", 1); 
include_once('ofc-library/open-flash-chart.php');




// generate some random data
srand((double)microtime()*1000000);

$bar = new bar_outline(50, '#9933CC', '#8010A0');
$bar->key('Отсъствия', 10);

$data = array();
$bar->data[0] = cnt("otsastvie", "WHERE `type` = '1'") ;
$bar->data[1] = cnt("otsastvie", "WHERE `type` = '0'") ;

$g = new graph();
$g->title('Отсъствия', '{font-size: 20px;}');

//
// BAR CHART:
//
//$g->set_data($data);
//$g->bar_filled(50, '#9933CC', '#8010A0', 'Page views', 10);
//
// ------------------------
//
$g->data_sets[] = $bar;
//
// X axis tweeks:
//
$g->set_x_labels(array('Извинени','Неизвинени'));
//
// set the X axis to show every 2nd label:
//
$g->set_x_label_style(10, '#9933CC', 0, 1);
//
// and tick every second value:
//
$g->set_x_axis_steps(1);
//


$g->set_y_max(cnt("otsastvie")+5);
$g->y_label_steps(5);
//$g->set_y_legend('Open Flash Chart', 12, '#736AFF');
echo $g->render();




/*$g = new graph();

// Spoon sales, March 2007
$g->title('Оценки ', '{font-size: 26px;}');

$g->set_data($data);
// label each point with its value
$g->set_x_labels(array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'));

// set the Y max
$g->set_y_max(6);
// label every 20 (0,20,40,60)
$g->y_label_steps(1);

// display the data
echo $g->render();
*/?>

