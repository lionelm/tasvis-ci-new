<?php
/*
 * File name:term_taxonomy.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Term_taxonomy extends DataMapper {
    public  $has_one = array("term");
    public $has_many = array(
        'post' => array(			
            'class' => 'post',			
            'other_field' => 'term_taxonomy',		
            'join_self_as' => 'term_taxonomy',		
            'join_other_as' => 'post',		
            'join_table' => 'hd_term_taxonomies_posts'
        )	
    );
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>