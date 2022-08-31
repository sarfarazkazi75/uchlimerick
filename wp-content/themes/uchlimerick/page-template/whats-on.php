<?php /*Template Name: What’s-On */
   get_header();
?>
<section class="whats-on-section">
    <div class="container-inner">
        <div class="nav-border text-border-bottom">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="whats-on-had">
                        <h4>WHAT’S ON?</h4>
                    </div>
                </div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                 
                <div class="col-lg-9 text-end">
                    <div class="whats-on-nav">
                        <div class="nav-row">
                            <div class="nav-select-cover">
                                <form action="<?php echo home_url('/whats-on#filter'); ?>" method="GET" id="filter">
                                    <?php
                                        if( $terms = get_terms( array( 'taxonomy' => 'genre', 'orderby' => 'name' ) ) ) : 
                                        echo '<div class="nav-select">';
                                        echo '<select name="genrefilter" id="" onchange="this.form.submit()">';
                                        echo '<option value="">Genre</option>';
                                            foreach ( $terms as $term ) :                                        
                                                ?>
                                                <option value="<?php echo $term->term_id; ?>" <?php selected( isset($_REQUEST['genrefilter']) ? $_REQUEST['genrefilter'] : '', $term->term_id ); ?>><?php echo $term->name; ?></option>
                                                <?php
                                            endforeach;                        
                                            echo '</select>';
                                            echo '</div>';   
                                            ?>                                                                            
                                            <?php
                                        endif;
                                        
                                        /*if( $terms = get_terms( array( 'taxonomy' => 'gift_idea', 'orderby' => 'name' ) ) ) : 
                                        echo '<div class="nav-select">';
                                        echo '<select name="gift_ideafilter" id="" onchange="this.form.submit()">';
                                        echo '<option value="">Gift Idea</option>';
                                            foreach ( $terms as $term ) :                                        
                                                ?>
                                                <option value="<?php echo $term->term_id; ?>" <?php selected( isset($_REQUEST['gift_ideafilter']) ? $_REQUEST['gift_ideafilter'] : '', $term->term_id ); ?>><?php echo $term->name; ?></option>
                                                <?php
                                            endforeach;                        
                                            echo '</select>';
                                            echo '</div>';   
                                            ?>                                                                            
                                            <?php
                                        endif; */
                                        
                                        if( $terms = get_terms( array( 'taxonomy' => 'month', 'orderby' => 'name' ) ) ) : 
                                        echo '<div class="nav-select">';
                                        echo '<select name="monthfilter" id="" onchange="this.form.submit()">';
                                        echo '<option value="">Months</option>';
                                            foreach ( $terms as $term ) :                                        
                                                ?>
                                                <option value="<?php echo $term->term_id; ?>" <?php selected( isset($_REQUEST['monthfilter']) ? $_REQUEST['monthfilter'] : '', $term->term_id ); ?>><?php echo $term->name; ?></option>
                                                <?php
                                            endforeach;                        
                                            echo '</select>';
                                            echo '</div>';   
                                            ?>                                                                            
                                            <?php
                                        endif;                                         
                                                                 
                                    ?>  
                                </form>
                            </div>
                            <div class="nav-search">
                                <!-- <form class="example" action="/action_page.php">
                                    <input type="text" placeholder="Search" name="search2">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form> -->

                                <form class="example">
                                    <input type="text" name="keyword" id="keyword" placeholder="Search"></input>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <?php //the_title(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php //die('here_died'); ?>
            </div>
        </div>
    </div>
</section>

