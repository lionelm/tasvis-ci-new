<?php

class User extends DataMapper {
 
   var $validation = array(
        'user_login' => array(
            'label' => 'Tên truy cập',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 3, 'max_length' => 20)
        ),
        'user_pass' => array(
            'label' => 'Mật khẩu',
            'rules' => array('required', 'trim', 'min_length' => 3)
        ),
        
        'user_email' => array(
            'label' => 'Địa chỉ Email ',
            'rules' => array('required', 'trim', 'valid_email')
        )
    );
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }   
}
?>
