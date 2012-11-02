<?php
/*
 * Create by: HungPV
 * Create date: 26/10/2012
 * File name: customfor.php
 * Description: Custom model
 */

class Customfor extends DataMapper
{
    public  $has_one = array("custom");
    function __construct() {
        parent::__construct();
    }  
}
?>