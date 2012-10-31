<?php
class Student extends DataMapper
{
    public $has_many = array("country");
    public function __construct()
    {
        parent::__construct();
    }
    
}

?>