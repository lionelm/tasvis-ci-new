<?php
/*
 * Create by: HungPV
 * Create date: 26/10/2012
 * File name: custom.php
 * Description: Custom model
 */

class Custom extends DataMapper
{   
    public  $has_one = array("customfor","customdetail");
    function __construct() {
        parent::__construct();
    }  
    
    function getCustomApply($apply='post')
    {
        $custom = new Custom();
        $lstCustom = $custom->include_related('customfor', array('id','apply'))
                ->where_in_join_field('customfor', 'apply', $apply)
                ->get();
        return $lstCustom;
    }
    
    function getCustomDefault($id)
    {
        $customdetail = new Customdetail();
        $customdetail->where('custom_id',$id)
                    ->where('default',1)
                    ->get();
        return $customdetail->value;
    }
}
?>
