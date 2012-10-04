<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Demo extends MX_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->model('Student');
            $this->load->model('Course');

            // load url helper
            $this->load->helper('url');

            // load session library
            $this->load->library('pagination');  
        }
        
        function index($offset=0)
        {         
            $student_list = new Student();
            $student = new Student();
            $student->get_by_id(1);
            $student->delete();
            $total_rows = $student_list->count();

            $student_list->order_by('name');            
            $data['student_list'] = $student_list->get(5, $offset)->all;        

            // pagination        

            $config['base_url'] = site_url("demo/index/");
            $config['total_rows'] = $total_rows;
            $config['per_page'] = '5';
            $config['uri_segment'] = 2;
            $this->pagination->initialize($config);         

            $this->load->view('view_demo', $data);        
        }   
    }
?>
