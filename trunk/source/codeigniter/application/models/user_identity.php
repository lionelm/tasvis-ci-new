<?php    
    class User_identity extends CI_Model
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
        function check($parent_id = 0, $child_id = 0 )        
        {         
            if ($parent_id == $child_id ) return true;
            
            $auth_item_child = new Authitemchild();            
            $auth_item_child->where('parent_id', $parent_id);                        
            $list_child = $auth_item_child->get();
                        
            foreach ($list_child as $child)
            {   
                if ($this->check($child->authitem_id, $child_id)) return true; 
            }
            
            return false;                                   
        }
        function check_acess($action = '')
        {       
            $user_id = $this->session->userdata('user_id');           
            $user_authitem = new User_authitem();
            $user_authitem->include_related('authitem', array('id','name'))
                          ->where('user_id',$user_id)->get();            
            if ($user_authitem->count()>0)                                      
            foreach( $user_authitem as $user)
            {                         
                if ($this->check_parent_child($user->authitem_name,$action)) return true;
            }
            return false;
        }
           
    }

?>
