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
            $login = $this->session->userdata('login');
            if($login == 1)
            {   
                //$this->session->sess_destroy();
                $this->session->unset_userdata('login');
                redirect('administrator/users');
                
            }else{
                $this->load->view('login_index');
            }
        }
    }
?>