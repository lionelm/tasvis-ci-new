<?php
    class Login extends MX_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->library('pagination');
        }
        
        function index()
        {
            $user_login = $this->input->post('username');
            $user_pass = $this->input->post('password');
            if($this->checklogin($user_login,md5($user_pass)))
            {
                $this->session->set_userdata('login','1');
                $this->session->set_userdata('user',$user_login);
                $this->session->set_userdata('pass',$user_pass);
               redirect('administrator/users');
            }else{
                $this->session->set_userdata('login','0');
               $this->load->view('login_index');
            }
        }
        
        function checklogin($username,$password)
        {
            $user = new User();            
            $array = array('user_login'=>$username, 'user_pass'=>$password);
            $count = $user->where($array)->count();
            if($count == 0)
            {
                return false;
            }else{
                return true;
                //return $user->where($array)->get();
            }
        }
        
            //---- Logout
        function logout()
        {
            $this->session->sess_destroy();
    		$this->load->view('login_index');
        }
        
        
    }


?>