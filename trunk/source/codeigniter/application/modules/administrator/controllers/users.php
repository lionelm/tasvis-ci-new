<?php
    class Users extends MX_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
        }
        
        function index()
        {
                       
            $user1 = new User();
            $data['lstuser'] = $user1->get(); // lay ra tat ca user
            $data['view'] = 'user_index';
            $this->load->view('back_end/template_noright',$data);
            
        }
        
         function add()
        {
            if( $this->input->post('txtlogin') and $this->input->post('txtpass') )
            {
                $user_login = $this->input->post('txtlogin');
                $user_pass = $this->input->post('txtpass');
                $user_nicename = $this->input->post('txtnicename');
                $user_email = $this->input->post('txtemail');                
                
                if( !$this->checkuser($user_login) )
                {
                    $user2 = new User();
                    $user2->user_login = $user_login;
                    $user2->user_pass = $user_pass;
                    $user2->user_nicename = $user_nicename;
                    $user2->user_email = $user_email;
                    $user2->user_registered = date('Y-m-d H:i:s');
                    $user2->display_name = $user_nicename;
                    
                    $user2->save();
                    redirect('administrator/users');
                }
            }else{
            
                //$u2 = new User();
               // $data['lstuser'] = $u2->get(); // lay ra tat ca user
                $data['view'] = 'user_add';
                $this->load->view('back_end/template_noright',$data);
                               
            }
            
        }
        
        
        function edit()
        {
                       
            if( $this->input->post('txtlogin') and $this->input->post('txtpass') )
            {
                $user_id = $this->input->post('txtid');
                $user_login = $this->input->post('txtlogin');
                $user_pass = $this->input->post('txtpass');
                $user_nicename = $this->input->post('txtnicename');
                $user_email = $this->input->post('txtemail');
                
                $user3 = new User();
                $user3->where('id = ',$user_id)->update(array('id'=>$user_id,'user_login'=>$user_login,'user_pass'=>$user_pass,'user_nicename'=>$user_nicename,'user_email'=>$user_email));
                redirect('administrator/users');
                           
            }else{ 
                $id = $this->uri->segment(4);
                $user4 = new User();
                $data['user4'] = $user4->where('id',$id)->get();
                
                $user5 = new User();            
                $data['lstuser5'] = $user5->get();
                $data['view'] = 'user_edit';
                $this->load->view('back_end/template_noright',$data);
           }
            
        }
        
        function delete()
        {
            $id = $this->input->post('param');
            $user = new User();
            //$user->get_by_id($id);
            $user->where('id',$id)->get();
            $user->delete();
            
        }  
        
        
        
        function checkuser($login)
        {
            $user = new User();
            $count = $user->where('user_login',$login)->count();
            if($count > 0)
            {
                return true;
                
            }else{
                return false;
            }
        }
        
    }
?>