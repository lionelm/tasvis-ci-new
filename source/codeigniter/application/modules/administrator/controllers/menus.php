<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Menus extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');   
            $this->load->model('Category_model');     
            $this->load->model('Menu_model');                                 
        }
        function index()
        {
            // Lay ra danh sach menu
            $term = new Term();
            $term->where('term_group',1)->get();
            $data['list_menu'] =  $term;
            $data['view'] = 'main_menu';
            $this->load->view('back_end/template_noright',$data);
        }
        function edit_main_menu($term_id = 0)
        {
            if ($this->input->post('name'))
            {
                $term = new Term();
                $term->get_by_id($this->input->post('id'));
                $term->name = $this->input->post('name');
                $term->save();
                $this->index();
            } else
            {
                $term = new Term();
                $term->get_by_id($term_id);
                $data['main_menu']  = $term;  
                // Lay ra danh sach menu
                $term = new Term();
                $term->where('term_group',1)->get();
                $data['list_menu'] =  $term;
                $data['view'] = 'main_menu_edit';
                $this->load->view('back_end/template_noright',$data);
            }
        }
        function add_main_menu()
        {
            if($this->input->post('name_menu'))
            {
                //add Term
                $term = new Term();
                $term->name = $this->input->post('name_menu');
                $term->term_group = 1; 
                $term->slug = $term->name;
                $term->save();
            }
            $this->index();
        }
        function menu($object_id = 0)
        { 
            
            // lay danh sach cac page
             $lstPost = new Post();                                       
            //paging
            include('paging.php');
            $config['per_page'] = 10;		
            $config['base_url']= base_url()."/administrator/pages/index/"; 
            $lstPost->where('post_type','page')->group_by('root_lang');
            
            $row = 0;
            $config['total_rows']= $lstPost->count();        
            $config['cur_page']= $row;		
            $this->pagination->initialize($config);
            $data['list_link'] = $this->pagination->create_links();	
            
            $lstPost = new Post();
            $lstPost->where('post_type','page')
                    ->limit($config['per_page'], $row)
                    ->order_by('id','DESC')
                    ->group_by('root_lang');
            
            
            $data['lstPost'] = $lstPost->get();   
            
            //lay danh sach cac menu con
            $data['child_menu'] = $this->Menu_model->get_menus(0,5,$object_id);            
            $data['term_option'] = $this->Category_model->get_categories(0,5); 
            $data['parent_option'] =  $this->Menu_model->get_menus(0,5,$object_id); 
            $data['view'] = 'menu';
            $term = new Term();
            $term->get_by_id($object_id);
            
            $data['object_id'] = $object_id;
            $data['name_main_menu'] = $term->name;
            $this->load->view('back_end/template_noright',$data);
        } 
        function save_detail($object_id = 0 )
        {
            $temp =  new Menu();
            $temp->where('id', $this->input->post('id'))->get();
            $temp->label = $this->input->post('label');                        
            $temp->id =  $this->input->post('id');
            $temp->title_attribute =  $this->input->post('title_attribute');
            $temp->description = $this->input->post('description');            
            $temp->class = $this->input->post('css_class');
            $temp->status = $this->input->post('status');
            $temp->target = $this->input->post('open_link');
            if ($this->input->post('post_id')) $temp->post_id = $this->input->post('post_id');
            $temp->url = $this->input->post('url');                                                                                         
            $temp->type = $this->input->post('type'); 
            $temp->order = $this->input->post('order');
            $temp->parent = $this->input->post('parent');  
            $temp->object_id = $this->input->post('object_id');              
            $temp->save();
            redirect('administrator/menus/menu/'.$object_id);                        
        }
                
        function delete()
        {
            $menu_id = $this->input->post('id');
            $menu = new Menu();
            $menu->get_by_id($menu_id);
            
            $list_child = $this->Menu_model->get($menu_id,1,$menu->object_id);
            foreach( $list_child as $child)
            {
               $temp_menu =  new Menu();
               $temp_menu->get_by_id($child->id);
               $temp_menu->parent = $menu->parent;
               $temp_menu->save();
            }
            
            $menu->delete();
        }   
        function delete_main_menu()
        {
            $main_menu_id = $this->input->post('param');
            
            $menu = new Menu();
            $menu->where('object_id',$main_menu_id)->get();
            $menu->delete_all();
            $term = new Term();
            $term->get_by_id($main_menu_id);
            $term->delete();
        }
   
    }
?>
