<?php
/*
 * File name:term_relationship.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Term_taxonomy_post extends DataMapper {
    var $table = 'term_taxonomies_posts';
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>