<?php

/*
 * File name: post.php
 * Create by: Dinhhv
 * Create date: 30/10/2012
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
                        'category'        => '',                                        
                        'orderby'         => '',
                        'order'           => '',
                        'meta_key'        => '' ,
                        'meta_value'      => '',                                              
                        'post_type'       => '',
                        'post_parent'     => '',
                        'post_status'     => '',
                        'lang' => '' ))
    {
        $lstposts_all = new Post();
        $postmeta = new Postmeta();
        $temtaxanomy = new Term_taxonomy;
        
        
        if($args['post_type']!= '')
        {
            $lstposts_all->where('post_type',$args['post_type']);
        }
        
        
        if($args['lang'] != '' && $args['lang'] > 0)
        {
            $lstposts_all->where('language_id',$args['lang']);
        }
        
        
         if($args['meta_key'] != '' && $args['meta_value'] != '')
        {
            $postmeta->where('meta_key', $args['meta_key'])
                ->where('meta_value', $args['meta_value'])
                ->get();
            $post_id=  $postmeta->post_id;
            $lstposts_all->where('id',$post_id);
        }else{
           if($args['meta_key'] = '' && $args['meta_value'] != '')
           {
                $postmeta->where('meta_value', $args['meta_value'])
                        ->get();
                $post_id=  $postmeta->post_id;
                $lstposts_all->where('id',$post_id);
           } 
        }
        
        if($args['category'] != '')
        {
            $cat = $args['category'];
            $termtaxanomypost = new Term_taxonomy_post();
            $termtaxanomypost->where('term_taxonomy_id',$cat)
                                ->get();  
                             
            $lstposts_all->where('id',$termtaxanomypost->post_id);                                       
        }
        
        if($args['post_parent']!='')
        {
            $lstposts_all->where('post_parent',$args['post_parent']);
        }
        
        
        if($args['post_status']!='') 
        {
            $lstposts_all->where('post_status',$args['post_status']);
        } 
        
        
        if(($args['numberposts']!='') && ($args['offset']!=''))
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
    
    function getpermalink($post_id)
    {
        $lstpermalink = new Post();      
        $lstpermalink->where('id',$post_id);
        $lstpermalink->get(); 
        return $lstpermalink->guid;
    }
}
?>