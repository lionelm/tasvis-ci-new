
 Danh sách 5 bài viết đầu tiên.
<?php    
    foreach ($lstposts as $post)
    {
     ?>       
       <ul>              
          <li><a href="<?php echo base_url();?>demo/posts/detail/<?php echo $post->id;?>"><?php echo $post->post_title;?></a></li> 
       </ul>    
    
    <?php
    }
    ?>