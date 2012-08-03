<?php
if(!defined('IN_UCHOME')) exit('Access Denied');
$_SGLOBAL['app']=Array
	(
	1 => Array
		(
		'name' => '友途',
		'url' => 'http://127.0.0.1/uto',
		'type' => 'OTHER',
		'open' => 1,
		'icon' => 'default'
		),
	2 => Array
		(
		'name' => '个人家园',
		'url' => 'http://127.0.0.1/uto/utohome',
		'type' => 'UCHOME',
		'open' => '0',
		'icon' => 'uchome'
		),
	3 => Array
		(
		'name' => '论坛',
		'url' => 'http://127.0.0.1/uto/bbs',
		'type' => 'DISCUZX',
		'open' => 1,
		'icon' => 'discuzx'
		)
	)
?>