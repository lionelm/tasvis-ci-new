<?php
/*
 * File name:term.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Term extends DataMapper {    
    public  $has_one = array("term_taxonomy");
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }  
    
}
?>