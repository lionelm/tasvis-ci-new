<?php
/*
 * File name:postmeta.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Postmeta extends DataMapper {
 
    var $table = 'postmeta';
    public  $has_one = array("post"); 
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>