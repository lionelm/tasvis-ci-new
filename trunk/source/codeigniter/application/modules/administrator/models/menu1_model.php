<?php
    class Temp_menu
    {
        public $id;
        public $name;
        public $description;
        public $depth;
        public $slug;
    }
    class Menu1_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        function show_menus($parent_id = '0',$limit_depth = 5, $main_menu = 0, $depth = 0 )
        {
            if ($depth > $limit_depth) return;                        
            $menu = new Menu();
            print_r($menu);
            $menu->where('parent', $parent_id);
            $menu->where('object_id', $main_menu);
                                    
            $list_menu = $menu->get();
            $cats = '';
            if (count($list_menu)>0)
            {
                foreach ($list_menu as $menu)
                {                                                     
                    $cats .= $depth.'-'.$menu->id.'|';
                    $cats .= $this->show_menus($menu->id,$limit_depth,$main_menu,$depth+1);
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
        function get_menus($parent_id = '0',$limit_depth = 2, $main_menu = 0, $offset =0, $limit = 0 )
        {
            $cats = substr($this->show_menus($parent_id,$limit_depth,$main_menu),0,-1);
            $cats =  explode('|',$cats);
            $lstTerms = array();           
            if ($limit != 0 )
            {
                $sl = 0;
                foreach($cats as $cat)
                {
                    if ($sl >= $offset)
                    {
                        $sl++;
                        $category = explode('-',$cat);
                        $temp = new Temp_menu();
                        $temp->id = $category[1];
                        $pre = '';
                        for($i = 1; $i<=$category[0];$i++)
                        {
                            $pre .= '— ';
                        }
                        $term = new Menu();
                        $term->get_by_id($temp->id);
                        
                        $temp->name = $pre.$term->name;                                                                        
                        $temp->slug = $term->slug;
                        $lstTerms[] = $temp;
                        if ($sl >= $offset+$limit) break;
                    } else
                    $sl++;                    
                }
            } else
            {
                foreach($cats as $cat)
                {
                   
                        $category = explode('-',$cat);
                        $temp = new Temp_menu();
                        $temp->id = $category[1];
                        $pre = '';
                        for($i = 1; $i<=$category[0];$i++)
                        {
                            $pre .= '— ';
                        }
                        $term = new Term();
                        $term->get_by_id($temp->id);
                        
                        $temp->name = $pre.$term->name;
                        
                        $temp->slug = $term->slug;
                        $lstTerms[] = $temp;
                        
                    }
            }
            return $lstTerms;
        }
   
    }

?>
