<?php
    class Tag_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        public function ListPopularTag($sum=10)
        {
            $term_taxonomy = new Term_taxonomy();
            $lstTerm = $term_taxonomy->include_related('post',array('id,post_title'))
                            ->include_related('term',array('name,slug'))
                            ->where('taxonomy', 'tag')         
                            ->select('count(*) as sum')
                            ->group_by('term_id')
                            ->order_by('sum','DESC')
                            ->limit($sum, 0)
                            ->get();
            //$term_taxonomy->check_last_query();
            return $lstTerm;
        }
    }
?>
