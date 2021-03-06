<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: adv_custom.php 9396 2010-04-28 08:27:33Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class adv_custom {

	var $version = '1.0';
	var $name = 'custom_name';
	var $description = 'custom_desc';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $targets = array('portal', 'home', 'member', 'forum', 'group', 'userapp', 'plugin', 'api');
	var $imagesizes = array('60x120', '60x250', '60x468', '120x60', '120x240', '120x60', '250x60', '100x100', '468x40', '468x60', '658x60', '728x90', '760x90', '950x90', '950x130');
	var $customname = '';

	function getsetting() {
		global $_G;
		$custom = DB::fetch_first("SELECT name FROM ".DB::table('common_advertisement_custom')." WHERE id='$_G[gp_customid]'");
		if(!$custom) {
			echo '<br >';cpmsg(lang('adv/custom', 'custom_id_notfound'));
		}
		$this->customname = $custom['name'];
		return $settings;
	}

	function setsetting(&$advnew, &$parameters) {
		global $_G;
		$advnew['targets'] = implode("\t", $this->targets);
	}

	function evalcode($adv) {
		return array(
			'check' => '
			if($customid != $parameter[\'customid\']) {
				$checked = false;
			}',
			'create' => '$adcode = $codes[$adids[array_rand($adids)]];',
		);
	}

}

?>