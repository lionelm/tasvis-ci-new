<?php
/*
 * Create by: HungPV
 * Description: 
 * Date Create:02/11/2012
 */

class Users extends MX_Controller
{
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        
    }
    
    
    /**
     * register
     * 
     * @author HungPV
     * @deprecated return view for register  
     */
    function register()
    {
        if($this->input->post('txtlogin'))
        {
            $user_login= trim($this->input->post('txtlogin'));
            $user_pass= trim($this->input->post('txtpassword'));            
            $user_nicename= trim($this->input->post('txtnicename'));
            $user_email= trim($this->input->post('txtEmail'));
            $user_status= 0;

            if(!$this->checkExistUser($user_login,$user_email))
            {
                $user2 = new User();
                $user2->user_login = $user_login;                

                $user2->user_pass = md5($user_pass);                
                $user2->user_nicename = $user_nicename;
                $user2->user_email = $user_email;
                $user2->user_registered = date('Y-m-d H:i:s');
                $user2->display_name = $user_nicename;
                $user2->authitem_id = 0;
                $user2->user_status = $user_status;

                $user2->save();

                $random_code = md5(uniqid(rand()));
                $valid = new Validate();
                $valid->confim_code=$random_code;
                $valid->login=$user_login;
                $valid->email=$user_email;
                $valid->save();
                
                //sendmail
                $option = new Option();
                $option->where('option_name','mail_server_host')->get();
                $host = $option->option_value; 
                
                $option = new Option();
                $option->where('option_name','mail_server_port')->get();
                $port = $option->option_value;  
                
                $option = new Option();
                $option->where('option_name','mail_server_username')->get();
                $usermail = $option->option_value;  
                
                $option = new Option();
                $option->where('option_name','mail_server_password')->get();
                $passmail = $option->option_value; 
                
                $config['protocol']='smtp';
                $config['smtp_host']=$host;
                $config['smtp_port']=$port;
                $config['smtp_timeout']='30';
                $config['smtp_user']=$usermail;
                $config['smtp_pass']=$passmail;
                $config['charset']='utf-8';
                $config['newline']="\r\n";
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $this->email->from('dangky@tasvis.com','Đăng ký thú cưng'); 
                $this->email->to($user_email);                                             
                $this->email->subject('Đăng ký thành viên');
                $email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
                $email_msg.='Tài khoản của bạn đã được đăng ký. <br/>Vui lòng click vào liên kết bên dưới để có thể đăng nhập vào hệ thống:<br>';
                $email_msg.=base_url().'users/validation/'.$user_login.'/'.$random_code;
                $this->email->message($email_msg);  
                $this->email->send();

                redirect("users/registersuccess");
            }
            else {
                //get theme
                $option = new Option();
                $option->where('option_name','template')->get();
                $theme = $option->option_value;        

                if(get_file_info('application/views/front_end/'.$theme.'/users_register.php'))
                {
                    $data['view'] = "front_end/".$theme."/users_register";
                }
                else {
                    $data['view'] = "front_end/base/users_registers";
                }

                if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
                {            
                    $this->load->view('front_end/'.$theme.'/template',$data);
                }
                else {
                    $this->load->view('front_end/base/template');
                }
            }
            
        }else
        {
            
            //get theme
            $option = new Option();
            $option->where('option_name','template')->get();
            $theme = $option->option_value;        

            if(get_file_info('application/views/front_end/'.$theme.'/users_register.php'))
            {
                $data['view'] = "front_end/".$theme."/users_register";
            }
            else {
                $data['view'] = "front_end/base/users_registers";
            }

            if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
            {            
                $this->load->view('front_end/'.$theme.'/template',$data);
            }
            else {
                $this->load->view('front_end/base/template');
            }
        }       
    }
    
    /**
     * registersuccess
     * 
     * @author HungPV
     * @deprecated return view for register success     
     */
    function registersuccess()
    {
        //get theme
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;        

        if(get_file_info('application/views/front_end/'.$theme.'/users_registersuccess.php'))
        {
            $data['view'] = "front_end/".$theme."/users_registersuccess";
        }
        else {
            $data['view'] = "front_end/base/users_registersuccess";
        }

        if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
        {            
            $this->load->view('front_end/'.$theme.'/template',$data);
        }
        else {
            $this->load->view('front_end/base/template');
        }
    }
    
    /**
     * validation
     * 
     * @author HungPV
     * @deprecated validate for user has registered.
     */
    function validation($username,$code)
    {
        $validate = new Validate();
        $count = $validate->where('confim_code',$code)
                         ->where('login',$username)
                        ->count();
        if($count>0)
        {
            //Update Status for User
            $user = new User();
            $user->where('user_login',$username)->get();
            $user->user_status = 1;
            $user->save();
            
            //get theme
            $option = new Option();
            $option->where('option_name','template')->get();
            $theme = $option->option_value;        

            if(get_file_info('application/views/front_end/'.$theme.'/users_validation.php'))
            {
                $data['view'] = "front_end/".$theme."/users_validation";
            }
            else {
                $data['view'] = "front_end/base/users_validation";
            }

            if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
            {            
                $this->load->view('front_end/'.$theme.'/template',$data);
            }
            else {
                $this->load->view('front_end/base/template');
            }
        }
        else {
            //Update Status for User
            $user = new User();
            $user->where('user_login',$username)->get();
            $user->user_status = 1;
            
            //get theme
            $option = new Option();
            $option->where('option_name','template')->get();
            $theme = $option->option_value;        

            if(get_file_info('application/views/front_end/'.$theme.'/users_registerfalse.php'))
            {
                $data['view'] = "front_end/".$theme."/users_registerfalse";
            }
            else {
                $data['view'] = "front_end/base/users_registerfalse";
            }

            if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
            {            
                $this->load->view('front_end/'.$theme.'/template',$data);
            }
            else {
                $this->load->view('front_end/base/template');
            }
        }        
    }
    
    /**
     * checkExistUser
     * 
     * @author HungPV
     * @deprecated Check if exist user in system 
     * 
     * @param String $username for Username
     * @param String $email for Email
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUser($username,$email)
    {
        $user = new User();
        return $user->checkExistUser($username, $email);
    }
    
    /**
     * checkExistUsername
     * 
     * @author hungpv@tasvis.com.vn
     * @deprecated Check if exist user in system for Ajax
     * 
     * 
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUsername()
    {       
        $user = new User();
        $username = $this->input->post("username");
        echo $user->checkExistUsername($username);
    }    
    
    /**
     * checkExistUserEmail
     * 
     * @author hungpv@tasvis.com.vn
     * @deprecated Check if exist user in system for Ajax
     * 
     * 
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUserEmail()
    {
        $user = new User();
        $email = $this->input->post("email");
        echo $user->checkExistUserEmail($email);
    }
}
?>
