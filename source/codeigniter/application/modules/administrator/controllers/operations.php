<?php
/*
 * Create by: HungPV
 * Date Create: 22/10/2012
 * File Name: operations.php
 */

    class Operations extends MX_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->library('pagination');  
        }
        
        function index($row=0)
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('operations.index'))))
            redirect('administrator/index'); 
            if($this->input->post('txttitle'))
            {
                $name = $this->input->post('txttitle');
                $description = $this->input->post('txtexcerpt');
                
                $authitem = new Authitem();
                $authitem->name = trim($name);
                $authitem->description = trim($description);
                $authitem->type = "operation";
                
                $authitem->save();
                
            }
            
            
            //paging
            include('paging.php');
            $config['per_page'] = 15;		
            $config['base_url']= base_url()."/administrator/operations/index/"; 

            $lstAuthitem = new Authitem();
            $config['total_rows']= $lstAuthitem->where('type','operation')->count();   
            $config['cur_page']= $row;		
            $this->pagination->initialize($config);
            $data['list_link'] = $this->pagination->create_links();	

            $lstAuthitem = new Authitem();
            $data['lstAuthitem'] = $lstAuthitem->where('type','operation')                                            
                                            ->limit($config['per_page'], $row)
                                            ->order_by('id','DESC')
                                            ->get();
            
            $data['view'] = 'operation_add';
            $this->load->view('back_end/template_noright',$data);
        }     
        
        function delete()
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('operations.delete'))))
            redirect('administrator/index'); 
            
            $id = $this->input->post('param');
            $auth = new Authitem();
            $auth->where('id', $id)->get();           
            
            $authitemchild = new Authitemchild();
            $authitemchild->where('authitem_id',$id)->get();
            $authitemchild->delete_all($auth);
            
            $auth->delete();
        }
        
        function edit($id=0,$row=0)
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('operations.edit'))))
            redirect('administrator/index'); 
            if($this->input->post('txttitle'))
            {
                $auth_id = $this->input->post('hdfID');
                $name = $this->input->post('txttitle');
                $description = $this->input->post('txtexcerpt');
                
                $authitem = new Authitem();
                $authitem->where('id',$auth_id)->get();
                $authitem->name = trim($name);
                $authitem->description = trim($description);
                              
                $authitem->save();
                redirect('administrator/operations');
            }
            else
            {                
                $auth = new Authitem();                
                $data['authitem'] = $auth->where('id',$id)->get();
                
                //paging
                include('paging.php');
                $config['per_page'] = 15;		
                $config['base_url']= base_url()."/administrator/operations/edit/".$id.'/'; 

                $lstAuthitem = new Authitem();
                $config['total_rows']= $lstAuthitem->where('type','operation')->count();   
                $config['cur_page']= $row;		
                $this->pagination->initialize($config);
                $data['list_link'] = $this->pagination->create_links();	

                $lstAuthitem = new Authitem();
                $data['lstAuthitem'] = $lstAuthitem->where('type','operation')                                            
                                                ->limit($config['per_page'], $row)
                                                ->order_by('id','DESC')
                                                ->get();                
                $data['view'] = 'operation_edit';
                $this->load->view('back_end/template_noright',$data);
            }
            
        }
        
    }
?>
