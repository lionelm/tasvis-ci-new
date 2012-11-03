<?php
/*
 * Create by: HungPv
 * Date create: 22/10/2012
 * File Name: user_authiem.php
 */

    class User_authitem extends DataMapper
    {
        var $table = 'users_authitems';    
        public  $has_one = array("authitem");     
        function __construct() {
            parent::__construct();
        }
    }
?>
