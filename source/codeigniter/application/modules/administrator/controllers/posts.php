<?php
class Posts extends MX_Controller
{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('pagination');
        $this->load->model('Common_model');
        $this->load->model('Tag_model');
        $this->load->model('Category_model');
    }
    
    
    public function index($term='~',$keyword='~',$row=0)
    {           
        $lstPost = new Post();
        $data['category'] = $term;      
        if($this->input->post('ddlTerm'))
        {
            $data['category'] = $this->input->post('ddlTerm');
        }  
        
        if($data['category'] == '~')
        {
            $term_id = 0;
        }
        else
        {
            $cat = new Term();
            $cat->where('slug',$data['category'])->get();
            $term_id = $cat->id;
        }
        
        $data['key_word'] = urldecode($keyword);
        if($this->input->post('txtKeyWord'))
        {
            $data['key_word'] = $this->input->post('txtKeyWord');
        }
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/posts/index/".$data['category'].'/'.$data['key_word'].'/'; 
        $lstPost->where('post_type','post');
        if($term_id>0)
        {
            $lstPost->include_related('term_taxonomy',array('id,term_id','taxonomy'))
                    ->where_related('term_taxonomy', 'taxonomy', 'category')
                    ->where_related('term_taxonomy', 'term_id', $term_id);
            
        }
        if($data['key_word']!='~')
        {
            $lstPost->like('post_title', $data['key_word']);
        }
        $config['total_rows']= $lstPost->count();        
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $lstPost = new Post();
        $lstPost->where('post_type','post')
                ->limit($config['per_page'], $row)
                ->order_by('id','DESC');
        if($term_id>0)
        {
            $lstPost->include_related('term_taxonomy',array('id,term_id','taxonomy'))
                    ->where_related('term_taxonomy', 'taxonomy', 'category')
                    ->where_related('term_taxonomy', 'term_id', $term_id);            
        }
        if($data['key_word']!='~')
        {
            $lstPost->like('post_title', $data['key_word']);
        }
        $data['lstPost'] = $lstPost->get();
        
        $data['term_option'] = $this->Category_model->get_categories(0,5,0,$this->Category_model->get_count_category(0,5) );
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
            $lstTag = $this->input->post('lstTagAdded');
            $l_featured_image = $this->input->post('hdffeatured_image');  
            $post_date_publish = $this->input->post('txtDatePublish');
            if($post_date_publish)
            {
                $format = 'd-m-Y H:i:s';
                $date_publish = DateTime::createFromFormat($format, $post_date_publish);
                $date_publish = $date_publish->format('Y-m-d H:i:s');                
            }
            else {
                $post_date_publish = date('Y-m-d H:i:s');
            }
            
            $seo_title = $this->input->post('txtTitleSeo');
            $seo_desc = $this->input->post('txtDescSeo');
            $seo_keywords = $this->input->post('txtKeywordSeo');
            
            $post_status = $this->input->post('ddlTrangThai');
            $slug = $this->Common_model->makeSlugs($l_title,255);
            $slug = $this->generateSlug($slug);
            
            $post = new Post();
            $post->post_date = date('Y-m-d H:i:s');
            $post->post_date_gmt = $date_publish;
            $post->post_content = $l_content;
            $post->post_title = $l_title;
            $post->post_excerpt = $l_exerpt;
            $post->post_type = 'post';
            $post->post_status = $post_status;
            $post->guid = $slug;
            
            //add term_taxonomy_post
            $arrTag = explode(',',$lstTag);            
            $countTag = count($arrTag);
            if(count($arrTag)>2)
            {
                unset($arrTag[0]);
                
                unset($arrTag[$countTag-1]);
                $arrTag = array_values($arrTag);
                
            }           
            
            $arrTag = array_merge($l_arr_categories,$arrTag);
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where_in('term_id',$arrTag)->get();          
            
            if($post->save($term_taxonomy->all))
            {
                //add featured images
                $post_meta = new Postmeta();
                $post_meta->meta_key = 'featured_image';
                $post_meta->meta_value = $l_featured_image;
                $post_meta->save($post);
                
                //add seo title
                $post_seo_title = new Postmeta();
                $post_seo_title->meta_key = 'seo_title';
                $post_seo_title->meta_value = $seo_title;
                $post_seo_title->save($post);
                
                //add seo desciption
                $post_seo_desc =  new Postmeta();
                $post_seo_desc->meta_key = 'seo_description';
                $post_seo_desc->meta_value = $seo_desc;
                $post_seo_desc->save($post);
                
                //add seo keywords
                $post_seo_key =  new Postmeta();
                $post_seo_key->meta_key = 'seo_keyword';
                $post_seo_key->meta_value = $seo_keywords;
                $post_seo_key->save($post);
                redirect('administrator/posts');
                
            }
        }
        else{
            //$data['lstTerm'] = $this->excuteTerm();
            $data['term_option'] = $this->Category_model->get_categories(0,5,0,$this->Category_model->get_count_category(0,5) );
            $data['lstTag'] = $this->Tag_model->ListPopularTag(20);
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

    function edit($id=0)
    {
        $l_title = $this->input->post('txttitle');
        if($l_title)
        {            
            $id = $this->input->post('hdfPostID');
            
            $l_exerpt = $this->input->post('txtexcerpt');		
            $l_content = $this->input->post('txtcontent');	
            $l_arr_categories = $this->input->post('cbcategory');
            $lstTag = $this->input->post('lstTagAdded');
            $l_featured_image = $this->input->post('hdffeatured_image');            
            $post_date_publish = $this->input->post('txtDatePublish');
            $post_status = $this->input->post('ddlTrangThai');
            $format = 'd-m-Y H:i:s';
            $date_publish = DateTime::createFromFormat($format, $post_date_publish);
            $date_publish = $date_publish->format('Y-m-d H:i:s');
            $seo_title = $this->input->post('txtTitleSeo');
            $seo_desc = $this->input->post('txtDescSeo');
            $seo_keywords = $this->input->post('txtKeywordSeo');
            
            $post = new Post();
            $post->where('id', $id)->get();
            $post->post_modified = date('Y-m-d H:i:s');
            $post->post_date_gmt = $date_publish;
            $post->post_content = $l_content;
            $post->post_title = $l_title;
            $post->post_excerpt = $l_exerpt;
            $post->post_type = 'post';
            $post->post_status = $post_status;
            
            //add term_taxonomy_post
            $arrTag = explode(',',$lstTag);            
            $countTag = count($arrTag);
            if(count($arrTag)>2)
            {
                unset($arrTag[0]);
                
                unset($arrTag[$countTag-1]);
                $arrTag = array_values($arrTag);
                
            }           
            
            $arrTag = array_merge($l_arr_categories,$arrTag);
            
            $term_taxonomy_post = new Term_taxonomy_post();
            $term_taxonomy_post->where('post_id', $id)->get();
            $term_taxonomy_post->delete_all();
            
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where_in('term_id',$arrTag)->get();
            
            if($post->save($term_taxonomy->all))
            {
                //add featured images
                $post_meta = new Postmeta();
                $post_meta->where('post_id', $id)
                        ->where('meta_key', 'featured_image')
                        ->get();  
                if(count($post_meta)==0)
                {
                    $post_meta = new Postmeta();    
                    
                }
                $post_meta->meta_key = 'featured_image';
                $post_meta->meta_value = $l_featured_image;
                $post_meta->save($post);
                
                //add seo title
                
                $post_seo_title = new Postmeta();
                $post_seo_title->where('post_id', $id)
                        ->where('meta_key', 'seo_title')
                        ->get();   
                
                if(count($post_seo_title)==0)
                {
                    $post_seo_title = new Postmeta();                    
                }
                $post_seo_title->meta_key = 'seo_title';
                $post_seo_title->meta_value = $seo_title;
                $post_seo_title->save($post);
                
                //add seo desciption
                $post_seo_desc =  new Postmeta();
                $post_seo_desc->where('post_id', $id)
                        ->where('meta_key', 'seo_description')
                        ->get();   
                if(count($post_seo_desc)==0)
                {
                    $post_seo_desc = new Postmeta();                    
                }
                $post_seo_desc->meta_key = 'seo_description';
                $post_seo_desc->meta_value = $seo_desc;
                $post_seo_desc->save($post);
                
                //add seo keywords
                $post_seo_key =  new Postmeta();
                $post_seo_key->where('post_id', $id)
                        ->where('meta_key', 'seo_keyword')
                        ->get();     
                if(count($post_seo_desc)==0)
                {
                    $post_seo_key = new Postmeta();                    
                }
                $post_seo_key->meta_key = 'seo_keyword';
                $post_seo_key->meta_value = $seo_keywords;
                $post_seo_key->save($post);
                redirect('administrator/posts');
                
            }
        }
        else {
            $post = new Post();
        
            $post->get_by_id($id);            
           
            $term_taxonomy = new Term_taxonomy();
            $term_post = $term_taxonomy->include_related('post',array('id'))
                    ->where_in_join_field('post', 'post_id', $id)
                    ->get_by_term_id();
            
            $post_tag =  new $term_taxonomy();
            $lst_post_tag = $post_tag->include_related('post',array('id'))
                    ->where_in_join_field('post', 'post_id', $id)
                    ->include_related('term',array('id','name'))
                    ->where('taxonomy','tag')
                    ->get();
            
            $data['lst_post_tag'] = $lst_post_tag;
            $data['featured_image'] = $post->getPostMeta($id,'featured_image');
            $data['seoTitle'] = $post->getPostMeta($id, 'seo_title');
            $data['seoDesc'] = $post->getPostMeta($id,'seo_description');
            $data['seoKey'] = $post->getPostMeta($id,'seo_keyword');
            $data['term_option'] = $this->Category_model->get_categories(0,5,0,$this->Category_model->get_count_category(0,5) );
            $data['post'] = $post;
            $data['term_post'] = $term_post;
            $data['lstTag'] = $this->Tag_model->ListPopularTag(20);
            $data['view'] = 'post_edit';
            $this->load->view('back_end/template_noright',$data);
        }
        
    }


    public function excuteTerm()
    {
        $term_taxonomy = new Term_taxonomy();
        $term_taxonomy->where('parent_term',0)
                        ->where('taxonomy', 'category')
                        ->get();
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
    
    function checkSlug($slug)
    {
        $post = new Post();           
        $check = $post->where('guid', $slug)->count();  
        if($check>0)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function checkSlugAjax()
    {
        $slug = $this->input->post('slug');
        if($this->checkSlug($slug))
        {
            echo "exist";
        }
        else {
            echo "not exist";
        }
    }


    function generateSlug($slug)
    {
        if ($this->checkSlug($slug)==false)
        {
            return $slug;
        }
        $i = 0;
        while (1)
        {	
            $i++;
            $link_temp = $slug.'-'.$i;
            if ($this->checkSlug($link_temp)==false) return $link_temp;
        }
    }  
}
?>
