
 Danh sách bài viết.
<?php    
    foreach ($lstpostall as $post)
    {
     ?>       
       <ul>              
          <li><a href="<?php echo base_url();?>demo/posts/detail/<?php echo $post->id;?>"><?php echo $post->post_title;?></a></li> 
       </ul>    
    
    <?php
    }
    ?>