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
    
    public $has_one = array("language");
    
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
    
    function getPostLang($post_id)
    {
        $post = new Post();
        $post->where('id', $post_id)->get();
        $root_lang = $post->root_lang;
        
        $lstPost = new Post();
        $lstPost->where("root_lang", $root_lang)
                ->include_related('language',array('id','name'))                
                ->get();
        return $lstPost;
        
    }
    
    function getPost($post_id)
    {
        $lstpost = new Post();
        $lstpost->where('post_type','post'); 
        $lstpost->where('id',$post_id);
        $lstpost->get(); 
        return $lstpost;
    }
    
    function getPosts($args = array(
                        'numberposts'     => '', 
                        'offset'          => '',
                        //'category'        => '',
                        'orderby'         => '',
                        'order'           => '',
                        //'meta_key'        => '',
                        //'meta_value'      => '',
                        'post_type'       => '',
                        'post_parent'     => '',
                        'post_status'     => '',
                        //'lang' => ''
                        ))
    {
        $lstposts_all = new Post();
        
        
        if($args['post_type']!= '')
        {
            $lstposts_all->where('post_type',$args['post_type']);
        }
        
        if($args['post_status']!='') 
        {
            $lstposts_all->where('post_status',$args['post_status']);
        } 
        
        if(($args['numberposts']!='') and ($args['offset']!=''))
        {
            $lstposts_all->limit($args['numberposts'],$args['offset']);
        }else{
            if(($args['offset']==''))
            {
                $lstposts_all->limit($args['numberposts'],0);
            }
            
        }  
        
        if(($args['orderby']!='') and ($args['order']!=''))   
        {
            $lstposts_all->order_by($args['orderby'],$args['order']);
        }      
                    
                     
        $lstposts_all->get();           
                    
        return $lstposts_all;             
        
    }
}
?>