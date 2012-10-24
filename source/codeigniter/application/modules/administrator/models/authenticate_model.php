<?php    
    class Authenticate_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        function get_id($auth_item = '')
        {
            $authitem = new Authitem();
            $authitem->where('name',$auth_item);                                 
            $authitem->get();
            return $authitem->id;
        }
        function check_parent_child($parent_name = '', $child_name = '')
        {
            $parent_id = $this->get_id($parent_name);
            $child_id =  $this->get_id($child_name);            
            if ($this->check($parent_id,$child_id)) 
                { return true; } else { return false; };
        }
        function check($parent_id = 0, $child_id = 0, $depth = 0 )        
        {         
            $auth_item_child = new Authitemchild();            
            $auth_item_child->where('parent_id', $parent_id);                        
            $list_child = $auth_item_child->get();            
            if (count($list_child) > 0)
            {
                foreach ($list_child as $child)
                {   
                    if ($child->authitem_id == $child_id) { return true; } 
                    else                    
                    {                                   
                        return $this->check($child->authitem_id, $child_id, $depth+1); 
                    }
                }
            }                                   
        }
        
           
    }

?>