<?php

require get_template_directory() . '/inc/custom-posttype.php';

if ( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page( [
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-general-options',
		'capability' => 'edit_posts',
		'redirect'   => false,
	] );
	
	acf_add_options_sub_page( [
		'page_title'  => 'Header Options',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-general-options',
	] );
	
	acf_add_options_sub_page( [
		'page_title'  => 'Footer Options',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-options',
	] );
	
}

/*remove the span wrapper in Contact Form 7*/
add_filter( 'wpcf7_form_elements', function ( $content ) {
	$content = preg_replace( '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content );
	
	$content = str_replace( '<br />', '', $content );
	
	return $content;
	
} );

/*Remove p Tag From Contact Form 7*/
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// AJAX URL DEFINING
add_action( 'wp_head', 'ajaxurl' );
function ajaxurl() {
	?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
    </script>
	<?php
}


function load_more_shows() {
	$count = $_POST["count"];
	
	$cpt   = 1;
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	$args  = [
		'posts_per_page' => - 1,
		'post_type'      => 'show', // change the post type if you use a custom post type
		'paged'          => $paged,
		'post_status'    => 'publish',
		'meta_key'   => 'eventDateTime',
		'orderby'    => 'meta_value_num',
		'order'          => 'ASC',
	];
	
	$articles = new WP_Query( $args );
	
	$ar_posts = [];
	$i        = 1;
	$a        = '';
	// $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
	$classes = [
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-4',
		'col-md-8',
		'col-md-4',
		'col-md-4',
		'col-md-4',
	];
	
	if ( $articles->have_posts() ) {
		while ( $articles->have_posts() ) {
			$articles->the_post();
			if ( $i == 1 || $i == 7 || $i == 11 || $i == 17 || $i == 21 || $i == 27 || $i == 31 || $i == 37 || $i == 41 || $i == 47 || $i == 51 || $i == 57 || $i == 61 || $i == 67 || $i == 71
			     || $i == 77
			     || $i == 81
			     || $i == 87
			     || $i == 91
			     || $i == 97
			     || $i == 101
			     || $i == 107
			) {
				$class = 'col-md-8';
			} else {
				$class = 'col-md-4';
			}
			global $post;
			$uchlimerick_post_show_start_date      = get_field( "uchlimerick_post_show_start_date" );
			$date_uchlimerick_post_show_start_date = date( "j M", strtotime( $uchlimerick_post_show_start_date ) );
			
			$uchlimerick_post_show_end_date      = get_field( "uchlimerick_post_show_end_date" );
			$date_uchlimerick_post_show_end_date = date( "j M", strtotime( $uchlimerick_post_show_end_date ) );
			
			$uchlimerick_post_show_book_ticket_link = get_field( "uchlimerick_post_show_book_ticket_link" );
			
			$events    = get_post_meta( $post->ID, 'events', true );
			$price_obj = $event_prices = [];
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
			}
			
			$more_posts = "";
			
			if ( $cpt > $count && $cpt < $count + 14 ) {
				
				$more_posts .= '<div class="show_single_wrap load_more_dd_functions ' . $class . '">';
				$more_posts .= '<div class="post-card">';
				$more_posts .= '<div class="post-image">';
				
				
				$url             = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				$attachment_urls = get_post_meta( $post->ID, 'attachments_urls', true );
				
				if ( empty( $url ) ) {
					if ( isset( $attachment_urls[0] ) ) {
						$url = $attachment_urls[0];
					} else {
						$url = get_template_directory_uri() . '/assets/images/fallback-Image-2.png';
					}
				}
				
				$more_posts .= '<img src="' . $url . '"/>';
				$more_posts .= '</div>';
				$more_posts .= '<div class="post-details">';
				$more_posts .= '<a href="' . get_the_permalink() . '" style="color: #fff"><h6 class="text-border-bottom">' . get_the_title() . '</h6></a>';
				$more_posts .= '<a class="post-date" href="' . get_the_permalink() . '"><p>';
				$more_posts .= $show_date;
				$more_posts .= '</p></a>';
				
				$more_posts .= '</div>';
				$more_posts .= '<div class="btn-wrapper book-btn-cover">';
				if ( isset( $book_ticket ) ) {
					
					$more_posts .= '<a href="' . $book_ticket . '" class="button button-dark">Book Tickets</a>';
					$more_posts .= '<a href="' . get_the_permalink() . '" class="button button-light">Learn More</a>';
					
				} else {
					
					if ( $uchlimerick_post_show_book_ticket_link ) {
						
						$more_posts .= '<a href="' . $uchlimerick_post_show_book_ticket_link['url'] . '" target="' . $uchlimerick_post_show_book_ticket_link['target']
						               . '" class="button button-dark">Book Tickets</a>';
						
						$more_posts .= '<a href="' . get_the_permalink() . '" class="button-light button">Learn More</a>';
						
					}
					
				}
				
				
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				
				$ar_posts[] = $more_posts;
				
				if ( $cpt == $articles->found_posts ) {
					$ar_posts[] = "0";
				}
			}
			$cpt ++;
			$i ++;
		}
	}
	echo json_encode( $ar_posts );
	die();
}

