
 Danh sách bài viết.
<?php    
    foreach ($lstpostall as $post)
    {
     ?>       
       <ul>              
          <li><a href="<?php echo base_url();?>post/posts/detail/<?php echo $post->id;?>"><?php echo $post->post_title; echo $post->language_id;?></a></li> 
       </ul>    
    
    <?php
    }
    ?>