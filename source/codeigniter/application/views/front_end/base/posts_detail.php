 <br /><br />
   
    <?php    
    foreach ($postdetail as $pdetail)
    {
     ?>       
       <ul>              
          <li><?php echo $pdetail->post_title;?></li> 
       </ul>
       
       <div ><?php echo $pdetail->post_content;   ?></div>    
    
    <?php
    }
    ?>
    