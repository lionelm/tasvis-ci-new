<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Demo extends MX_Controller
    {
        function __construct() {
            parent::__construct();           
            $this->load->model('User');
            // load url helper
            $this->load->helper('url');

            // load session library
            $this->load->library('pagination');  
        }
        
        function index($offset=0)
        {         
            $user = new User();
            $data['lstUser'] = $user->get();
            $this->load->view('view_demo', $data);        
        }   
    }
?>
