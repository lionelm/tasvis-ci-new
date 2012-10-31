<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Category extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');  
            $this->load->model('Category_model');  
        }
        
        function index($row = 0)//+add category
        {   
            
			if(!($this->session->userdata('login') == 1 && ($this->User_identity->check_acess('category.index'))))
            redirect('administrator/index'); 
                        
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
            $config['total_rows']=$this->Category_model->get_count_category(0,5);           		
    		$config['cur_page']= $row;
            $config['num_links'] = 3;		
    		$this->pagination->initialize($config);
    		$data['list_link'] = $this->pagination->create_links();	
                      
            $data['lstTerms'] = $this->Category_model->get_categories(0,5,$row,$config['per_page']);
            $data['term_option'] = $this->Category_model->get_categories(0,5,0,$config['total_rows'] );
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
            $list_child = $this->Category_model->get($id,1);
            foreach( $list_child as $child)
            {
               $temp_term =  new Term_taxonomy();
               $temp_term->where('term_id', $child->id)->get();
               $temp_term->parent_term = $term_taxonomy->parent_term;
               $temp_term->save();
            }
            $term_taxonomy->delete();
            
            $term = new Term();
            $term->get_by_id($id);
            $term->delete();          
            
        }
        
        function edit($id = 0,$row = 0)
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
               
                /**
 * $lstTerms = new Term();           
 *                 $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description')) 
 *                         ->where_in_join_field('term_taxonomy','taxonomy','category')
 *                         ->get();            
 *                 //$this->load->vars($data);
 *                 $data['view'] = 'category_edit';
 *                 $this->load->view('back_end/template_noright',$data);
 */
            include('paging.php');
            $config['base_url']= base_url()."administrator/category/edit/".$id."/";
            $config['total_rows']=$this->Category_model->get_count_category(0,5);           		
    		$config['cur_page']= $row;
            $config['num_links'] = 3;		
    		$this->pagination->initialize($config);
    		$data['list_link'] = $this->pagination->create_links();	
                      
            $data['lstTerms'] = $this->Category_model->get_categories(0,5,$row,$config['per_page']);
            $data['term_option'] = $this->Category_model->get_categories(0,5,0,$config['total_rows'] );
           // $lstTerms = new Term();           
            //$data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description'))
              //                              ->where_in_join_field('term_taxonomy','taxonomy','category')
                //                            ->get();            

            $data['view'] = 'category_edit';
            $this->load->view('back_end/template_noright',$data);
            }
        }
    }
?>
