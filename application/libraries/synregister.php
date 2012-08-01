<?php
class Synregister 
{

	
function __construct(){
         include './config.inc.php';
         include './uc_client/client.php';
	}
	function reg($name,$password,$email)
	{
		$username = '';

		$uid = uc_user_register($name, $password, $email);
		if($uid <= 0) {
			if($uid == -1) {
				$result['msg']= '用户名不合法';
				$result['status']=-1;
			} elseif($uid == -2) {
				$result['msg']= '包含要允许注册的词语';
				$result['status']=-2;
			} elseif($uid == -3) {
				$result['msg']= '用户名已经存在';
				$result['status']=1;
			} elseif($uid == -4) {
				$result['msg']= 'Email 格式有误';
				$result['status']=-4;
			} elseif($uid == -5) {
				$result['msg']= 'Email 不允许注册';
				$result['status']=-5;
			} elseif($uid == -6) {
				$result['msg']= '该 Email 已经被注册';
				$result['status']=1;
			} else {
				$result['msg']= '未定义';
				$result['status']=0;
			}
		} else {
			$username = $name;
			$result['msg']='注册成功';
			$result['status']=1;
		}
		return $result;
		/*if($username) {
			$userdata = array(
				'uid' => $uid,
				'username' => $username,
				'admin' => '0'
			);
			//$db->query("INSERT INTO {$tablepre}members (uid,username,admin) VALUES ('$uid','$username','0')");
			//注册成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
			$this->load->database();
			$this->db->insert('members', $userdata);
			setcookie('Ani_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			$result= '注册成功';
			exit;
		}*/
	}
	
}
?>