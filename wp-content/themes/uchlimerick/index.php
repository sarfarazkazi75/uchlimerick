<?php 
get_header(); 
get_template_part('template-parts/blog/blog', 'banner_section'); //banner section ?>
<section class="project-post-main-wrapper">
    <div class="container-inner">
        <div class="post-main-cover">
            <div class="row" id="show_blog_content_wrap_full">
                <?php if ( have_posts() ) : 
                    $i = 1; 
                    $temp_data = 1;
				     while ( have_posts() ) : the_post();
                    $class ='';
                    $inner_class ='';
                    $col_8_content ='';
                     if($temp_data == 1 || $temp_data == 7){
                         $class = 'col-md-8';
                         $col_8_content = '
                            <div class="row">
                                 <div class="col-md-6">
                                     <h6 class="text-border-bottom">'.get_the_title().'</h6>
                                </div>
                                <div class="col-md-6">
                                '.get_the_content().'
                                     
                                    <a class="post-date arrwo-has-link" href="'.get_permalink().'" target="blank">Read more</a>
                                </div>
                            </div>';
                        $temp_data ++ ;
                     }else{
                        $class = 'col-md-4';
                        $col_8_content= '
                            <h4 class="text-border-bottom">'.get_the_title().'</h4>
                            '.get_the_content().'
                            <a class="post-date arrwo-has-link" href="'.get_permalink().'" target="blank">Read more</a>';
                        if($temp_data == 10){
                            $temp_data = 0;
                        }
                        $temp_data ++ ;
                     }
                     if($i == 3){
                         $inner_class='donate-cover bg-gold'; 
                         
                         ?>
                            <div class="blog_single_wrap donate_div <?php echo $class;?> "  data-href="<?php echo get_permalink(1786); ?>">
                                <div class="<?php echo $inner_class;?>">
                                    <div class="post-image">
                                        <?php the_post_thumbnail(1786); ?>
                                    </div>
                                    <div class="post-details">
                                        <?php echo '<h4 class="text-border-bottom">'.get_the_title(1786).'</h4>'
                                                    .'<p>'.get_post_field('post_content', 1786).'</p>'.
                                                    '<a class="post-date arrwo-has-link" href="'.get_permalink(1786).'" target="blank">Read more</a>'; 
                                        ?>
                                    </div>
                                </div>
                            </div>
                     <?php }elseif($i == 10){
                        $inner_class='donate-cover Become-friend-cover bg-light-gray'; ?>
                            <div class="blog_single_wrap become_a_friend_div <?php echo $class;?> " data-href="<?php echo get_permalink(1789); ?>">
                                <div class="<?php echo $inner_class;?>">
                                    <div class="post-image">
                                        <?php the_post_thumbnail(1789); ?>
                                    </div>
                                    <div class="post-details">
                                        <?php echo '<h4 class="text-border-bottom">'.get_the_title(1789).'</h4>'
                                                    .'<p>'.get_post_field('post_content', 1789).'</p>'.
                                                    '<a class="post-date arrwo-has-link" href="'.get_permalink(1789).'" target="blank">Read more</a>'; 
                                        ?>
                                    </div>
                                </div>
                            </div>                     
                     <?php }else{
                        $inner_class='post-card'; ?>
                            <div class="blog_single_wrap from_else <?php echo $class;?> ">
                                <div class="<?php echo $inner_class;?>">
                                    <div class="post-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="post-details">
                                    <?php echo $col_8_content;?>
                                    </div>
                                </div>
                            </div>
                     <?php }
                    ?>    
				    <?php $i++; endwhile; ?>
				<?php  endif; ?>
            </div>
            <?php if ($i >=10) { ?>
            <div class="load-more-btn text-center">
                <a id="load_more_blog" href="javascript:void(0);" class="button-light button" ><?php echo _('Load More');?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/flex', 'newsletter_section'); 
get_footer();
?>