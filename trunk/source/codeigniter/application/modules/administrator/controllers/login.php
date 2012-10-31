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
                if($user->user_status == 1)
                { 
                    $userdata = array(
                        'username'  => $user_login,
                        'login' => TRUE,
                        'user_id' => $user->id,
                        'user_activation_key'=>$user->user_activation_key                            
                    );
			$this->session->set_userdata($userdata);
                    redirect('administrator/index');
                }else{
                    $data['view'] = 'login_status';
                    $this->load->view('back_end/template_change',$data);
                }
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
               $session_email = $this->session->userdata('email');
               $user = new User();
               $count = $user->where('user_email',$user_email)->count();
               if($count == 1)
               {
                        
                         $newpass = md5(uniqid(rand())); //tạo mã ngẫu nhiên
                         $user = new User();
                         $user->where('user_email',$session_email)->update(array('user_pass'=>$newpass,'user_status'=>1)); 
                        
                        //sendmail
                        $this->email->from('dangky@butdanh.com','Bút Danh'); 
                        $this->email->to($user_email);                         
                        //$this->email->cc('hoangdinh812@gmail.com'); 
                        //$this->email->bcc('hanhphuckhicoem_812@yahoo.com'); 
                        $this->email->subject('Thay đổi mật khẩu');
                        $email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
                        $email_msg.='Starlight nhận được yêu cầu thay đổi password tài khoản của bạn: <br/>Nếu bạn chắc chắn muốn thực hiện việc thay đổi password của tài khoản vui lòng click vào link bên dưới:<br>';
                        $email_msg.=base_url().'administrator/login/newpass/'.$newpass; // $email_msg.=base_url().'home/verify/';
                        $this->email->message($email_msg);  
                        $this->email->send();
                         //echo $this->email->print_debugger(); // in thông tin trên để dễ dàng gỡ lỗi
                        // end sendmail
                       
                       $data['view'] = 'report';
                       $this->load->view('back_end/template_change',$data);
                     
                     
    
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
                $user_pass = $this->input->post('txtpass');
                $user_confirmpass = $this->input->post('txtconfirmpass');
                if($this->checknewpass($user_pass,$user_confirmpass))
                {
                    $session_email = $this->session->userdata('email');
                   $user = new User();
                   $user->where('user_email',$session_email)->update(array('user_pass'=>md5($user_pass),'user_status'=>1)); 
                   
                    $user->where('user_email',$session_email)->get(); 
                   
                   
                        $this->email->from('dangky@butdanh.com','Bút Danh'); 
                        $this->email->to($session_email);                         
                        //$this->email->cc('hoangdinh812@gmail.com'); 
                        //$this->email->bcc('hanhphuckhicoem_812@yahoo.com'); 
                        $this->email->subject('Đăng ký thành viên');
                        $email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
                        $email_msg.='Thông tin tài khoản của bạn: <br/>';
                        $email_msg.='Userlogin: '.$user->user_login; 
                        $email_msg.='Password:'.$user_pass;// $email_msg.=base_url().'home/verify/';
                        $this->email->message($email_msg);  
                        $this->email->send();
                         //echo $this->email->print_debugger(); // in thông tin trên để dễ dàng gỡ lỗi
                        
                        /* echo "Password cua bạn đã được thay đổi, truy cập địa chỉ email: " ;
                        echo "<font color='red'>".$this->session->userdata('email')."</font>";
                        echo " để xem thông tin chi tiết<br>"; 
                        */
                        $data['view'] = 'report2';
                       $this->load->view('back_end/template_change',$data);
                   
                   
                   $this->session->sess_destroy();
                   //redirect('administrator/login');
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