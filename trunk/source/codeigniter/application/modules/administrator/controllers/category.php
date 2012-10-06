<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Category extends MX_Controller
    {
        function __construct() {
            parent::__construct();           
            
            $this->load->model('Term');
            $this->load->model('Term_taxonomy');    
            // load session library
            $this->load->library('pagination');  
        }
        
        function index()
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
            
            $lstTerms = new Term();           
            $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description'))->get();            
            
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
                $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description'))->get();            
                //$this->load->vars($data);
                $data['view'] = 'category_edit';
                $this->load->view('back_end/template_noright',$data);
            }
        }
    }
?>
