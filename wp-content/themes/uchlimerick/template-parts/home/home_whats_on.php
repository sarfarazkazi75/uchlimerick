<?php
    $home_whats_on_sec_ticket_book   = get_field( "home_whats_on_sec_ticket_book" );
    $home_whats_on_sec_see_all_events = get_field("home_whats_on_sec_see_all_events" );
    
?>
<section class="whats-on homepage">
    <div class="container-inner">
        <div class="section-title text-border-bottom">
            <h3 class="">What's On?</h3>
            <div class="">
                <?php if($home_whats_on_sec_ticket_book != ""): ?><a href="<?php echo $home_whats_on_sec_ticket_book['url']; ?>" target="<?php echo $home_whats_on_sec_ticket_book['target'];?>" class="button button-dark d-none d-md-block"><?php echo $home_whats_on_sec_ticket_book['title'];?></a><?php endif; ?>
            </div>
        </div>
        <div class="post-main-cover">
            <div class="row">
                <?php
                // the query
                $the_query = new WP_Query( [
                    'post_type'      => 'show',
                    // 'taxonomy' => 'whats-on',
                    'post_status'    => 'publish',
                    'posts_per_page' => 5,
                    'post__not_in' => array(1702,1735),
                ] );
                $show_date='';
                $i       = 0;
                $classes = [
                    'col-md-8 order-md-1 order-2',
                    'col-md-4 order-md-2 order-1',
                    'col-md-4 order-md-3 order-4',
                    'col-md-4 order-md-4 order-3',
                    'col-md-4 order-md-5 order-5',
                    'col-md-4 order-md-6 order-6',
                    'col-md-8 order-md-7 order-7',
                    'col-md-4 order-md-8 order-9',
                    'col-md-4 order-md-9 order-10',
                    'col-md-4 order-md-10 order-8',
                    'col-md-8 order-md-11 order-11',
                    'col-md-4 order-md-12 d-md-block d-none order-12',
                ];
                ?>
                
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php
                        global $post;
                        $uchlimerick_post_show_start_date      = get_field( "uchlimerick_post_show_start_date" );
                        $date_uchlimerick_post_show_start_date = date( "j M", strtotime( $uchlimerick_post_show_start_date ) );
                        
                        $uchlimerick_post_show_end_date      = get_field( "uchlimerick_post_show_end_date" );
                        $date_uchlimerick_post_show_end_date = date( "j M", strtotime( $uchlimerick_post_show_end_date ) );
                        
                        $uchlimerick_post_show_book_ticket_link = get_field( "uchlimerick_post_show_book_ticket_link" );
                        
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
                        
                        ?>
                        <div class="show_single_wrap <?php echo $classes[ $i % 12 ]; ?>">
                            <div class="post-card">
                                <div class="post-image">
                                    
                                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
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
                                    <img src="<?php echo $url ?>"/>
                                </div>
                                <div class="post-details">
                                    <h6 class="text-border-bottom"><a href="<?php the_permalink(); ?>" style="color: #fff"><?php the_title(); ?></a></h6>
                                    <a class="post-date" href="<?php the_permalink(); ?>">
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
                                            <a href="<?php the_permalink(); ?>" class="button button-light"><?php _e("More Info",'uchlimerick') ?></a>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <a href="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
                                                echo $uchlimerick_post_show_book_ticket_link['url'];
                                            } ?>" target="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
                                                echo $uchlimerick_post_show_book_ticket_link['target'];
                                            } ?>" class="button button-dark">Book Tickets</a> <a href="<?php the_permalink(); ?>" class="button-light button">More Info</a>
                                            <?php
                                        }
                                        ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i ++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                
            </div>
            <?php if($home_whats_on_sec_see_all_events != ""): ?><a href="<?php echo $home_whats_on_sec_see_all_events['url']; ?>" target="<?php echo $home_whats_on_sec_see_all_events['target']; ?>" class="button button-dark text-center w-100 mt-1 d-md-none whats-on-btn"><?php echo $home_whats_on_sec_see_all_events['title']; ?></a><?php endif; ?>
        </div>
    
    </div>
</section>