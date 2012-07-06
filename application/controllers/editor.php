<?php
 if (!defined('BASEPATH'))  exit('No direct script access allowed');
 class Editor extends CI_Controller{
     public function __construct() {
         parent::__construct();
         $this->load->library('kindeditor');
     }
    public function upload(){
         if(!empty ($_FILES)){
             $this->kindeditor->upload($_FILES);
         }
     }
 
    public function manage(){
         $path = isset($_GET['path']) ? $_GET['path'] : '';
         $this->kindeditor->manage($path);
     }
 

}
?>
