<?php
//really need to think of a better way to do this
include "../../conf/fnoc.php";
include "../../inc/functions.php";
error_reporting(E_ALL);
ini_set("display_errors", 1); 
include_once( 'ofc-library/open-flash-chart.php' );
$bar = new bar_outline( 50, '#9933CC', '#8010A0' );
$bar->key( 'Оценки', 10 );

$data = array();
for( $i=2; $i<7; $i++ )
{
  $bar->data[] = ((cnt("ocenka", "WHERE `value` like '$i%'") / cnt("ocenka"))*100);
}


$g = new graph();
$g->title( 'Оценки в проценти', '{font-size: 20px;}' );

//
// BAR CHART:
//
//$g->set_data( $data );
//$g->bar_filled( 50, '#9933CC', '#8010A0', 'Page views', 10 );
//
// ------------------------
//
$g->data_sets[] = $bar;
//
// X axis tweeks:
//
$g->set_x_labels( array( 'Слаб 2','Среден 3','Добър 4','Мн. Добър 5','Отличен 6' ) );
//
// set the X axis to show every 2nd label:
//
$g->set_x_label_style( 10, '#9933AA', 0, 1 );
//
// and tick every second value:
//
$g->set_x_axis_steps( 1 );
//
//
$g->set_tool_tip( '#x_label#<br>#val#%' );
$g->set_y_max(100);
$g->y_label_steps( cnt("ocenki")+5 );
//$g->set_y_legend( 'Open Flash Chart', 12, '#736AFF' );
echo $g->render();




/*$g = new graph();

// Spoon sales, March 2007
$g->title( 'Оценки ', '{font-size: 26px;}' );

$g->set_data( $data );
// label each point with its value
$g->set_x_labels( array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec' ) );

// set the Y max
$g->set_y_max( 6 );
// label every 20 (0,20,40,60)
$g->y_label_steps( 1 );

// display the data
echo $g->render();
*/?>

