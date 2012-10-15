<?php
/*
 * File name:post.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Post extends DataMapper {  
    
    public $has_many = array(
        'postmeta' => array("postmeta"),
        'term_taxonomy' => array(			
            'class' => 'term_taxonomy',			
            'other_field' => 'post',		
            'join_self_as' => 'post',		
            'join_other_as' => 'term_taxonomy',		
            'join_table' => 'hd_term_taxonomies_posts'
        )	
    );
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
    
    function getPostMeta($post_id,$meta_key = '')
    {
        $postmeta = new Postmeta();
        $postmeta->where('post_id', $post_id)
                ->where('meta_key', $meta_key)
                ->get();
        return $postmeta->meta_value;
    }
}
?>