<?php
    class Temp
    {
        public $id = 0;
        public $name = '';
        public $description = '';
        public $depth = 0;
        public $slug = '';
        public $name_display = '';
    }
    class Category_model extends CI_Model
    {
        function __construct() {
            parent::__construct();
        }
        
        function show_categories($parent_id = '0',$limit_depth = 5, $depth = 0 )
        {
            if ($depth > $limit_depth) return;                        
            $term_taxonomy = new Term_taxonomy();
            $term_taxonomy->where('taxonomy', 'category');
            $term_taxonomy->where('parent_term', $parent_id);                        
            $categories = $term_taxonomy->get();
            $cats = '';
            if (count($categories)>0)
            {
                foreach ($categories as $category)
                {                                                     
                    $cats .= $depth.'-'.$category->term_id.'|';
                    $cats .= $this->show_categories($category->term_id,$limit_depth,$depth+1);
                }
            }            
            return $cats;            
        }
        function get($parent_id = '0',$limit_depth = 5)
        {
            $list_category = array();
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            if ($cats != '')
            {
                            
                $cats =  explode('|',$cats);                         
                foreach($cats as $cat)
                {
                    
                    $category = explode('-',$cat);
                    $temp = new Temp();
                    $temp->id = $category[1];
                    $temp->depth = $category[0];
                    $list_category[] = $temp;                                    
                }
            }
            return $list_category;
        }
        
        function get_count_category($parent_id = '0',$limit_depth = 5)
        {
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            $cats =  explode('|',$cats);
            return count($cats);
        }
        function get_categories($parent_id = '0',$limit_depth = 2, $offset =0, $limit = 0 )
        {
            $cats = substr($this->show_categories($parent_id,$limit_depth),0,-1);
            $cats =  explode('|',$cats);
            $lstTerms = array();           
            if ($limit != 0 )
            {
                $sl = 0;
                foreach($cats as $cat)
                {
                    if ($sl >= $offset)
                    {
                        $sl++;
                        $category = explode('-',$cat);
                        $temp = new Temp();
                        $temp->id = $category[1];
                        $pre = '';
                        for($i = 1; $i<=$category[0];$i++)
                        {
                            $pre .= '— ';
                        }
                        $term = new Term();
                        $term->get_by_id($temp->id);
                        
                        $temp->name_display = $pre.$term->name;
                        $temp->name = $term->name;
                        $term_taxonomy = new Term_taxonomy();
                        $term_taxonomy->where('term_id', $temp->id)->get();
                        
                        $temp->description = $term_taxonomy->description;
                        $temp->slug = $term->slug;
                        $lstTerms[] = $temp;
                        if ($sl >= $offset+$limit) break;
                    } else
                    $sl++;                    
                }
            } else
            {
                foreach($cats as $cat)
                {
                   
                        $category = explode('-',$cat);
                        $temp = new Temp();
                        $temp->id = $category[1];
                        $pre = '';
                        for($i = 1; $i<=$category[0];$i++)
                        {
                            $pre .= '— ';
                        }
                        $term = new Term();
                        $term->get_by_id($temp->id);
                        $temp->name_display = $pre.$term->name;
                        $temp->name = $term->name;
                        $term_taxonomy = new Term_taxonomy();
                        $term_taxonomy->where('term_id', $temp->id)->get();
                        
                        $temp->description = $term_taxonomy->description;
                        $temp->slug = $term->slug;
                        $lstTerms[] = $temp;
                        
                    }
            }
            return $lstTerms;
        }
   
    }

?>
