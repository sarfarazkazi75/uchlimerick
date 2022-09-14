<?php /*Template Name: What’s-On */
get_header();
?>
    <section class="whats-on-section">
        <div class="container-inner">
            <div class="nav-border text-border-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="whats-on-had">
                            <h4>WHAT’S ON</h4>
                        </div>
                    </div>
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-9 text-end">
                            <div class="whats-on-nav">
                                <div class="nav-row">
                                    <div class="nav-select-cover">
                                        <form action="<?php echo home_url( '/whats-on#filter' ); ?>" method="GET" id="filter">
											<?php
											
											if ( $terms = get_terms( [ 'taxonomy' => 'genre', 'orderby' => 'name' ] ) ) :
												echo '<div class="nav-select">';
												echo '<select name="genrefilter" id="genrefilter" onchange="this.form.submit()">';
												echo '<option class="gen_option" value="">Genre</option>';
												foreach ( $terms as $term ) :
													?>
                                                    <option class="gen_option" value="<?php echo $term->term_id; ?>" <?php selected( isset( $_REQUEST['genrefilter'] ) ? $_REQUEST['genrefilter'] : '',
														$term->term_id ); ?>><?php echo ucwords($term->name); ?></option>
												<?php
												endforeach;
												echo '</select>';
												echo '<select id="select_gen_width">';
												echo '<option id="option_gen_width"></option>';
												echo '</select>';
												echo '</div>';
												?>
											<?php
											endif;
											
											$months = get_terms( [
												'taxonomy' => 'month',
												'order' => 'ASC',
												'hide_empty' => true,
												'meta_key'   => 'menu_order',
												'orderby'    => 'meta_value_num'
											] );
											$list_months = wp_list_pluck($months,'slug');
											
											
											$date = date("Y-m-01");
											$newdate = date('Y-m-d',strtotime ( '+12 month' , strtotime ( $date ) )) ;
											
											$start    = new DateTime($date);
											
											$end      = new DateTime($newdate);
											
											$interval = DateInterval::createFromDateString('1 month');
											$period   = new DatePeriod($start, $interval, $end);
											echo '<div class="nav-select">';
											echo '<select name="monthfilter" id="monthfilter" onchange="this.form.submit()">';
											echo '<option value="">Search Month</option>';
											foreach ($period as $dt) {
											    $month = strtolower($dt->format("F"));
											    if(!in_array($month,$list_months)){
											        continue;
                                                }
												$month_yr = $dt->format("F Y");
												$month_yr_val = strtolower($dt->format("F-Y"));
												?>
                                                <option value="<?php echo $month_yr_val ?>" <?php selected( isset( $_REQUEST['filter_by'] ) ? $_REQUEST['filter_by'] : '',													$month_yr_val ); ?>><?php echo $month_yr; ?></option>
												<?php
											}
											echo '</select>';
											echo '</div>';
											/*
											
											if ( $terms = get_terms( [
											    'taxonomy' => 'month',
                                                'order' => 'ASC',
											    'hide_empty' => true,
											    'meta_key'   => 'menu_order',
											    'orderby'    => 'meta_value_num'
                                                ] ) ) :
												echo '<div class="nav-select">';
												echo '<select name="monthfilter" id="monthfilter" onchange="this.form.submit()">';
												echo '<option value="">Month</option>';
												foreach ( $terms as $term ) :
													?>
                                                    <option value="<?php echo $term->slug; ?>" <?php selected( isset( $_REQUEST['monthfilter'] ) ? $_REQUEST['monthfilter'] : '',
														$term->slug); ?>><?php echo ucwords($term->name); ?></option>
												<?php
												endforeach;
												echo '</select>';
												echo '<select id="select_months_width">';
												echo '<option id="option_months_width"></option>';
												echo '</select>';
												echo '</div>';
												?>
											<?php
											endif;
											
											if ( $terms = get_terms( [
											    'taxonomy' => 'years', 'order' => 'ASC',
											    'hide_empty' => false,
                                                ] ) ) :
												echo '<div class="nav-select">';
												echo '<select name="year_filter" id="year_filter" onchange="this.form.submit()">';
												echo '<option value="">Year</option>';
												foreach ( $terms as $term ) :
													?>
                                                    <option value="<?php echo $term->slug; ?>" <?php selected( isset( $_REQUEST['year_filter'] ) ? $_REQUEST['year_filter'] : '',
														$term->slug ); ?>><?php echo ucwords($term->name); ?></option>
												<?php
												endforeach;
												echo '</select>';
												echo '<select id="select_months_width">';
												echo '<option id="option_months_width"></option>';
												echo '</select>';
												echo '</div>';
												?>
											<?php
											endif;
											*/
											?>
                                        </form>
                                    </div>
                                    <div class="nav-search">
                                        <form class="example">
                                            <input type="text" name="keyword" id="keyword" placeholder="Search" value="<?php echo isset($_REQUEST['search'])?$_REQUEST['search']:''; ?>"></input>
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
					$temp                        = $wp_query;
					$donate_category             = get_term_by( 'slug', 'donate', 'show_cat' );
					$donate_category_id          = $donate_category->term_id;
					$become_a_friend_category    = get_term_by( 'slug', 'become_a_friend', 'show_cat' );
					$become_a_friend_category_id = $become_a_friend_category->term_id;
					
					$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
					$args  = [
						'post_type'      => 'show',
						'post_status'    => 'publish',
						'paged'          => $paged,
						'meta_key'   => 'eventDateTime',
                        'orderby'    => 'meta_value_num',
						'order'          => 'ASC',
						's'=>isset($_REQUEST['search'])?$_REQUEST['search']:'',
						'posts_per_page' => 12,
    						'tax_query'      => [
							[
								'taxonomy' => 'show_cat',
								'field'    => 'slug',
								'terms'    => [ 'donate', 'become_a_friend' ], // exclude items media items in the news-cat custom taxonomy
								'operator' => 'NOT IN',
							],
						],
					];
					if ( isset( $_REQUEST['genrefilter'] ) ) {
						$gen_cat_id        = $_REQUEST['genrefilter'] ?? NULL;
						$gift_idea_cat_id  = $_REQUEST['gift_ideafilter'] ?? NULL;
						$month_cat_id      = $_REQUEST['monthfilter'] ?? NULL;
						$year_cat_id      = $_REQUEST['year_filter'] ?? NULL;
						$taxquery          = [
							'relation' => 'AND',
						];
						$args['tax_query'] = $taxquery;
						if(!empty($gen_cat_id)){
						 
							$args['tax_query'][] =[
								'taxonomy' => 'genre',
								'field'    => 'id',
								'terms'    => $gen_cat_id,
								'operator' => $gen_cat_id ? 'IN' : 'NOT IN',
							];
                        }
						if(!empty($month_cat_id) ){
							$args[ 'meta_query' ] = array(
								array(
									'key'     => 'event_month_years',
									'value'   => sprintf(':"%s";', $month_cat_id),
									'compare'   => 'LIKE',
								)
							);
                        }
						/*
						else{
							if(!empty($month_cat_id)){
								$args['tax_query'][]= [
									'taxonomy' => 'month',
									'field'    => 'slug',
									'order'    => 'ASC',
									'terms'    => $month_cat_id,
									'operator' => $month_cat_id ? 'IN' : 'NOT IN',
								];
							}
							
							if(!empty($year_cat_id)){
								
								$args['tax_query'][]= [
									'taxonomy' => 'years',
									'field'    => 'slug',
									'order'    => 'ASC',
									'terms'    => $year_cat_id,
									'operator' => $year_cat_id ? 'IN' : 'NOT IN',
								];
							}
                        }
						
						*/
						/*
						
						*/
					}
