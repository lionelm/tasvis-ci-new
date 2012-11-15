<?php
    class Temp_menu
    {
        public $id = 0;
        public $label = '';
        public $label_display = '';
        public $description = '';
        public $depth = 0;
        public $url = 0;
        public $title_attribute = '';
        public $open_link = 0;
        public $css_class = '';
        public $status = '';
        public $post_id = 0;     
        public $type = '';
        public $order = 0;   
        public $parent = 0; 
    }
    class Menu_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        function show_menus($parent_id = '0',$limit_depth = 5, $main_menu = 0, $depth = 0 )
        {
            if ($depth > $limit_depth) return; 
            $menu = new Menu();                       
            $menu->where('parent', $parent_id);
            $menu->where('object_id', $main_menu);
            $menu->order_by("order", "ASC");                        
            $list_menu = $menu->get();
            $cats = '';
            if (count($list_menu)>0)
            {
                foreach ($list_menu as $menu_child)
                {                                                     
                    $cats .= $depth.'-'.$menu_child->id.'|';
                    $cats .= $this->show_menus($menu_child->id,$limit_depth,$main_menu,$depth+1);
                }
            }            
            return $cats;            
        }
        function get($parent_id = '0',$limit_depth = 5,$main_menu = 0)
        {
            $cats = substr($this->show_menus($parent_id,$limit_depth,$main_menu),0,-1);
            $cats =  explode('|',$cats);
            $list_category = array();           
            foreach($cats as $cat)
            {
                
                $category = explode('-',$cat);
                $temp = new Temp_menu();
                $temp->id = $category[1];
                $temp->depth = $category[0];
                $list_category[] = $temp;                                    
            }
            return $list_category;
        }
        
        function get_count_category($parent_id = '0',$limit_depth = 5)
        {
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            $cats =  explode('|',$cats);
            return count($cats);
        }
        function get_menus($parent_id = '0',$limit_depth = 5, $main_menu = 0, $offset =0, $limit = 0 )
        {
            
            $menus = substr($this->show_menus($parent_id,$limit_depth,$main_menu),0,-1);
            $lstMenus = array();
            if ($menus != '')
            { 
                $menus =  explode('|',$menus);            
                //$lstMenus = array();           
                if ($limit != 0 )
                {
                    $sl = 0;
                    foreach($menus as $menu)
                    {
                        if ($sl >= $offset)
                        {
                            $sl++;
                            $menu = explode('-',$menu);
                            $temp = new Temp_menu();
                            $temp->id = $menu[1];
                            $pre = '';
                            for($i = 1; $i<=$menu[0];$i++)
                            {
                                $pre .= '— ';
                            }
                            $menu_detail = new Menu();
                            $menu_detail->get_by_id($temp->id);    
                                            
                            $temp->label_display = $pre.$menu_detail->get_name($temp->id,'vi');      
                            $temp->label = $menu_detail->label;                  
                            $temp->id = $menu_detail->id;
                            $temp->title_attribute = $menu_detail->title_attribute;
                            $temp->description = $menu_detail->description;
                            $temp->depth = $menu_detail->depth;
                            $temp->css_class = $menu_detail->class;
                            $temp->status = $menu_detail->status;
                            $temp->open_link = $menu_detail->target;
                            $temp->post_id = $menu_detail->post_id;
                            $temp->url = $menu_detail->url;                                                                                         
                            $temp->type = $menu_detail->type; 
                            $temp->order = $menu_detail->order;
                            $temp->parent = $menu_detail->parent; 
                            
                            $lstMenus[] = $temp;
                            if ($sl >= $offset+$limit) break;
                        } else
                        $sl++;                    
                    }
                } else
                {
                    foreach($menus as $menu)
                    {
                       
                            $menu = explode('-',$menu);                        
                            $temp = new Temp_menu();
                            $temp->id = $menu[1];
                            $pre = '';
                            for($i = 1; $i<=$menu[0];$i++)
                            {
                                $pre .= '— ';
                            }                        
                            $menu_detail = new Menu();
                            $menu_detail->get_by_id($temp->id);  
                            $temp->label_display = $pre.$menu_detail->get_name($temp->id,'vi');                       
                            $temp->label = $menu_detail->label;                        
                            $temp->id = $menu_detail->id;
                            $temp->title_attribute = $menu_detail->title_attribute;
                            $temp->description = $menu_detail->description;
                            $temp->depth = $menu_detail->depth;
                            $temp->css_class = $menu_detail->class;
                            $temp->status = $menu_detail->status;
                            $temp->open_link = $menu_detail->target;
                            $temp->post_id = $menu_detail->post_id;
                            $temp->url = $menu_detail->url;
                            $temp->type = $menu_detail->type; 
                            $temp->order = $menu_detail->order;
                            $temp->parent = $menu_detail->parent; 
                            
                            $lstMenus[] = $temp;
                            
                        }
                }
                
            }
            return $lstMenus;
        }
   
    }

?>