add_action( 'wp_ajax_load_more_shows', 'load_more_shows' );
add_action( 'wp_ajax_nopriv_load_more_shows', 'load_more_shows' );

function load_more_blog_posts() {
	$count = $_POST["count"];
	
	$cpt = 1;
	
	$args = [
		'posts_per_page' => - 1,
		'post_type'      => 'post', // change the post type if you use a custom post type
		'post_status'    => 'publish',
	];
	
	$articles = new WP_Query( $args );
	
	$ar_posts = [];
	
	if ( $articles->have_posts() ) {
		$i         = 1;
		$temp_data = 1;
		while ( $articles->have_posts() ) {
			$articles->the_post();
			$class         = '';
			$inner_class   = '';
			$col_8_content = '';
			if ( $temp_data == 1 || $temp_data == 7 ) {
				$class         = 'col-md-8';
				$col_8_content = '
                    <div class="row">
                         <div class="col-md-6">
                             <h6 class="text-border-bottom">' . get_the_title() . '</h6>
                        </div>
                        <div class="col-md-6">
                        ' . get_the_content() . '
                            
                            <a class="post-date arrwo-has-link" href="' . get_permalink() . '" target="blank">Read more</a>
                        </div>
                    </div>';
				$temp_data ++;
			} else {
				$class         = 'col-md-4';
				$col_8_content = '
                    <h4 class="text-border-bottom">' . get_the_title() . '</h4>
                    ' . get_the_content() . '
                    <a class="post-date arrwo-has-link" href="' . get_permalink() . '" target="blank">Read more</a>';
				if ( $temp_data == 10 ) {
					$temp_data = 0;
				}
				$temp_data ++;
			}
			if ( $i == 3 ) {
				$inner_class = 'donate-cover bg-gold';
			} elseif ( $i == 10 ) {
				$inner_class = 'donate-cover Become-friend-cover bg-light-gray';
			} else {
				$inner_class = 'post-card';
			}
			$more_posts = "";
			
			if ( $cpt > $count && $cpt < $count + 10 ) {
				
				$more_posts      .= '<div class="' . $class . '">';
				$more_posts      .= '<div class="' . $inner_class . '">';
				$more_posts      .= '<div class="post-image">';
				$url             = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'full' );
				$attachment_urls = get_post_meta( $post->ID, 'attachments_urls', true );
				
				if ( empty( $url ) ) {
					if ( isset( $attachment_urls[0] ) ) {
						$url = $attachment_urls[0];
					} else {
						$url = get_template_directory_uri() . '/assets/images/fallback-Image-2.png';
					}
				}
				$more_posts .= '<img src="' . $url . '" />';
				// $more_posts .= the_post_thumbnail();
				$more_posts .= '</div>';
				$more_posts .= '<div class="post-details">';
				$more_posts .= $col_8_content;
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				
				
				$ar_posts[] = $more_posts;
				
				if ( $cpt == $articles->found_posts ) {
					$ar_posts[] = "0";
				}
			}
			$cpt ++;
			$i ++;
		}
	}
	echo json_encode( $ar_posts );
	die();
}

