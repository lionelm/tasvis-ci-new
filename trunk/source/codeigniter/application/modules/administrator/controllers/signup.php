<?php
    class Signup extends MX_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('email');
            $this->load->library('session');
            $this->load->library('pagination');
        }
        
        function index()
        {
            if($this->input->post('txtlogin'))
            {
                $user_login= $this->input->post('txtlogin');
                $user_pass= $this->input->post('txtpass');
                $user_confirmpass= $this->input->post('txtconfirmpass');
                $user_nicename= $this->input->post('txtnicename');
                $user_email= $this->input->post('txtemail');
                $user_status= $this->input->post('hdtrangthai');
                
                if($this->checkuser($user_login))
                {
                    $user2 = new User();
                    $user2->user_login = $user_login;
                    //$this->session->set_userdata('user_login',$user_login);
                    //$session_login = $this->session->userdata($user_login);
                    
                    $user2->user_pass = md5($user_pass);
                    $user2->user_confirmpas = md5($user_confirmpass);
                    $user2->user_nicename = $user_nicename;
                    $user2->user_email = $user_email;
                    $user2->user_registered = date('Y-m-d H:i:s');
                    $user2->display_name = $user_nicename;
                    //$user2->authitem_id = 22;
                    $user2->user_status = $user_status;
                    
                    $user2->save(); // validation tự động kiểm tra khi ta gọi save()
                    
                    $random_code = md5(uniqid(rand())); // tạo mã ngẫu nhiên
                    $valid = new Validate();
                    $valid->confim_code=$random_code;
                    $valid->login=$user_login;
                    $valid->email=$user_email;
                    $valid->save();
                    
                    
                    //$this->session->set_userdata('random_code',$random_code);
                     //$session_code = $this->session->userdata('random_code');
                    //sendmail
                        $this->email->from('dangky@butdanh.com','Bút Danh'); 
                        $this->email->to($user_email);                         
                        //$this->email->cc('hoangdinh812@gmail.com'); 
                        //$this->email->bcc('hanhphuckhicoem_812@yahoo.com'); 
                        $this->email->subject('Đăng ký thành viên');
                        $email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
                        $email_msg.='Tài khoản của bạn đã được đăng ký. <br/>Vui lòng click vào liên kết bên dưới để có thể đăng nhập vào hệ thống:<br>';
                        $email_msg.=base_url().'administrator/signup/validation/'.$random_code; // $email_msg.=base_url().'home/verify/';
                        $this->email->message($email_msg);  
                        $this->email->send();
                         //echo $this->email->print_debugger(); // in thông tin trên để dễ dàng gỡ lỗi
                        // end sendmail
                        $data['view'] = 'report3';
                        $this->load->view('back_end/template_change',$data);
                }
                else
                    {
                        $data['view'] = 'signup_index';
                        $this->load->view('back_end/template_change',$data);
                    }
                
            }else
            {
                $data['view'] = 'signup_index';
                $this->load->view('back_end/template_change',$data);
            }
        }
        
        function validation()
        {
            $code = $this->uri->segment(4);
            $valid = new Validate();
            $valid->get();
            $login = $valid->login;
            $email = $valid->email;
          
            if($valid->confim_code == $code)
            {
                $user3 = new User();
                $user3->where('user_login',$login)->update('user_status','1');
                
                $user4 = new User();
                $user4->where('user_login',$login)->get();
                
                $this->email->from('dangky@butdanh.com','Bút Danh'); 
                $this->email->to($email);                         
                //$this->email->cc('hoangdinh812@gmail.com'); 
                //$this->email->bcc('hanhphuckhicoem_812@yahoo.com'); 
                $this->email->subject('Đăng ký thành viên');
                $email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
                $email_msg.='Thông tin tài khoản của bạn: <br/>';
                $email_msg.='Userlogin: '.$user4->user_login; 
                $email_msg.='Password:'.$user3->user_pass;// $email_msg.=base_url().'home/verify/';
                $this->email->message($email_msg);  
                $this->email->send();
                 //echo $this->email->print_debugger(); // in thông tin trên để dễ dàng gỡ lỗi
        
                $valid = new Validate();
                $valid->get_by_confim_code($valid->confirm_code);
                $valid->delete();

                
                $data['view'] = 'report4';
                $this->load->view('back_end/template_change',$data);
                //redirect('administrator/users');
                   
            }
        }
        
        function checkuser($login)
        {
            $user = new User();
            $count = $user->where('user_login',$login)->count();
            if($count < 1)
            {
                return true;
            }
            else{
                return false;
            }
        }
        
    }


?>