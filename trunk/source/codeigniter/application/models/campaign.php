<?php
/*
 * 
 * 
 * 
 * 
 */
class Campaign extends DataMapper
{
    public  $has_many = array("campaignuser"); 
    function __construct() {
        parent::__construct();
    }
    
    
}
?>
