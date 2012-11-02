<?php

class User extends DataMapper {
 
    public $has_many = array(
                'authitem' => array(			
                'class' => 'authitem',			
                'other_field' => 'user',		
                'join_self_as' => 'user',		
                'join_other_as' => 'authitem',		
                'join_table' => 'hd_users_authitems'
                        ));
                        
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>
