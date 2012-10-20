<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Menu extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');   
            $this->load->model('Category_model');     
            $this->load->model('Menu1_model');         
        }
        
        function index()
        { 
            // Lay ra danh sach menu
            $term = new Term();
            $term->where('term_group',1)->get();
            $data['list_menu'] =  $term;
            //lay danh sach cac menu con
            $menu1 = new menu();
            print_r($menu1->get());
            //$data['child_menu'] = $this->Menu_model->get_menus(0,5,1);
            $data['term_option'] = $this->Category_model->get_categories(0,5);    
            $data['view'] = 'menu';
            $this->load->view('back_end/template_noright',$data);
        } 
        
           
           
    }
?>
