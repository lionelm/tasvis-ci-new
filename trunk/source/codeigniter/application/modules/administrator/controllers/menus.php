<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Menus extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');   
            $this->load->model('Category_model');     
            $this->load->model('Menu_model');         
        }
        function index()
        {
            // Lay ra danh sach menu
            $term = new Term();
            $term->where('term_group',1)->get();
            $data['list_menu'] =  $term;
            $data['view'] = 'main_menu';
            $this->load->view('back_end/template_noright',$data);
        }
        function add_main_menu()
        {
            if($this->input->post('name_menu'))
            {
                //add Term
                $term = new Term();
                $term->name = $this->input->post('name_menu');
                $term->term_group = 1; 
                $term->slug = $term->name;
                $term->save();
            }
            $this->index();
        }
        function menu($object_id = 0)
        { 
            $object_id = 38;
            //lay danh sach cac menu con
            $data['child_menu'] = $this->Menu_model->get_menus(0,5,$object_id);            
            $data['term_option'] = $this->Category_model->get_categories(0,5); 
            $data['parent_option'] =  $this->Menu_model->get_menus(0,5,$object_id); 
            $data['view'] = 'menu';
            $data['object_id'] = $object_id;
            $this->load->view('back_end/template_noright',$data);
        } 
        function save_detail($object_id = 0 )
        {
            $temp =  new Menu();
            $temp->where('id', $this->input->post('id'))->get();
            $temp->label = $this->input->post('label');                        
            $temp->id =  $this->input->post('id');
            $temp->title_attribute =  $this->input->post('title_attribute');
            $temp->description = $this->input->post('description');            
            $temp->class = $this->input->post('css_class');
            $temp->status = $this->input->post('status');
            $temp->target = $this->input->post('open_link');
            $temp->post_id = $this->input->post('post_id');
            $temp->url = $this->input->post('url');                                                                                         
            $temp->type = $this->input->post('type'); 
            $temp->order = $this->input->post('order');
            $temp->parent = $this->input->post('parent');  
            $temp->object_id = $this->input->post('object_id');              
            $temp->save();
            $this->menu($object_id);
            
        }
                
           
    }
?>
