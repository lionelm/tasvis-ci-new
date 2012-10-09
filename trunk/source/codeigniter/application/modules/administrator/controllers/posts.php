<?php
class Posts extends MX_Controller
{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('pagination');
    }
    
    public function index($row=0)
    {           
        $lstPost = new Post();
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/posts/index/";        
        $config['total_rows']= $lstPost->where('post_type','post')->count();        
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $data['lstPost'] = $lstPost->where('post_type','post')->limit($config['per_page'], $row)->get();
        $data['view'] = 'post_index';
        $this->load->view('back_end/template_noright',$data);
    }
    
    public function add()
    {              
        $l_title = $this->input->post('txttitle');      
        if($l_title)
        {
            $l_exerpt = $this->input->post('txtexcerpt');		
            $l_content = $this->input->post('txtcontent');	
            $l_arr_categories = $this->input->post('cbcategory');
            $l_featured_image = $this->input->post('hdffeatured_image');            
            
            $post = new Post();
            $post->post_date = date('Y-m-d H-i-s');
            $post->post_content = $l_content;
            $post->post_title = $l_title;
            $post->post_excerpt = $l_exerpt;
            $post->post_type = 'post';
            
            //add term_taxonomy_post
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where_in('term_id',$l_arr_categories)->get();
            
            if($post->save($term_taxonomy->all))
            {
                //add featured images
                $post_meta = new Postmeta();
                $post_meta->meta_key = 'featured_image';
                $post_meta->meta_value = $l_featured_image;
                $post_meta->save($post);
                redirect('administrator/posts');
                
            }
        }
        else{
            $data['lstTerm'] = $this->excuteTerm();
        
            $data['view'] = 'post_add';
            $this->load->view('back_end/template_noright',$data);
        }        
    }
    
    function delete()
    {
        $id = $this->input->post('param');
        $post = new Post();
        $post_meta = new Postmeta();
        
        $post->where('id',$id)->get();        
        $post_meta->where('post_id',$id)->get();
        
        $post_meta->delete_all($post);
        $post->delete();
    }

    function edit($id)
    {
        $post = new Post();
        $postmeta = new Postmeta();
        $post->where_join_field('postmeta','meta_key','featured_image')->get_by_id($id);
        echo $post->post_title;
        $data['view'] = 'post_edit';
        $this->load->view('back_end/template_noright',$data);
    }


    public function excuteTerm()
    {
        $term_taxonomy = new Term_taxonomy();
        $term_taxonomy->where('parent_term',0)->get();
        $lstTerm = new SplObjectStorage();
        foreach ($term_taxonomy as $tt)
        {
            $term = new Term();
            $term->get_by_id($tt->term_id);
            $term->is_child = FALSE;
            $lstTerm->attach($term);
            
            $lstChildrent = new Term_taxonomy();
            $lstChildrent->where('parent_term',$tt->term_id)->get();
            foreach ($lstChildrent as $c)
            {
                $childrent = new Term();
                $childrent->get_by_id($c->term_id);
                $childrent->is_child = TRUE;
                $lstTerm->attach($childrent);
            }
            
        }
        return $lstTerm;
    }
}
?>
