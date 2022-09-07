<?php $highlights_title = get_field('highlights_title', 'option'); ?>
<section class="highlights highlights-patten">
   <div class="text-border-left">
      <div class="container-inner">
         <div class="highlight-title-text">
            <h3 class=""><?php echo $highlights_title; ?></h3>
         </div>
      </div>
   </div>
   <div class="car-wrappper">
      <div class="main-car">
         <div class="page-wrapper">           
            <?php
               $i=1;
                  $select_shows_to_display = get_field('select_shows_to_display', 'option');
                
                  $show_id_arr = array();
                  $show_id_arr = $select_shows_to_display;
               //    echo "<pre>";
               //    print_r($select_shows_to_display);
               //    echo "</pre>";                  
               //    die('show_ids');                  
                  $the_query = new WP_Query( [
                  'post_type'      => 'show',
                  // 'taxonomy' => 'whats-on',
                  'post_status'    => 'publish',
                  'posts_per_page' => 5,
                  'post__in' =>  $show_id_arr ,
               ] );

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
                        $class_add = '';
                        if( $i == 1 ){
                              $class_add = 'active';
                          }elseif( $i == 3 ){
                              $class_add = 'section-two';
                          }elseif($i == 4){
                          $class_add = 'section-three';
                          }elseif($i == 5){
                          $class_add = 'section-four';
                          }                        
                        ?>
                        <div class="section <?php echo $class_add;?>" data-href="<?php the_permalink(); ?>">
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
                           <img src="<?php echo $url ?>" alt="image" class="img-100"/>                  
                           <div class="highlight">
                              <div class="highlight-text">
                                 <h6 class="highlight-title text-border-bottom"><?php the_title(); ?></h6>
                                 <div class="date-info">
                                    <?php if ($show_date != ' ') {
                                       echo '<p>'.$show_date.'</p>';
                                    } 
                                    else {
                                       echo '<p>'.$date_uchlimerick_post_show_start_date.'</p>';
                                    }
                                    ?>
                                    <a href="<?php the_permalink(); ?>" target="" class="more-info">More Info</a>
                                 </div>
                              </div>
                           </div>
                        </div> 
                        <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
         </div>
      </div>
   </div> 
</section>