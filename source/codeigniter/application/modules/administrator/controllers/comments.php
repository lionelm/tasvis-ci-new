<?php
    /*
     * Create by HungPV
     * Date create: 19/10/2012
     * File name: comments.php
     */
    class Comments extends MX_Controller
    {
        public function __construct() {
            parent::__construct();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->load->library('pagination');
        }
        
        public function index($status='~',$keyword='~',$row=0)
        {
            if(!($this->session->userdata('login'))) 
            {
                redirect("administrator/login");
            }
            
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('comments.index'))))
            redirect('administrator/index'); 
            $comment = new Comment();
            $data['status'] = $status;
            if($this->input->post('slstatus'))
            {
                $data['status'] = $this->input->post('slstatus');
            }
            
            $data['key_word'] = urldecode($keyword);
            if($this->input->post('txtKeyWord'))
            {
                $data['key_word'] = $this->input->post('txtKeyWord');
            }

            //paging
            include('paging.php');
            $config['per_page'] = 10;		
            $config['base_url']= base_url()."/administrator/comments/index/".$data['status'].'/'.$data['key_word'].'/';             
            
            if($data['status']!='~')
            {
                $comment->where('comment_approved',$data['status']);
            }
            if($data['key_word']!='~')
            {
                $comment->like('comment_agent', $data['key_word']);
            }
            $config['total_rows']= $comment->count();        
            $config['cur_page']= $row;		
            $this->pagination->initialize($config);
            $data['list_link'] = $this->pagination->create_links();	

            $comment = new Comment();
            $comment->limit($config['per_page'], $row)
                    ->order_by('id','DESC');                    

            if($data['status']!='~')
            {
                $comment->where('comment_approved',$data['status']);
            }
            if($data['key_word']!='~')
            {
                $comment->like('comment_agent', $data['key_word']);
            }
            $data['lstComment'] = $comment->get();   
            
            $data['view'] = 'comment_index';
            $this->load->view('back_end/template_noright',$data);
        }
        
        function edit($id=0)
        {
            if(!($this->session->userdata('login'))) 
            {
                redirect("administrator/login");
            }
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('comments.edit'))))
            redirect('administrator/index'); 
            if($this->input->post('txttitle'))
            {
                $comment_id = $this->input->post('comment_id');
                $title = $this->input->post('txttitle');
                $content = $this->input->post('txtcontent');
                $status = $this->input->post('slStatus');
                
                //Update
                $comment = new Comment();
                $comment->where('id', $comment_id)->get();
                $comment->comment_agent = $title;
                $comment->comment_content = $content;
                $comment->comment_approved = $status;
                $comment->save();
                
                redirect("administrator/comments");
            }
            else
            {
                $comment = new Comment();
                $data["Comment"] = $comment->where('id', $id)->get();
                $data['view'] = 'comment_edit';
                $this->load->view('back_end/template_noright',$data);
            }            
        }
        
        function delete()
        {
            if(!($this->session->userdata('login'))) 
            {
                redirect("administrator/login");
            }
            
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('comments.delete'))))
            redirect('administrator/index'); 
            
            $id = $this->input->post('param');
            $comment = new Comment();
            $comment->where('id',$id)->get();
            $comment->delete_all();
        }
    }
?>
