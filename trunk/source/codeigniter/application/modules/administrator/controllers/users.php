<?php
    class Users extends MX_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->library('email');
        }
        
        function index($role='~',$keyword='~',$row=0)
        {   
            // ktra quyen truoc khi dang nhap
             if(!($this->session->userdata('login'))) 
                {
                    redirect("administrator/login");
                }
                
                if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('posts.index'))))
                redirect('administrator/index'); 
                
                

               $user1 = new User();
               $authitem = new Authitem();
               $data['lstrole'] = $authitem->where('type','role')->get();                              
               
               $data['role'] = $role;  
               if($this->input->post('slrole')) 
               {           
                 $data['role'] = $this->input->post('slrole');
               }
               
               $data['keyword'] = urldecode($keyword);  // giải mã chuỗi url 
               if($this->input->post('txtkeyword'))
               {
                 $data['keyword'] = $this->input->post('txtkeyword');
               }           
             //paging
                include('paging.php');
                $config['per_page'] = 5; // số bản ghi trên 1 trang
                $config['base_url']= base_url()."/administrator/users/index/".$data['role'].'/'.$data['keyword'].'/'; // trang để phân trang
                $user1 = new User();
                $config['total_rows']= $user1->count(); // tổng số bản ghi trong table
                $config['cur_page']= $row; // trang hiện tại
                $this->pagination->initialize($config);
                $data['list_link'] = $this->pagination->create_links();	 // tạo link phân trang
                 
                $user1 = new User();
                $user1->limit($config['per_page'], $row); 
                        
                 if($data['keyword'] != '~')    
                 {
                    $user1->like('user_login',$data['keyword']);
                 }
                 if($data['role'] > 0)
                 {
                    $user1->include_related('authitem',array('id','name','type'))
                            ->where_related('authitem', 'type', 'role')
                                ->where_related('authitem', 'id', $data['role']);
                 }   
                 
                 
                 
                $data['lstuser'] = $user1->get();
                $data['view'] = 'user_index';
                $this->load->view('back_end/template_noright',$data);
             
             
             
             
             /*
             //paging
                include('paging.php');
                $config['per_page'] = 3; // số bản ghi trên 1 trang
                $config['base_url']= base_url()."/administrator/users/index/"; // trang để phân trang
                $user1 = new User();
                $config['total_rows']= $user1->count(); // tổng số bản ghi trong table
                $config['cur_page']= $row; // trang hiện tại
                $this->pagination->initialize($config);
                $data['list_link'] = $this->pagination->create_links();	 // tạo link phân trang
                 
                $user1 = new User();
                $data['lstuser'] = $user1->limit($config['per_page'], $row)->get(); 
                $data['view'] = 'user_index';
                $this->load->view('back_end/template_noright',$data);
           */
        }
        
         function add()
        {
            if( $this->input->post('txtlogin'))
            {
                $user_login = $this->input->post('txtlogin');
                $user_pass = $this->input->post('txtpass');
                $user_confirmpass = $this->input->post('txtconfirmpass');
                $user_nicename = $this->input->post('txtnicename');
                $user_email = $this->input->post('txtemail');
                $l_arr_role = $this->input->post('slrole');        
                $user_status = $this->input->post('rdtrangthai');         
                
                if( !$this->checkuser($user_login) )
                {
                    $user2 = new User();
                    $user2->user_login = $user_login;
                    $user2->user_pass = md5($user_pass);
                    $user2->user_confirmpas = md5($user_confirmpass);
                    $user2->user_nicename = $user_nicename;
                    $user2->user_email = $user_email;
                    $user2->user_registered = date('Y-m-d H:i:s');
                    $user2->display_name = $user_nicename;               
                    $user2->user_status = $user_status;
                    
                   // Save user với mối quan hệ n-n
                    $authi = new Authitem();
                    $authi->where_in('id',$l_arr_role)->get();
                    
                    $user2->save($authi->all); // validation tự động kiểm tra khi ta gọi save()
                    redirect('administrator/users');
                   
                }
            }else{
                
                $authitem = new Authitem();
                $data['lstrole'] = $authitem->where('type','role')->get();
                
                $data['view'] = 'user_add';
                $this->load->view('back_end/template_noright',$data);
                               
            }
            
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
        
        function delete()
        {
            $id = $this->input->post('param'); //sử dụng jquery(ajax)
            $user = new User();
            $user->get_by_id($id);
            //$user->where('id',$id)->get();
            $user->delete();
            
        }  
        
        function edit($id=0,$row=0)
        {
                       
            if($this->input->post('txtnicename')  or $this->input->post('ckrole') or $this->input->post('txtemail') )
            {
                $user_id = $this->input->post('txtid');
                //$user_login = $this->input->post('txtlogin'); // login bị disable(ko cho sửa) nên ko sử dụng post để nhận dữ liệu
                //$user_pass = md5($this->input->post('txtpass'));
                $user_nicename = $this->input->post('txtnicename');
                $l_arr_role = $this->input->post('ckrole'); 
                $user_email = $this->input->post('txtemail');
                
                $user3 = new User();
                $user3->where('id',$user_id)->get();
                //$user3->user_login = $user_login;
                //$user3->user_pass = $user_pass;
                $user3->user_email = $user_email;
                $user3->user_nicename = $user_nicename;
                $user3->user_display = $user_nicename;
                
                // nếu ko checkbox ko được check(tích) thì ta xóa bản ghi đó đi(xóa trong bảng được sinh ra(trong quan hệ n-n))
                    if($this->input->post('ckrole') != 'on')
                    {
                        $user_authitem = new User_authitem();
                        $user_authitem->where('user_id',$user_id)->get();
                        $user_authitem->delete_all();
                    }
                                       
                    // nếu user chưa tồn tại thì sẽ save, tồn tại rối thì sẽ update 
                    $authi = new Authitem();
                    $authi->where_in('id',$l_arr_role)->get();                    
                    $user3->save($authi->all); // validation tự động kiểm tra khi ta gọi save()                      
                    redirect('administrator/users');
                           
            }else{ 
                $id = $this->uri->segment(4);
                $user4 = new User();
                $data['user4'] = $user4->where('id',$id)->get();
                
                $authitem = new Authitem();
                $data['lstrole'] = $authitem->where('type','role')->get();
                
                
                //paging
                include('paging.php');
                $config['per_page'] = 3; // số bản ghi trên 1 trang
                $config['base_url']= base_url()."/administrator/users/edit/".$id.'/'; // (ve nha xem lai dong nay)trang để phân trang
                $user5 = new User();  
                $config['total_rows']= $user5->count(); // tổng số bản ghi trong table
                $config['cur_page']= $row; // trang hiện tại
                $this->pagination->initialize($config);
                $data['list_link'] = $this->pagination->create_links();	 // tạo link phân trang
                 
                $user1 = new User();
                $data['lstuser'] = $user1->limit($config['per_page'], $row)->get(); 
                $data['view'] = 'user_edit';
                $this->load->view('back_end/template_noright',$data);
                
           }
            
        }
        
        function profile()
        {
            
            if($this->input->post('txtpass') ) // xem lai
            {
                $user_id = $this->input->post('txtid');
                $user_login = $this->input->post('txtlogin');
                $user_pass = md5($this->input->post('txtpass'));
                $user_nicename = $this->input->post('txtnicename');
                $user_email = $this->input->post('txtemail');
                
                $user3 = new User();
                $user3->where('id = ',$user_id)->update(array('id'=>$user_id,'user_pass'=>$user_pass,'user_nicename'=>$user_nicename,'user_email'=>$user_email));
                redirect('administrator/users');
                           
            }else{ 
                $id = $this->uri->segment(4);
                $user4 = new User();
                $data['user4'] = $user4->where('id',$id)->get();                
               
                $data['view'] = 'user_profile';
                $this->load->view('back_end/template_noright',$data);
                
           }
            
        }
        
        
        
        
       
        
    }
?>