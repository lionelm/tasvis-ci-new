<?php
/*
 * Create by: HungPV
 * Date Create: 23/10/2012
 * File Name: tasks.php
 */

    class Tasks extends MX_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->library('pagination');  
        }
        
        function index($row=0)
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('tasks.index'))))
            redirect('administrator/index');
            
            if($this->input->post('txttitle'))
            {
                $name = $this->input->post('txttitle');
                $description = $this->input->post('txtexcerpt');
                
                $authitem = new Authitem();
                $authitem->name = trim($name);
                $authitem->description = trim($description);
                $authitem->type = "task";
                
                $authitem->save();
                
            }
            
            
            //paging
            include('paging.php');
            $config['per_page'] = 15;		
            $config['base_url']= base_url()."/administrator/tasks/index/"; 

            $lstAuthitem = new Authitem();
            $config['total_rows']= $lstAuthitem->where('type','task')->count();   
            $config['cur_page']= $row;		
            $this->pagination->initialize($config);
            $data['list_link'] = $this->pagination->create_links();	

            $lstAuthitem = new Authitem();
            $data['lstAuthitem'] = $lstAuthitem->where('type','task')                                            
                                            ->limit($config['per_page'], $row)
                                            ->order_by('id','DESC')
                                            ->get();
            
            $data['view'] = 'task_add';
            $this->load->view('back_end/template_noright',$data);
        }     
        
        function delete()
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('tasks.delete'))))
            redirect('administrator/index');
            
            $id = $this->input->post('param');
            $auth = new Authitem();
            $auth->where('id', $id)->get();            
            
            $authitemchild = new Authitemchild();
            $authitemchild->where('parent_id',$id)->get();
            $authitemchild->delete_all();
            
            $authitemchild = new Authitemchild();
            $authitemchild->where('authitem_id',$id)->get();
            $authitemchild->delete_all($auth);
            $auth->delete();
        }
        
        function edit($id=0,$row=0)
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('tasks.edit'))))
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
                redirect('administrator/tasks');
            }
            else
            {                
                $auth = new Authitem();                
                $data['authitem'] = $auth->where('id',$id)->get();
                
                $lstAuthitem = new Authitem();
                $data['lstOperation'] = $lstAuthitem->where('type','operation') 
                                                ->order_by('name','ASC')
                                                ->get(); 
                $lstAuthitem = new Authitem();
                $data['lstTask'] = $lstAuthitem->where('type','task') 
                                                ->order_by('name','ASC')
                                                ->get(); 
                $lstAuthitem = new Authitem();
                $data['lstOperationChild'] = $lstAuthitem->include_related('authitemchild', array('id', 'authitem_id','parent_id'))
                                                        ->where_in_join_field('authitemchild','parent_id',$id)
                                                        ->order_by('name','ASC')
                                                        ->get(); 
                $authitemchild = new Authitemchild();
                $data['lstParent'] = $authitemchild->where('authitem_id',$id)->get();
                
                $data['view'] = 'task_edit';
                $this->load->view('back_end/template_noright',$data);
            }
            
        }
        
        function addChild()
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('tasks.addChild'))))
            redirect('administrator/index');
            
            $parent = $this->input->post('parent');
            $child = $this->input->post('child');
            
            $auth = new Authitem();
            
            $message = "false";
            if((!($auth->checkChild($child, $parent)))&!(($auth->checkParent($parent, $child)))&($auth->checkAddChild($parent, $child)))
            {
                $itemchild = new Authitemchild();
                $itemchild->parent_id = $parent;
                $itemchild->authitem_id = $child;
                if($itemchild->save())
                {
                    $message = "true";
                }
            }
            echo $message;
        }
        
        function deletechild()
        {
            if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('tasks.deletechild'))))
            redirect('administrator/index');
            
            $parent = $this->input->post('parent');
            $child = $this->input->post('child');
            
            $itemchild = new Authitemchild();
            $itemchild->where('parent_id', $parent)
                    ->where('authitem_id', $child)
                    ->get();
            
            $itemchild->delete();
        }       
    }
?>




