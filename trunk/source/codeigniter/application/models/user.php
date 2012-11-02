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
    
    /**
     * checkExistUser
     * 
     * @author hungpv@tasvis.com.vn
     * @deprecated Check if exist user in system 
     * 
     * @param String $username for Username
     * @param String $email for Email
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUser($username,$email)
    {
        $user = new User();
        $count = $user->where("user_login",$username)
                ->or_where("user_email", $email)
                ->count();
        if($count>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * checkExistUsername
     * 
     * @author hungpv@tasvis.com.vn
     * @deprecated Check if exist user in system 
     * 
     * @param String $username for Username
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUsername($username)
    {
        $user = new User();
        $count = $user->where("user_login",$username)                
                ->count();
        if($count>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }    
    
    /**
     * checkExistUserEmail
     * 
     * @author hungpv@tasvis.com.vn
     * @deprecated Check if exist user in system 
     * 
     * @param String $email for Email
     * @return boolean return true if exist, or return false if not.
     */
    function checkExistUserEmail($email)
    {
        $user = new User();
        $count = $user->where("user_email",$email)                
                ->count();
        if($count>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
