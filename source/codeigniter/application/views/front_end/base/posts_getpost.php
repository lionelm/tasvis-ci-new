   <br /><br />
   - Danh sách bài viết <br />
   
   
    <?php    
    
    foreach ($lstpost as $post)
    {
     ?>       
       <ul>              
          <li><a href="<?php echo base_url();?>post/posts/detail/<?php echo $post->id;?>"><?php echo $post->post_title;?></a></li> 
       </ul>    
    
    <?php
    }
    ?>
    
   