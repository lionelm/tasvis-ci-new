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
            $id = $this->input->post('param');
            $auth = new Authitem();
            $auth->where('id', $id)->get();
            $auth->delete_all();
        }
        
        function edit($id=0,$row=0)
        {
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
                $data['view'] = 'task_edit';
                $this->load->view('back_end/template_noright',$data);
            }
            
        }
        
    }
?>