//					dd($args);
					$wp_query = new WP_Query( $args );
					$count    = $GLOBALS['wp_query']->post_count;
					$i        = 0;
					
					// $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
     
					$classes = [ 'col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4' ];
					if ( $wp_query->have_posts() ) {
						while ( $wp_query->have_posts() ) :
							$wp_query->the_post();
							global $post;
							$inner_class                           = '';
							$uchlimerick_post_show_start_date      = get_field( "uchlimerick_post_show_start_date" );
							$date_uchlimerick_post_show_start_date = date( "j M", strtotime( $uchlimerick_post_show_start_date ) );
							
							$uchlimerick_post_show_end_date         = get_field( "uchlimerick_post_show_end_date" );
							$date_uchlimerick_post_show_end_date    = date( "j M", strtotime( $uchlimerick_post_show_end_date ) );
							$uchlimerick_post_show_book_ticket_link = get_field( "uchlimerick_post_show_book_ticket_link" );
							$show_date                              = '';
							$events                                 = get_post_meta( $post->ID, 'events', true );
							$price_obj                              = $event_prices = [];
							if ( $events ) {
								$event = isset( $events[0] ) ? $events[0] : [];
								if ( $event ) {
									$event_id      = $event['ID'];
									$transient_key = $event_id . '_' . $post->ID;
									if ( empty( get_transient( $transient_key ) ) ) {
										$import_property_url = 'https://uch.ticketsolve.com/shows/1173630311/events/' . $event_id . '.xml';
										$response            = wp_remote_get( $import_property_url );
										$body                = wp_remote_retrieve_body( $response );
										$xml                 = new SimpleXMLElement( $body, LIBXML_NOCDATA );
										$json                = json_encode( $xml );
										$eventObj            = json_decode( $json, true );
										set_transient( $transient_key, $eventObj, HOUR_IN_SECONDS );
									}
									$eventObj    = get_transient( $transient_key );
									$show_date   = date( 'd M, Y', strtotime( $eventObj['date_time'] ) );
									$book_ticket = $eventObj['url'];
								}
                                if(sizeof($events) <= 1){
                                    $book_ticket = $events[0]['url'];
                                    $booking_link = 1;
                                }
							}
							/*
							if ( $i == 2 ) {
								$inner_class      = 'donate-cover bg-gold';
								$donate_post_data = new WP_Query( [
									'post_type'      => 'show',   // custom post type
									'posts_per_page' => 1,
									'tax_query'      => [
										[
											'taxonomy' => 'show_cat',
											'field'    => 'id',
											'terms'    => $donate_category_id,
										],
									],
								] );
								if ( $donate_post_data->have_posts() ):
									while ( $donate_post_data->have_posts() ): $donate_post_data->the_post();
										?>
                                        <div class="show_single_wrap donate_div <?php echo $classes[ $i % 12 ]; ?>" data-href="<?php the_permalink(); ?>">
                                            <div class="<?php echo $inner_class; ?>">
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
                                                    <h4 class="text-border-bottom"><a href="<?php the_permalink(); ?>" style="color: #fff"><?php echo the_title(); ?></a></h4>
                                                    <p><?php the_content(); ?></p>
                                                    <a class="post-date arrwo-has-link" href="<?php the_permalink(); ?>" target="blank">Read more</a>
                                                </div>
                                            </div>
                                        </div>
									<?php
									endwhile;
								endif;
								?>
							<?php }
							elseif ( $i == 9 ) {
								$inner_class               = 'donate-cover Become-friend-cover bg-light-gray';
								$become_a_friend_post_data = new WP_Query( [
									'post_type'      => 'show',
									'posts_per_page' => 1,
									'tax_query'      => [
										[
											'taxonomy' => 'show_cat',
											'field'    => 'id',
											'terms'    => $become_a_friend_category_id,
										],
									],
								] );
								if ( $become_a_friend_post_data->have_posts() ):
									while ( $become_a_friend_post_data->have_posts() ): $become_a_friend_post_data->the_post();
										?>
                                        <div class="show_single_wrap bocome_a_fiend_div <?php echo $classes[ $i % 12 ]; ?>" data-href="<?php the_permalink(); ?>">
                                            <div class="<?php echo $inner_class; ?>">
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
                                                    <h4 class="text-border-bottom"><a href="<?php the_permalink(); ?>" style="color: #fff"><?php echo the_title(); ?></a></h4>
                                                    <p><?php the_content(); ?></p>
                                                    <a class="post-date arrwo-has-link" href="<?php the_permalink(); ?>" target="blank">Read more</a>
                                                </div>
                                            </div>
                                        </div>
									<?php
									endwhile;
								endif;
								?>
							<?php }
							*/
//							else {
								$inner_class = 'post-card';
								$title       = '<h6 class="text-border-bottom">' . get_the_title() . '</h6>';
								$permalink   = get_permalink(); ?>
                                <div class="show_single_wrap test_from_whatson_template <?php echo $classes[ $i % 12 ]; ?>">
                                    <div class="<?php echo $inner_class; ?>">
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
                                            <a href="<?php echo $permalink; ?>" style="color: #fff"><?php echo $title; ?></a> <a class="post-date" href="<?php echo $permalink; ?>">
												<?php if ( $show_date != ' ' ) {
													echo '<p>' . $show_date . '</p>';
												} else {
													echo '<p>' . $date_uchlimerick_post_show_start_date . '</p>';
												}
												?>
                                            </a>
                                        </div>
										<div class="btn-wrapper book-btn-cover">
											<?php
											if ( isset( $book_ticket ) ) {
												?>
												<a href="<?php echo $book_ticket; ?>" class="button button-dark"><?php _e( "Book Tickets", 'uchlimerick' ) ?></a>
												<a href="<?php echo $permalink; ?>" class="button button-light"><?php _e( "Learn More", 'uchlimerick' ) ?></a>
												<?php
											} else {
												?>
												<a href="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
													echo $uchlimerick_post_show_book_ticket_link['url'];
												} ?>" target="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
													echo $uchlimerick_post_show_book_ticket_link['target'];
												} ?>" class="button button-dark">Book Tickets</a> <a href="<?php echo $permalink; ?>" class="button-light button">Learn More</a>
												<?php
											}
											?>
										</div>
                                    </div>
                                </div>
							<?php //}
							?>
							<?php $i ++; ?>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
						<?php $wp_query = NULL;
						$wp_query       = $temp; ?>
					<?php } else {
						echo "<h2>" . "No Matching Selections Found" . "</h2>";
					} ?>
                
                </div>
				<?php if ( $i >= 10 ) { ?>
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
				
				<?php if ( have_rows( 'card_list' ) ):
					$temp = 1; ?>
					<?php while ( have_rows( 'card_list' ) ): the_row();
					// echo get_row_index();
					$card_image   = get_sub_field( 'card_image' );
					$card_title   = get_sub_field( 'card_title' );
					$card_content = get_sub_field( 'card_content' );
					$card_link    = get_sub_field( 'card_link' );
					$class_add    = '';
					if ( $temp % 2 == 0 ) {
						$class_add = 'col-md-5';
					} else {
						$class_add = 'col-md-7';
					}
					$temp ++;
					?>
                    <div class="<?php echo $class_add; ?>" data-aos="fade-up">
                        <div class="visit-card">
                            <img src="<?php echo $card_image['url']; ?>" alt="">
                            <div class="visit-details">
                                <h4 class="text-border-bottom"><?php echo $card_title; ?></h4>
								<?php echo $card_content; ?>
                                <a href="<?php echo $card_link['url']; ?>" target="<?php echo $card_link['target']; ?>" class="button-light button"><?php echo $card_link['title']; ?></a>
                            </div>
                        </div>
                    </div>
				
				<?php endwhile; ?>
				<?php endif; ?>
            </div>
        </div>
    </section>


<?php get_template_part( 'template-parts/flex', 'newsletter_section' ); ?>


<?php
get_footer();

?>