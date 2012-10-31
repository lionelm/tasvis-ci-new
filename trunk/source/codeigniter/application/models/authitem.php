<?php
/*
 * Create by: HungPv
 * Date create: 22/10/2012
 * File Name: authiem.php
 */

    class Authitem extends DataMapper
    {
        public  $has_one = array("authitemchild"); 
        //public  $has_many = array("user");
        public  $has_many = array("users_authitem");
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
        
        function getParent($child)
        {
            $authitemchild = new Authitemchild();
            
            $arr = array();
            $authitemchild->where('authitem_id', $child)->get();
            
            foreach ($authitemchild as $authitem)
            {
                array_push($arr, $authitem->parent_id);
                $arr = array_merge($arr,$this->getParent($authitem->parent_id));
            }
            return $arr;
        }
        
        function checkAddChild($child,$parent)
        {
            $lst = $this->getParent($child);
            if(in_array($parent,$lst ))
            {
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
    }
?>
