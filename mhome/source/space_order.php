<?php
/*
	[mhome] (C) 2012-08-09 chenzhao
	$Id: space_order.php 13208 2012/8/9  $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
$id = empty($_GET['id'])?0:intval($_GET['id']);

	$query = $_SGLOBAL['db']->query("select Id from uto_users where name='$space[username]'");
	$user = $_SGLOBAL['db']->fetch_array($query);
	if(empty($user)) {
		showmessage('view_to_info_did_not_exist');
	}
	$query = $_SGLOBAL['db']->query("select orders.uuid,orders.tour_time,orders.status,tour.title from uto_inquiry as orders,uto_tour as tour where orders.tour=tour.Id and orders.user='$user[Id]'");
	$orderlist[] = $_SGLOBAL['db']->fetch_array($query);
if($id)
{
	$query = $_SGLOBAL['db']->query("select orders.uuid,orders.tour_time,orders.status,tour.title from uto_inquiry as orders,uto_tour as tour where orders.tour=tour.Id and orders.user='$user[Id]'");
}
include_once template("space_order_list");
?>