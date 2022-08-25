  
<?php 

            $quote_content = get_sub_field('quote_content');
            $quote_description = get_sub_field('quote_description');
?>
<section class="">
    <div class="container-inner">
        <div class="post-container">        
            <br>
           
            
            <div class="client-flat">
                <img src="<?php echo home_url()?>/wp-content/uploads/2022/08/flate.png" alt="">
                <?php if(!empty($quote_content)){?>
                <h5>
                    <p><?php echo $quote_content;?></p>
                </h5>
                <?php }?>
                <?php if(!empty($quote_description)){?>
                    <span><?php echo $quote_description;?></span>
                <?php }?>
            </div>
    
          
        </div>
    </div>
</section>