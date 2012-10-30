<?php
    class Posts extends MX_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        
        function index()
        {            
            $link = 'posts_index';           
            $this->getthem($link,$data);            
        }
        
        function listone($id=1)
        {
             $post = new Post();
             $data['lstpost'] =  $post->getPost($id);    
            
            $link = 'posts_getpost';           
            $this->getthem($link,$data);
            
        }
        
        
        function list_limit()
        {
             //$args1 = array( 'numberposts' => 2, 'order'=> 'ASC', 'orderby' => 'post_title' ); 
             
             $args2 = array(
                        'numberposts'     => '4', 
                        'offset'          => '0',                        
                        'orderby'         => 'post_date',
                        'order'           => 'DESC',                        
                        'post_type'       => 'post',
                        'post_parent'     => '0',
                        'post_status'     => 'publish'                    
                        );
                    
            $post = new Post();
            $data['lstpostall'] = $post->getPosts($args2);
            $link = 'posts_getposts';           
            $this->getthem($link,$data);                                
                
        }
        
        
        function detail($id=0)
        {
            $post = new Post();
            $data['postdetail'] = $post->get_by_id($id);
            
            
            $link = 'posts_detail';           
            $this->getthem($link,$data);
        }   
        
        
        function getthem($link,$data)
        {
             //get theme
            $option = new Option();
            $option->where('option_name','template')->get();
            $theme = $option->option_value;        
            
            if(get_file_info('application/views/front_end/'.$theme.'/posts_detail.php'))
            {
                $this->load->view('front_end/'.$theme.'/'.$link, $data);
            }
            else {
                $this->load->view('front_end/base/'.$link, $data);
            }   
        } 
   
   
   
    }


?>