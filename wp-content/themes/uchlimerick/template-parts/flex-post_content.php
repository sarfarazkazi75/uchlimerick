
<?php 
    $post_tilte = get_sub_field('post_tilte');
    $post_description = get_sub_field('post_description');

?>

<section class="project-post ">
    <div class="container-inner">
        <div class="post-container">
            <?php if(!empty($post_tilte)){?><h5><?php echo $post_tilte;?></h5><?php }?>
            <?php if(!empty($post_description)){?><?php echo $post_description;?><?php }?>

</div>
</div>
</section>

