<?php
/*
 * Create by: HungPv
 * Date create: 22/10/2012
 * File Name: authitemchild.php
 */

    class Authitemchild extends DataMapper
    {
        public  $has_one = array("authitem"); 
        function __construct() {
            parent::__construct();
        }
        
        
    }
?>
