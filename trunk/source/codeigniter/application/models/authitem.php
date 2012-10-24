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
        
        function checkParent($child,$parent)
        {
            $authitemchild = new Authitemchild();
            $count = $authitemchild->where('authitem_id', $child)
                                    ->where('parent_id',$parent)
                                    ->count();
            if($count>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        function checkChild($child,$parent)
        {
            $authitemchild = new Authitemchild();
            $count = $authitemchild->where('authitem_id', $child)
                                    ->where('parent_id',$parent)
                                    ->count();
            if($count>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>
