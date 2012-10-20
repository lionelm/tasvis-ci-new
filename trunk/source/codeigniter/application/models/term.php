<?php
/*
 * File name:term.php
 * Create by HungPV
 * Create date: 04/10/2012
 */
class Term extends DataMapper {   
    
    public  $has_one = array("term_taxonomy");
    public function __construct()
    {
        // model constructor
        parent::__construct();
    }  
    
    function checkExitTag($name)
    {
        $tag = new Term();        
        $name = trim($name);
        $name = mb_strtolower($name, 'utf-8');
        $count = $tag->where("ENCODE(LOWER(" . $tag->add_table_name('name') . "),'key') = ENCODE('".$name."','key')")
            ->include_related('term_taxonomy', array('id', 'taxonomy','description'))
            ->where_in_join_field('term_taxonomy','taxonomy','tag')
            ->count();
        if($count>0)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
?>