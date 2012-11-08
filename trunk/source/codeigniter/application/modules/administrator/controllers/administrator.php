<?php 
    /*
    *create by:HungPV
    *date create:
    *file name:
    */
    
    class Administrator extends MX_Controller
    {
        
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }
        
        function index()
        {
            if(!($this->session->userdata('login'))) 
            {
                redirect("administrator/login");
            }
            $data['view'] = 'administrator_index';
            $this->load->view('back_end/template',$data);
        }
    }
?>