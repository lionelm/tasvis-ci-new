<?php
/*
 * File name:postmeta.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Menu extends DataMapper {
 
    var $table = 'menu';   
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }  
    
    function get_name($id = 0, $language = '')
    {
        $menu = new Menu();
        $menu->get_by_id($id);
        $label = $menu->label;
        preg_match('/<!--:'.$language.'-->(.*?)<!--:-->/',$label,$arr);
        return $arr[1];
    }         
}
?>