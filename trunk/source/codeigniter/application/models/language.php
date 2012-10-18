<?php 
    class Language extends DataMapper
    {
        var $table = 'languages';
        public $has_one = array("post");
        public function __construct() {
            parent::__construct();
        }     
        
    }
?>