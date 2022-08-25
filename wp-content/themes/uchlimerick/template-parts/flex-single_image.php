<?php
			$post_single_image = get_sub_field('post_single_image');
?>
<section class="project-post ">
    <div class="container-inner">
        <div class="post-container">           
            <div class="">
            	<?php 

            		echo wp_get_attachment_image($post_single_image,'full','',array('class'=>'only-desktop'));
            		echo wp_get_attachment_image($post_single_image,'full','',array('class'=>'only-mobile w-100'));
            	?>
            </div>
       </div>
       </div>
       </section>