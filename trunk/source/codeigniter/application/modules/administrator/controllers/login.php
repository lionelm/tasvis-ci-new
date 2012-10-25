<?php
    class Login extends MX_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->library('email');
        }
        
        function index()
        {
            $user_login = $this->input->post('username');
            $user_pass = $this->input->post('password');
            
            
            if($this->checklogin($user_login,md5($user_pass)))
            {
                $user = new User();
                $user->where('user_login',$user_login)->get();
                
                $this->session->set_userdata('login','1');
                $this->session->set_userdata('user',$user_login);
                $this->session->set_userdata('pass',$user_pass);
                $this->session->set_userdata('id',$user->id);
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
        
        function forget()
        {
           if($this->input->post('txtemail'))
           {
               $user_email = $this->input->post('txtemail');
               $this->session->set_userdata('email',$user_email);
               $user = new User();
               $count = $user->where('user_email',$user_email)->count();
               if($count == 1)
               {
                        /*
                        $this->email->from('dinhhv@tasvis.com.vn', 'dinhhv');
                        $this->email->to('hoangdinh812911@gmail.com'); 
                        //$this->email->cc('hoangdinh812@gmail.com'); 
                        //$this->email->bcc('hanhphuckhicoem_812@yahoo.com'); 
                        
                        $this->email->subject('Xác Nhận Tài Khoản Từ Website');
                        $this->email->message('Vui lòng bấm vào link dưới đề hoàn tất việc đăng ký');	
                        
                        $this->email->send();                    
                        echo $this->email->print_debugger(); // in thông tin trên để dễ dàng gỡ lỗi
                        */
                        redirect('administrator/login/newpass');
                     
    
               }else{
                $data['view'] = 'login_forget';
                $this->load->view('back_end/template_change',$data);
               }
            }else{
                 $data['view'] = 'login_forget';
                $this->load->view('back_end/template_change',$data);
            }
                
            
        }
        
        function newpass()
        {
            if($this->input->post('txtpass'))
            {
                $user_pass = md5($this->input->post('txtpass'));
                $user_confirmpass = md5($this->input->post('txtconfirmpass'));
                if($this->checknewpass($user_pass,$user_confirmpass))
                {
                    $session_email = $this->session->userdata('email');
                   $user = new User();
                   $user->where('user_email',$session_email)->update(array('user_pass'=>$user_pass,'user_status'=>1)); 
                   
                   $this->session->sess_destroy();
                   redirect('administrator/login');
                }else{
                    $data['view'] = 'login_newpass';
                    $this->load->view('back_end/template_change',$data);
                }
            
            }else{
                $data['view'] = 'login_newpass';
                $this->load->view('back_end/template_change',$data);
            }
              
        }
        
        function checknewpass($pass,$newpass)
        {
            if($pass!= '' and $newpass != '' and $pass == $newpass)
            {
                return true;
            }else{
                return false;
            }
            
        }
        
        
        
    }


?>