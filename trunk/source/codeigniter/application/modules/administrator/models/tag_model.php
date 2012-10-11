<?php
    class Tag_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        public function ListPopularTag($sum=10)
        {
            $post =  new Post();
            $post->include_related('term_taxonomy',array('id','taxonomy','term_id'))
                            ->include_related('term',array('id','name'));
                            
        }
    }
?>
