<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: spacecp_common.php 15466 2010-08-24 06:56:09Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$op = empty($_GET['op'])?'':trim($_GET['op']);

if($op == 'ignore') {

	$type = empty($_GET['type'])?'':preg_replace("/[^0-9a-zA-Z\_\-\.]/", '', $_GET['type']);
	if(submitcheck('ignoresubmit')) {
		$authorid = empty($_POST['authorid']) ? 0 : intval($_POST['authorid']);
		if($type) {
			$type_uid = $type.'|'.$authorid;
			if(empty($space['privacy']['filter_note']) || !is_array($space['privacy']['filter_note'])) {
				$space['privacy']['filter_note'] = array();
			}
			$space['privacy']['filter_note'][$type_uid] = $type_uid;
			privacy_update();
		}
		showmessage('do_success', dreferer(), array(), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
	$formid = random(8);

} elseif($op == 'getuserapp') {
	getuserapp();
	if(empty($_GET['subop'])) {
		$my_userapp = array();
		foreach($_G['my_userapp'] as $value) {
			if($value['allowsidenav'] && !isset($_G['cache']['userapp'][$value['appid']])) {
				$my_userapp[] = $value;
			}
		}
	} else {
		$my_userapp = $_G['my_menu'];
	}
} elseif($op == 'closefeedbox') {

	dsetcookie('closefeedbox', 1);

} elseif($op == 'modifyunitprice') {
	$showinfo = DB::fetch_first("SELECT credit, unitprice FROM ".DB::table('home_show')." WHERE uid='$_G[uid]'");
	if(submitcheck('modifysubmit')) {
		$unitprice = intval($_POST['unitprice']);
		if($unitprice < 1) {
			showmessage('showcredit_error', '', array(), array('return' => 1));
		}
		$unitprice = $unitprice > $showinfo['credit'] ? $showinfo['credit'] : $unitprice;
		DB::query("UPDATE ".DB::table('home_show')." SET unitprice='$unitprice' WHERE uid='$_G[uid]'");
		showmessage('do_success', dreferer(), array('unitprice' => $unitprice), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
}

include template('home/spacecp_common');

?>