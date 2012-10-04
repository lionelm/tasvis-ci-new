<?php
class Student extends DataMapper {
 
    public $has_many = array('course');
   
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }
    
    var $validation = array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),
        )
    );
}
?>