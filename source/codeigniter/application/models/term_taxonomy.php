<?php
/*
 * File name:term_taxonomy.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Term_taxonomy extends DataMapper {
    public  $has_one = array("term");
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>