<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Demo2 extends MX_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->model('demoModel2');
        }
        
        function index()
        {
            $data['name'] = $this->demoModel2->get();
            $this->load->view('view_demo',$data);
        }
    }
?>
