<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */class Temp
        {
            public $id;
            public $name;
            public $description;
            public $depth;
        }
    class Category extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');  
           
        }
        function show_categories($parent_id = '0',$limit_depth = 5, $depth = 0 )
        {
            if ($depth > $limit_depth) return;                        
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where('taxonomy', 'category');
            $term_taxonomy->where('parent_term', $parent_id);                        
            $categories = $term_taxonomy->get();
            $cats = '';
            if (count($categories)>0)
            {
                foreach ($categories as $category)
                {                                                     
                    $cats .= $depth.'-'.$category->term_id.'|';
                    $cats .= $this->show_categories($category->term_id,$limit_depth,$depth+1);
                }
            }            
            return $cats;            
        }
        function get_count_category($parent_id = '0',$limit_depth = 5)
        {
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            $cats =  explode('|',$cats);
            return count($cats);
        }
        function get_categories($parent_id = '0',$limit_depth = 2, $offset =0, $limit = 0 )
        {
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            $cats =  explode('|',$cats);
            $lstTerms = array();           
            if ($limit != 0 )
            {
                $sl = 0;
                foreach($cats as $cat)
                {
                    if ($sl >= $offset)
                    {
                        $sl++;
                        $category = explode('-',$cat);
                        $temp = new Temp();
                        $temp->id = $category[1];
                        $pre = '';
                        for($i = 1; $i<=$category[0];$i++)
                        {
                            $pre .= '__ ';
                        }
                        $term = new Term();
                        $term->get_by_id($temp->id);
                        
                        $temp->name = $pre.$term->name;
                        $term_taxonomy = new Term_taxonomy();
                        $term_taxonomy->where('term_id', $temp->id)->get();
                        
                        $temp->description = $term_taxonomy->description;
                        $lstTerms[] = $temp;
                        if ($sl >= $offset+$limit) break;
                    } else
                    $sl++;                    
                }
            }
            return $lstTerms;
        }
        function index($row = 0)
        {   
            if($this->input->post('txttitle'))
            {
                //add Term
                $term = new Term();
                $term->name = $this->input->post('txttitle');
                $term->slug = $this->input->post('txtslug');
                
                if($term->save())
                {    
                    $last_term = new Term();
                    $last_term->where('name',$this->input->post('txttitle'))->get();
                    
                    //add Term_taxonomy
                    $term_taxonomy = new Term_taxonomy();
                   
                    //$term_taxonomy->term_id=$last_term->term_id;
                    $term_taxonomy->taxonomy = 'category';
                    $term_taxonomy->description = $this->input->post('txtexcerpt');
                    $term_taxonomy->parent_term = $this->input->post('ddlTerm');
                    $term_taxonomy->save($last_term);
                }
            }
            include('paging.php');
            $config['base_url']= base_url()."administrator/category/index/";
            $config['total_rows']=$this->get_count_category(0,5);           		
    		$config['cur_page']= $row;
            $config['num_links'] = 3;		
    		$this->pagination->initialize($config);
    		$data['list_link'] = $this->pagination->create_links();	
                      
            $data['lstTerms'] = $this->get_categories(0,5,$row,$config['per_page']);
            $data['term_option'] = $this->get_categories(0,5,0,$this->get_count_category(0,5) );
           // $lstTerms = new Term();           
            //$data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description'))
              //                              ->where_in_join_field('term_taxonomy','taxonomy','category')
                //                            ->get();            

            $data['view'] = 'category_index';
            $this->load->view('back_end/template_noright',$data);
        }   
        
        function delete()
        {
            $id = $this->input->post('param');
            
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where('term_id',$id)->get();
            $term_taxonomy->delete();
            
            $term = new Term();
            $term->get_by_id($id);
            $term->delete();          
            
        }
        
        function edit($id=0)
        {
            $name = $this->input->post('txttitle');
            $slug = $this->input->post('txtslug');		
            $description = $this->input->post('txtexcerpt');
            $parent = $this->input->post('ddlTerm');
            if ($this-> input-> post('txttitle')){
                $id=$this->input->post('term_id');                
                $term = new Term();
                $term->where('id',$id)->get();
                $term->name = $name;
                $term->slug = $slug;                
                $term->save();
                
                $term_taxonomy =  new Term_taxonomy();
                $term_taxonomy->where('term_id', $id)->get();
                $term_taxonomy->description = $description;
                $term_taxonomy->parent_term = $parent;
                $term_taxonomy->save();
                
                redirect('administrator/category','refresh');
            }else{              
                
                $term = new Term_taxonomy();
                $term->include_related('term', array('id', 'name','slug'))->get_by_term_id($id);
                $data['term'] = $term;
               
                $lstTerms = new Term();           
                $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description')) 
                        ->where_in_join_field('term_taxonomy','taxonomy','category')
                        ->get();            
                //$this->load->vars($data);
                $data['view'] = 'category_edit';
                $this->load->view('back_end/template_noright',$data);
            }
        }
    }
?>
