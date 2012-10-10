<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Tags extends MX_Controller
    {
        function __construct() {
            parent::__construct();           
            
            $this->load->model('Common_model');   
            // load session library
            $this->load->library('pagination');  
            $this->load->library('session');
        }
        
        function index()
        {   
            if($this->input->post('txttitle'))
            {
                //add Term
                $term = new Term();
                $name = trim($this->input->post('txttitle'));                
                $slug = trim($this->input->post('txtslug'));
                if($slug=='')
                {
                    $slug = $this->Common_model->makeSlugs($name,255);
                    $slug = $this->generateSlug($slug);
                }
                $term->name = $name;
                $term->slug = $slug;
                if($this->checkSlug($slug))
                {
                    $this->session->set_flashdata('message','loi');
                }
                else {
                    if($term->save())
                    {    
                        $last_term = new Term();
                        $last_term->where('name',$name)->get();

                        //add Term_taxonomy
                        $term_taxonomy = new Term_taxonomy();

                        //$term_taxonomy->term_id=$last_term->term_id;
                        $term_taxonomy->taxonomy = 'tag';
                        $term_taxonomy->description = $this->input->post('txtexcerpt');

                        $term_taxonomy->save($term);
                    }
                }
                
            }
            
            $lstTerms = new Term();           
            $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description'))
                                            ->where_in_join_field('term_taxonomy','taxonomy','tag')
                                            ->get();            
            
            $data['view'] = 'tag_index';
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
            //$parent = $this->input->post('ddlTerm');
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
                //$term_taxonomy->parent_term = $parent;
                $term_taxonomy->save();
                
                redirect('administrator/tags','refresh');
            }else{              
                
                $term = new Term_taxonomy();
                $term->include_related('term', array('id', 'name','slug'))->get_by_term_id($id);
                $data['term'] = $term;
               
                $lstTerms = new Term();           
                $data['lstTerms'] = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description')) 
                        ->where_in_join_field('term_taxonomy','taxonomy','tag')
                        ->get();            
                //$this->load->vars($data);
                $data['view'] = 'tag_edit';
                $this->load->view('back_end/template_noright',$data);
            }
        }
        
        function checkSlug($slug)
        {
            $lstTerms = new Term();           
            $check = $lstTerms->include_related('term_taxonomy', array('id', 'taxonomy','description')) 
                    ->where_in_join_field('term_taxonomy','taxonomy','tag')
                    ->where('slug', $slug)
                    ->count();  
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
