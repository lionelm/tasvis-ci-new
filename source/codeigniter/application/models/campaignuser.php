<?php
/*
 * 
 * 
 * 
 * 
 */
class Campaignuser extends DataMapper
{
    public  $has_one = array("campaign"); 
    function __construct() {
        parent::__construct();
    }
}
?>