add_action( 'wp_ajax_load_more_blog_posts', 'load_more_blog_posts' );
add_action( 'wp_ajax_nopriv_load_more_blog_posts', 'load_more_blog_posts' );

function load_more_project_posts() {
	$count = $_POST["count"];
	
	$cpt   = 1;
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	$args  = [
		'posts_per_page' => - 1,
		'post_type'      => 'project', // change the post type if you use a custom post type
		'paged'          => $paged,
		'post_status'    => 'publish',
	];
	
	$articles = new WP_Query( $args );
	
	$ar_posts = [];
	
	if ( $articles->have_posts() ) {
		$i         = 1;
		$temp_data = 1;
		while ( $articles->have_posts() ) {
			$articles->the_post();
			
			$more_posts = "";
			if ( $cpt > $count && $cpt < $count + 10 ) {
				$class         = '';
				$inner_class   = '';
				$col_8_content = '';
				if ( $temp_data == 1 || $temp_data == 7 ) {
					$class         = 'col-md-8';
					$col_8_content = '
                    <div class="row">
                         <div class="col-md-6">
                             <h6 class="text-border-bottom">' . get_the_title() . '</h6>
                        </div>
                        <div class="col-md-6">
                        ' . get_the_content() . '
                            
                            <a class="post-date arrwo-has-link" href="' . get_permalink() . '" target="blank">Read more</a>
                        </div>
                    </div>';
					$temp_data ++;
				} else {
					$class         = 'col-md-4';
					$col_8_content = '
                    <h4 class="text-border-bottom">' . get_the_title() . '</h4>
                    ' . get_the_content() . '
                    <a class="post-date arrwo-has-link" href="' . get_permalink() . '" target="blank">Read more</a>';
					if ( $temp_data == 10 ) {
						$temp_data = 0;
					}
					$temp_data ++;
				}
				if ( $i == 3 ) {
					$inner_class = 'donate-cover bg-gold';
				} elseif ( $i == 10 ) {
					$inner_class = 'donate-cover Become-friend-cover bg-light-gray';
				} else {
					$inner_class = 'post-card';
				}
				
				
				$more_posts      .= '<div class="project_single_wrap ' . $class . '">';
				$more_posts      .= '<div class="' . $inner_class . '">';
				$more_posts      .= '<div class="post-image">';
				$url             = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'full' );
				$attachment_urls = get_post_meta( $post->ID, 'attachments_urls', true );
				
				if ( empty( $url ) ) {
					if ( isset( $attachment_urls[0] ) ) {
						$url = $attachment_urls[0];
					} else {
						$url = get_template_directory_uri() . '/assets/images/fallback-Image-2.png';
					}
				}
				$more_posts .= '<img src="' . $url . '" />';
				$more_posts .= '</div>';
				$more_posts .= '<div class="post-details">';
				$more_posts .= $col_8_content;
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				$more_posts .= '</div>';
				
				
				$ar_posts[] = $more_posts;
				
				if ( $cpt == $articles->found_posts ) {
					$ar_posts[] = "0";
				}
			}
			$cpt ++;
			$i ++;
		}
	}
	echo json_encode( $ar_posts );
	die();
}

add_action( 'wp_ajax_load_more_project_posts', 'load_more_project_posts' );
add_action( 'wp_ajax_nopriv_load_more_project_posts', 'load_more_project_posts' );