<section class="what-on-wrapper">
    <div class="container-inner">
        <div class="post-main-cover">
            <div class="row testing_class_1" id="show_content_wrap_full">

                        <?php 
                        global $wp_query;
                        $temp=$wp_query;
                        $do_not_duplicate = array();
                        $do_not_duplicate2[] = array();                        
                        $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
                        $args = array(
                            'post_type' => 'show',
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'posts_per_page' => 12,
                            'post__not_in' => array(1702, 1735),
                        );
                     if (isset($_REQUEST['genrefilter'])) {

                            $gen_cat_id = $_REQUEST['genrefilter'] ?? null;
                            $gift_idea_cat_id = $_REQUEST['gift_ideafilter'] ?? null;
                            $month_cat_id = $_REQUEST['monthfilter'] ?? null;
                            $taxquery = array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'genre',
                                    'field' => 'id',
                                    'terms' => $gen_cat_id,
                                    'operator' => $gen_cat_id ? 'IN' : 'NOT IN'
                                ),
                                // array(
                                // 'taxonomy' => 'gift_idea',
                                // 'field' => 'id',
                                // 'terms' => $gift_idea_cat_id,
                                // 'operator' => $gift_idea_cat_id ? 'IN' : 'NOT IN'
                                // ),
                                array(
                                'taxonomy' => 'month',
                                'field' => 'id',
                                'terms' => $month_cat_id,
                                'operator' => $month_cat_id ? 'IN' : 'NOT IN'
                                )                                
                            );
                            $args['tax_query'] = $taxquery ;

                            // echo '<pre>';
                            // print_r($args['tax_query']);
                            // echo '<pre>';
                            // die('here_DIED');
                        
                     }
                        $wp_query=new WP_Query( $args );
                        $count = $GLOBALS['wp_query']->post_count;
                        $i=0;
                        
                        // $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
                        $classes = array('col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4');
			            if ( $wp_query->have_posts() ){
                            while ( $wp_query->have_posts() ) :
                                $wp_query->the_post();   
                                global $post;
                                $inner_class ='';
                                $uchlimerick_post_show_start_date = get_field("uchlimerick_post_show_start_date");
                                $date_uchlimerick_post_show_start_date = date("j M", strtotime($uchlimerick_post_show_start_date));
            
                                $uchlimerick_post_show_end_date = get_field("uchlimerick_post_show_end_date");
                                $date_uchlimerick_post_show_end_date = date("j M", strtotime($uchlimerick_post_show_end_date));   
                                $uchlimerick_post_show_book_ticket_link = get_field("uchlimerick_post_show_book_ticket_link");
                                $show_date='';
                                $events    = get_post_meta( $post->ID, 'events', TRUE );
                                $price_obj = $event_prices = [];
                                if ( $events ) {
                                    $event = isset( $events[0] ) ? $events[0] : [];
                                    if ( $event ) {
                                        $event_id      = $event['ID'];
                                        $transient_key = $event_id . '_' . $post->ID;
                                        if(empty(get_transient($transient_key))){
                                            $import_property_url = 'https://uch.ticketsolve.com/shows/1173630311/events/' . $event_id . '.xml';
                                            $response            = wp_remote_get( $import_property_url );
                                            $body                = wp_remote_retrieve_body( $response );
                                            $xml = new SimpleXMLElement( $body, LIBXML_NOCDATA );
                                            $json = json_encode( $xml );
                                            $eventObj = json_decode( $json,TRUE );
                                            set_transient($transient_key,$eventObj,HOUR_IN_SECONDS);
                                        }
                                        $eventObj      = get_transient( $transient_key );
                                        $show_date     = date( 'd M', strtotime( $eventObj['date_time'] ) );
                                        $book_ticket = $eventObj['url'];
                                        
                                    }
                                }
                                if($i == 2){
                                    $inner_class='donate-cover bg-gold';
                                    $donate_post = get_post(1702);
                                    $title = '<h4 class="text-border-bottom">'.$donate_post->post_title.'</h4>';                                    
                                    $permalink = get_permalink($donate_post); 
                                    
                                    ?>
                                    <div class="show_single_wrap donate_div <?php echo $classes[$i%12]; ?>" data-href="<?php echo get_permalink($donate_post->ID); ?>">
                                        <div class="<?php echo $inner_class;?>">
                                            <div class="post-image">
                                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                                <?php
                                                $attachment_urls = get_post_meta( $post->ID, 'attachments_urls', TRUE );
                                                if(empty($url)){
	                                                if(isset($attachment_urls[0])){
		                                                $url = $attachment_urls[0];
	                                                }
	                                                else{
		                                                $url = get_template_directory_uri().'/assets/images/fallback-Image-2.png';
	                                                }
                                                }
                                                ?>
                                                <img src="<?php echo $url ?>" />
                                            </div>
                                            <div class="post-details">
                                                <h4 class="text-border-bottom"><a href="<?php echo get_permalink($donate_post->ID); ?>" style="color: #fff"><?php echo get_the_title($donate_post->ID); ?></a></h4>
                                                <p><?php echo get_post_field('post_content', $donate_post->ID); ?></p>
                                                <a class="post-date arrwo-has-link" href="<?php echo get_permalink($donate_post->ID); ?>" target="blank">Read more</a>
                                            </div>
                                        </div>                           
                                    </div>
                                <?php }elseif($i == 9){
                                   $inner_class='donate-cover Become-friend-cover bg-light-gray';
                                   $become_a_friend_post = get_post(1735);
                                   $title = '<h4 class="text-border-bottom">'.$become_a_friend_post->post_title.'</h4>';
                                   $permalink = get_permalink($become_a_friend_post); ?>
                                    <div class="show_single_wrap become_a_friend_div <?php echo $classes[$i%12]; ?>" data-href="<?php echo get_permalink(1735); ?>">                           
                                        <div class="<?php echo $inner_class;?>">
                                            <div class="post-image">
                                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                                <?php
                                                $attachment_urls = get_post_meta( $post->ID, 'attachments_urls', TRUE );
                                                if(empty($url)){
	                                                if(isset($attachment_urls[0])){
		                                                $url = $attachment_urls[0];
	                                                }
	                                                else{
		                                                $url = get_template_directory_uri().'/assets/images/fallback-Image-2.png';
	                                                }
                                                }
                                                ?>
                                                <img src="<?php echo $url ?>" />
                                            </div>
                                            <div class="post-details">                                                
                                                <h4 class="text-border-bottom"><a href="<?php echo get_permalink(1735); ?>" style="color: #fff"><?php echo get_the_title(1735); ?></a></h4>                                            
                                                <p><?php echo get_post_field('post_content', 1735); ?></p>
                                                <a class="post-date arrwo-has-link" href="<?php echo get_permalink(1735); ?>" target="blank">Read more</a>                                                                                                
                                            </div>
                                        </div>                           
                                    </div>
                                <?php }else{
                                   $inner_class='post-card';
                                   $title = '<h6 class="text-border-bottom">'.get_the_title().'</h6>';
                                   $permalink = get_permalink(); ?>
                                    <div class="show_single_wrap test_from_whatson_template <?php echo $classes[$i%12]; ?>">                           
                                        <div class="<?php echo $inner_class;?>">
                                            <div class="post-image">
                                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                                <?php
                                                $attachment_urls = get_post_meta( $post->ID, 'attachments_urls', TRUE );
                                                if(empty($url)){
	                                                if(isset($attachment_urls[0])){
		                                                $url = $attachment_urls[0];
	                                                }
	                                                else{
		                                                $url = get_template_directory_uri().'/assets/images/fallback-Image-2.png';
	                                                }
                                                }
                                                ?>
                                                <img src="<?php echo $url ?>" />
                                            </div>
                                            <div class="post-details">
                                            <a href="<?php echo $permalink; ?>" style="color: #fff"><?php echo $title; ?></a>
                                                <a class="post-date" href="<?php echo $permalink; ?>">
                                                    <!-- 05 Jan - 06 Feb -->
                                                    <?php //echo $date_uchlimerick_post_show_start_date. ' - ' . $date_uchlimerick_post_show_end_date; ?>
                                                    <?php //echo $show_date; ?>
                                                    <?php if ($show_date != ' ') {
                                                    echo '<p>'.$show_date.'</p>';
                                                    } 
                                                    else {
                                                    echo '<p>'.$date_uchlimerick_post_show_start_date.'</p>';
                                                    }
                                                    ?>                                                    
                                                </a>
                                                <div class="btn-wrapper book-btn-cover">
                                                <?php
                                                    if(isset($book_ticket)){
                                                        ?>
                                                        <a href="<?php echo $book_ticket; ?>" class="button button-dark"><?php _e("Book Tickets",'uchlimerick') ?></a>
                                                        <a href="<?php echo $permalink; ?>" class="button button-light"><?php _e("Learn More",'uchlimerick') ?></a>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <a href="<?php echo !empty($uchlimerick_post_show_book_ticket_link['url'])?$uchlimerick_post_show_book_ticket_link['url']:'#' ?>" target="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
                                                            echo $uchlimerick_post_show_book_ticket_link['target'];
                                                        } ?>" class="button button-dark">Book Tickets</a> <a href="<?php echo $permalink; ?>" class="button-light button">Learn More</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>                           
                                    </div>                                
                                <?php }

                                                          
                        ?>                         
  
                        
                        <?php $i++; ?>          
                        <?php endwhile; ?>       
						<?php wp_reset_query(); ?>        
                        <?php $wp_query=null; $wp_query=$temp; ?>    
                        <?php }
                        else {
                           echo "<h2>"."No Matching Selections Found"."</h2>";
                        } ?>

            </div>
            <?php if ($i >=10) { ?>
                <div class="load-more-btn text-center testing_class_3">
                    <a id="load_more" href="javascript:void(0);" class="button-light button">Load more</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="booking-info-section">
    <div class="container-inner">
        <div class="row">

            <?php if( have_rows('card_list') ):
                $temp = 1; ?>
                <?php while( have_rows('card_list') ): the_row();
                // echo get_row_index();
                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');    
                    $card_content = get_sub_field('card_content');
                    $card_link = get_sub_field('card_link');
                    $class_add = '';
                    if ($temp % 2 == 0) {
                        $class_add = 'col-md-5';
                    }
                    else {
                        $class_add = 'col-md-7';
                    }   
                    $temp++;                 
                  ?>
                   <div class="<?php echo $class_add;?>" data-aos="fade-up">
                     <div class="visit-card">
                        <img src="<?php echo $card_image['url'];?>" alt="">
                        <div class="visit-details">
                            <h4 class="text-border-bottom"><?php echo $card_title; ?></h4>
                            <?php echo $card_content; ?>
                            <a href="<?php echo $card_link['url'];?>" target="<?php echo $card_link['target'];?>" class="button-light button"><?php echo $card_link['title'];?></a>
                        </div>
                    </div>
                  </div>
              
                <?php endwhile; ?>
            <?php endif; ?>             
        </div>
    </div>
</section>


<?php get_template_part( 'template-parts/flex', 'newsletter_section' );  ?>


<?php
get_footer();

?>