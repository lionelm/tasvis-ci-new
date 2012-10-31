<?php
/*
 * Create by: HungPv
 * Date create: 22/10/2012
 * File Name: user_authiem.php
 */

    class Users_authitem extends DataMapper
    {
        public  $has_one = array("authitem");  
        function __construct() {
            parent::__construct();
        }
    }
?>