// the ajax function
add_action( 'wp_ajax_data_fetch', 'data_fetch' );
add_action( 'wp_ajax_nopriv_data_fetch', 'data_fetch' );
function data_fetch() {
	$i = 0;
	// $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
	$classes   = [ 'col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-8', 'col-md-4' ];
	if($_POST['keyword'] != ""){
	$the_query = new WP_Query( [ 'posts_per_page' => 12, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'show',/*'meta_key'   => 'eventDateTime',
                        'orderby'    => 'meta_value_num',
						'order'          => 'ASC',*/ ] );
	}else{	
	$the_query = new WP_Query( [ 'posts_per_page' => 12, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'show','meta_key'   => 'eventDateTime',
                        'orderby'    => 'meta_value_num',
						'order'          => 'ASC', ] );
	}
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ): $the_query->the_post();
			
			global $post;
			$uchlimerick_post_show_start_date      = get_field( "uchlimerick_post_show_start_date" );
			$date_uchlimerick_post_show_start_date = date( "j M", strtotime( $uchlimerick_post_show_start_date ) );
			
			$uchlimerick_post_show_end_date      = get_field( "uchlimerick_post_show_end_date" );
			$date_uchlimerick_post_show_end_date = date( "j M", strtotime( $uchlimerick_post_show_end_date ) );
			
			$uchlimerick_post_show_book_ticket_link = get_field( "uchlimerick_post_show_book_ticket_link" );
			
			$events    = get_post_meta( $post->ID, 'events', true );
			$price_obj = $event_prices = [];
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
			}
			?>
            
            <div class="show_single_wrap from_data_fetch <?php echo $classes[ $i % 12 ]; ?>">
                <div class="post-card">
                    <div class="post-image">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
						<?php
						$attachment_urls = get_post_meta( $post->ID, 'attachments_urls', true );
						if ( empty( $url ) ) {
							if ( isset( $attachment_urls[0] ) ) {
								$url = $attachment_urls[0];
							} else {
								$url = get_template_directory_uri() . '/assets/images/fallback-Image-2.png';
							}
						}
						
						?>
                        
                        <img src="<?php echo $url ?>"/>
                    </div>
                    <div class="post-details">
                        <h6 class="text-border-bottom">
                            <a href="<?php the_permalink(); ?>" style="color: #fff"><?php the_title(); ?></a>
                        </h6>
                        <a class="post-date" href="<?php the_permalink(); ?>">
                            <p><?php echo $show_date; ?></p>
                        </a>
                    </div>
					<div class="btn-wrapper book-btn-cover">
						<?php
						if ( isset( $book_ticket ) ) {
							?>
							<a href="<?php echo $book_ticket; ?>" class="button button-dark"><?php _e( "Book Tickets", 'uchlimerick' ) ?></a>
							<a href="<?php the_permalink(); ?>" class="button button-light"><?php _e( "Learn More", 'uchlimerick' ) ?></a>
							<?php
						} else {
							?>
							<a href="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
								echo $uchlimerick_post_show_book_ticket_link['url'];
							} ?>" target="<?php if ( $uchlimerick_post_show_book_ticket_link ) {
								echo $uchlimerick_post_show_book_ticket_link['target'];
							} ?>" class="button button-dark">Book Tickets</a> <a href="<?php the_permalink(); ?>" class="button-light button">Learn More</a>
							<?php
						}
						?>
					</div>
                </div>
            </div>
			<?php $i ++; ?>
		<?php endwhile;
		wp_reset_postdata();
	endif;
	
	die();
}

// the ajax function
add_action( 'wp_ajax_faq_search_data', 'faq_search_data' );
add_action( 'wp_ajax_nopriv_faq_search_data', 'faq_search_data' );
function faq_search_data() {
	$i         = 0;
	$the_query = new WP_Query( [ 'posts_per_page' => 5, 's' => esc_attr( $_POST['faq_search'] ), 'post_type' => 'faq' ] );
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ): $the_query->the_post();
			$helpfull = get_field( 'uchlimerick_faq_did_you_find_this_helpful' );
			
			?>
            <div class="faq-search-lorem search_results" id="<?php echo get_the_ID(); ?>">
                <h5><?php echo get_the_title(); ?></h5>
                <p><?php echo get_the_content(); ?></p>
                <div class="help-full-cover">
					<?php echo _( 'Did you find this helpful?' ); ?>
					<?php if ( $helpfull == 1 ) { ?>
                        <div class="help-full-thumbh">
                            <a class="like_thumb" href="javascript:void(0);" data-postid="<?php echo get_the_ID(); ?>" data-totallikes="<?php echo $no_of_likes; ?>">
                            <span class="thumbh-like like_thumb_span">
                                <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Vector-8.png" alt="">
                            </span> </a> <a class="dis_like_thumb" href="javascript:void(0);" data-postid="<?php echo get_the_ID(); ?>" data-totallikes="<?php echo $no_of_likes; ?>">
                            <span class="thumbh-like dis_like_thumb_span">
                                <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/uploads/2022/08/Vector-9.png" alt="">
                            </span> </a>
                        </div>
					<?php } ?>
                
                </div>
            </div>
			<?php $i ++; ?>
		<?php endwhile;
		wp_reset_postdata();
	} else {
		echo "<h5 class='no_results_faq_h5' style='color: #000;'>" . "Oops, we couldn’t find what you were looking for." . "</h5>";
		echo "<p class='no_results_faq_p' style='color: #000;'>" . "Check our dropdown menu for answers to frequently asked questions.." . "</p>";
		echo '<div class="contact-link">';
		echo _( 'Couldn&lsquo;t find your answer?' );
		?>
        <a href="<?php echo site_url( 'contact' ); ?>"><?php echo _( 'Contact Us' ); ?></a>
		<?php
		echo '</div>';
	}
	
	die();
}

