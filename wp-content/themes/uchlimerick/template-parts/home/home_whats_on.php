<section class="whats-on homepage">
   <div class="container-inner">
      <div class="section-title text-border-bottom">
         <h3 class="">What's On?</h3>
         <div class="">
         <a href="#" class="button button-dark d-none d-md-block">Book Tickets</a>
         </div>
      </div>
        <div class="post-main-cover">
            <div class="row">
                <?php
        // the query
        $the_query = new WP_Query(array(
            'post_type' => 'show',
            // 'taxonomy' => 'whats-on',
            'post_status' => 'publish',
            'posts_per_page' => 4,
        ));

        $i=0;
        $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
        ?>

        <?php if ($the_query->have_posts()) :  ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                    $uchlimerick_post_show_start_date = get_field("uchlimerick_post_show_start_date");
                    $date_uchlimerick_post_show_start_date = date("j M", strtotime($uchlimerick_post_show_start_date));

                    $uchlimerick_post_show_end_date = get_field("uchlimerick_post_show_end_date");
                    $date_uchlimerick_post_show_end_date = date("j M", strtotime($uchlimerick_post_show_end_date));

                    $uchlimerick_post_show_book_ticket_link = get_field("uchlimerick_post_show_book_ticket_link");
                    
                ?>
                    <div class="show_single_wrap <?php echo $classes[$i%12]; ?>">                           
                        <div class="post-card">
                            <div class="post-image">
                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                <img src="<?php echo $url ?>" />
                            </div>
                            <div class="post-details">
                                <h6 class="text-border-bottom"><?php the_title(); ?></h6>
                                <a class="post-date" href="<?php the_permalink(); ?>">
                                    <!-- 02 Jan - 03 Feb -->
                                <?php echo $date_uchlimerick_post_show_start_date. ' - ' . $date_uchlimerick_post_show_end_date; ?>
                                </a>
                                <div class="btn-wrapper book-btn-cover">
                                    <a href="<?php if ($uchlimerick_post_show_book_ticket_link) { echo $uchlimerick_post_show_book_ticket_link['url']; }  ?>" target="<?php if ($uchlimerick_post_show_book_ticket_link) { echo $uchlimerick_post_show_book_ticket_link['target']; }  ?>"  class="button button-dark">Book Tickets</a>                                    
                                    <a href="<?php the_permalink(); ?>" class="button-light button">Learn More</a>
                                </div>
                            </div>
                        </div>                           
                    </div> 
                <?php $i++; ?>                
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
                <!-- <div class="col-md-8 order-md-1 order-2">
                    <div class="post-card">
                        <div class="post-image">
                            <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Rectangle-1089-2.png" alt="">
                        </div>
                        <div class="post-details">
                            <h6 class="text-border-bottom">Concert or Event Title comes here and can go over two lines and this is the second line right here</h6>
                            <a class="post-date" href="#">02 Jan - 03 Feb</a>
                            <div class="btn-wrapper book-btn-cover">
                                <a href="#" class="button button-dark">Book Tickets</a>
                                <a href="#" class="button-light button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 order-md-2 order-1">
                    <div class="post-card">
                        <div class="post-image">
                            <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Rectangle-1088-5.png" alt="">
                        </div>
                        <div class="post-details">
                            <h6 class="text-border-bottom">Concert or Event Title comes here and can go over two lines and this is the second line right here</h6>
                            <a class="post-date" href="#">02 Jan - 03 Feb</a>
                            <div class="btn-wrapper book-btn-cover">
                                <a href="#" class="button button-dark">Book Tickets</a>
                                <a href="#" class="button-light button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 order-md-6 order-6">
                    <div class="post-card">
                        <div class="post-image">
                            <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Rectangle-1088-2.png" alt="">
                        </div>
                        <div class="post-details">
                            <h6 class="text-border-bottom">Concert or Event Title comes here and can go over two lines and this is the second line right here</h6>
                            <a class="post-date" href="#">02 Jan - 03 Feb</a>
                            <div class="btn-wrapper book-btn-cover">
                                <a href="#" class="button button-dark">Book Tickets</a>
                                <a href="#" class="button-light button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 order-md-7 order-7">
                    <div class="post-card">
                        <div class="post-image">
                            <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Rectangle-1089.png" alt="">
                        </div>
                        <div class="post-details">
                            <h6 class="text-border-bottom">Concert or Event Title comes here and can go over two lines and this is the second line right here</h6>
                            <a class="post-date" href="#">02 Jan - 03 Feb</a>
                            <div class="btn-wrapper book-btn-cover">
                                <a href="#" class="button button-dark">Book Tickets</a>
                                <a href="#" class="button-light button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <a href="#" class="button button-dark text-center w-100 mt-1 d-md-none whats-on-btn">See All Events</a>
        </div>
        
   </div>
</section>