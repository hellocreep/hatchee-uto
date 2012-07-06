<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
     
/**
  * Bread Crumb Generator
  * 
 * @author 爱业星辰
  */
 /* 使用方法/测试
 默认根据segment
 $this->append_crumb();
 也可以自定义alias
 $this->append_crumb('alias');
 */
 class Breadcrumb {
     private $_CI;
     private static $_breadcrumb = array();
     private $_delimiter = ' > ';
     protected $home = 'HOME';
     protected $base_url;
     protected $index = 'index.php';
     
    /**
      * 初始化
      */
     public function __construct()
     {
         //获取CI实例
         $this->_CI = & get_instance();
         
        //获取基础路径
         $this->base_url = $this->_CI->config->item('base_url');
         
        //初始化
         $this->_init_crumb();
         
        //添加log
         log_message('debug', "Breadcrumb Class Initialized");
     }
     
    /**
      * 初始化面包屑数组
      */
     private function _init_crumb()
     {
         $this->_breadcrumb = array(
                                 '0' => array($this->home => $this->base_url . '/')
         );
     }
     
    /**
      * 添加一条面包屑
      * @param $alias
      */
     public function append_crumb($alias = '')
     {
         $cnt = count($this->_breadcrumb);
         
        if (!in_array($cnt, array('1','2','3')))
         {
             return;
         }
         
        $seg1 = $this->_CI->uri->segment(1,'');
         $seg2 = $this->_CI->uri->segment(2,'');
         $seg3 = $this->_CI->uri->segment(3,'');
         
        $base_url_full = $this->_breadcrumb['0'][$this->home];
         
        if ($cnt == 1)
         {    
             $display = ($alias == '') ? strtoupper($seg1) : strtoupper($alias);
             $this->_breadcrumb[] = array($display => $base_url_full . $seg1 . '/');
         }
         
        if ($cnt == 2)
         {
             $display = ($alias == '') ? strtoupper($seg2) : strtoupper($alias);
             $this->_breadcrumb[] = array($display => $base_url_full . $seg1 . '/' . $seg2 . '/');
         }
         
        if ($cnt == 3) 
        {
             $display = ($alias == '') ? strtoupper($seg3) : strtoupper($alias);
             $this->_breadcrumb[] = array($display => $base_url_full . $seg1 . '/' . $seg2 . '/' . $seg3 . '/');
         }
         
    }
     
    /**
      * 生成面包屑HTML
      */
     public function output()
     {
         $html = '<div>'; 
        foreach ($this->_breadcrumb as $crumb) 
        {
             foreach ($crumb as $display => $addr)
             {
                 $html .= '<a href='.$addr.'>' . $display . '</a>' . $this->_delimiter;
             }
         }
         
        $html = rtrim($html, $this->_delimiter).'</div>';
         return $html;
     }
 }
?>