add_action( 'pre_get_posts', 'uch_no_sticky_posts_query' );
function uch_no_sticky_posts_query( $query ) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set( 'post__not_in', get_option( 'sticky_posts' ) );
	}
}

function exclude_single_post_cpt( $query ) {
	if ( is_post_type_archive( 'project' ) && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post__not_in', [ 1795, 1796 ] );
	}
}

add_action( 'pre_get_posts', 'exclude_single_post_cpt' );

// add_action( 'admin_init', 'hide_editor' );
// function hide_editor() {
//   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
//   if( !isset( $post_id ) ) return;
//   $pagetitle = get_the_title($post_id);
//   if($post_id == '21'){
//     remove_post_type_support('page', 'editor');
//   }
// }


function like_post_counter() {
	$no_of_likes_new = '';
	$postid          = $_POST["postid"];
	$totallikes      = $_POST["totallikes"];
	$no_of_likes     = get_field( 'no_of_likes', $postid );
	$no_of_likes_new = $no_of_likes + 1;
	update_field( 'no_of_likes', $no_of_likes_new, $postid );
	echo json_encode( $no_of_likes_new );
	die();
	
}

add_action( 'wp_ajax_like_post_counter', 'like_post_counter' );
add_action( 'wp_ajax_nopriv_like_post_counter', 'like_post_counter' );

function dis_like_post_updater() {
	$no_of_likes_new = '';
	$postid          = $_POST["postid"];
	$totallikes      = $_POST["totallikes"];
	$no_of_likes     = get_field( 'no_of_likes', $postid );
	$no_of_likes_new = $no_of_likes - 1;
	update_field( 'no_of_likes', $no_of_likes_new, $postid );
	echo json_encode( $no_of_likes_new );
	die();
	
}

add_action( 'wp_ajax_dis_like_post_updater', 'dis_like_post_updater' );
add_action( 'wp_ajax_nopriv_dis_like_post_updater', 'dis_like_post_updater' );
add_filter( 'the_title', 'dd_the_title_filter', 10, 2 );
function dd_the_title_filter( $title, $id ) {
	if ( get_post_type( $id ) == 'show' ) {
		$title = strtolower( $title );
		$title = ucwords( $title );
	}
	
	return $title;
}
add_action('init','ddxxx');
function ddxxx(){
    if(isset($_REQUEST['ddxxx'])){
	    $args               = [
		    'posts_per_page' => - 1,
		    'post_type'      => 'show',
		    'post_status'    => [ 'publish' ],
		    'fields'         => 'ids',
		    'tax_query'      => [
			    [
				    'taxonomy' => 'show_cat',
				    'field'    => 'slug',
				    'terms'    => [ 'donate', 'become_a_friend' ],
				    'operator' => 'NOT IN',
			    ],
		    ],
	    ];
	    $old_posts          = get_posts( $args );
	    dd($old_posts);
	    if($old_posts) {
		    $imported_shows_ids = get_option( 'imported_shows_ids', true );
		    if ( ! is_array( $imported_shows_ids ) ) {
			    $imported_shows_ids = [];
		    }
		    if ( $imported_shows_ids ) {
			    $imported_shows_ids = array_unique( $imported_shows_ids );
		    }
		    dd($imported_shows_ids);
		    $deleted_post_arr = array_diff($old_posts, $imported_shows_ids);
		    dd($deleted_post_arr,1);
	    }
	    
    }
}