<?php
/*
 * Create by: HungPv
 * Date create: 22/10/2012
 * File Name: authiem.php
 */

    class Authitem extends DataMapper
    {
        public  $has_one = array("authitemchild"); 
        function __construct() {
            parent::__construct();
        }
        
        function getCountChild($id)
        {
            $authitemchild = new Authitemchild();
            return $authitemchild->where('parent_id',$id)->count();
        }
    }
?>
