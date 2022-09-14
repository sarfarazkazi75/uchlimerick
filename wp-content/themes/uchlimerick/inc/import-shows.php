<?php

class DD_import_shows {
	
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'theme_options_panel' ], 12 );
		add_action( 'admin_notices', [ $this, 'general_admin_notice_dd' ] );
		add_action( 'init', [ $this, 'import_property_data_dd' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
		/*add_action('wp', [$this,'import_setup_schedule']);
		add_action('cron_for_daily_shows',[$this,'dd_cron_for_daily_shows']);
		add_action('cron_for_daily_shows_api',[$this,'dd_cron_for_daily_shows_api']);
		add_filter('cron_schedules',[$this, 'add_cron_schedules'], 9999, 1);*/
	}
	function add_cron_schedules($schedules){
		if (!isset($schedules['dd_every_25_minute'])) {
			$schedules['dd_every_25_minute'] = array(
				'interval' => 25 * 60,
				'display' => __('Every 25 Minute Sync')
			);
		}
		if (!isset($schedules['dd_every_30_minute'])) {
			$schedules['dd_every_30_minute'] = array(
				'interval' => 30 * 60,
				'display' => __('Every 30 Minute Sync')
			);
		}
		return $schedules;
    }
	function import_setup_schedule(){
		
		if (!wp_next_scheduled('cron_for_daily_shows')) {
			wp_schedule_event(time(), 'dd_every_30_minute', 'cron_for_daily_shows');
		}
		if (!wp_next_scheduled('cron_for_daily_shows_api')) {
			wp_schedule_event(time(), 'dd_every_25_minute', 'cron_for_daily_shows_api');
		}
	}
	function dd_cron_for_daily_shows(){
		$this->dd_import_function(true);
    }
	function dd_cron_for_daily_shows_api(){
		$this->dd_fetch_data_from_api();
    }
	public function admin_enqueue_scripts() {
		wp_enqueue_style( 'uchlimerick-admin-css', get_template_directory_uri() . '/assets/css/dd-admin.css', [], time() );
	}
	
	public function import_property_data_dd() {
		$shows_data_new = isset( $_REQUEST['shows_data_new'] ) ? $_REQUEST['shows_data_new'] : '';
		if ( wp_verify_nonce( $shows_data_new, 'shows_data_new' ) ) {
			$this->dd_fetch_data_from_api();
			wp_redirect( admin_url( '?page=sync-shows-data&dd-msg=success' ) );
			die();
		}
	}
	
	function dd_fetch_data_from_api() {
		$import_property_url = 'https://uch.ticketsolve.com/shows.xml';
		
		$response = wp_remote_get( $import_property_url );
		$body     = wp_remote_retrieve_body( $response );
		
		$xml        = new SimpleXMLElement( $body, LIBXML_NOCDATA );
		$json       = json_encode( $xml );
		$showObj    = json_decode( $json, true );
		$xml        = $this->XMLtoArray( $body );
		$shows_arr  = $xml['venues']['venue']['shows']['show'];
		$split_data = $this->splitMyArray( $shows_arr, 5 );
		$i_key      = 1;
		foreach ( $split_data as $key => $p_array ) {
			update_option( 'shows_from_api_' . $i_key, json_encode( $p_array ) );
			$i_key ++;
		}
		update_option( 'shows_from_api', count( $split_data ) );
		update_option( 'shows_last_sync_index', 1 );
		
	}
	
	function XMLtoArray( $XML ) {
		$xml_parser = xml_parser_create();
		xml_parse_into_struct( $xml_parser, $XML, $vals );
		xml_parser_free( $xml_parser );
		
		$_tmp = '';
		foreach ( $vals as $xml_elem ) {
			$x_tag   = strtolower( $xml_elem['tag'] );
			$x_level = $xml_elem['level'];
			$x_type  = $xml_elem['type'];
			if ( $x_level != 1 && $x_type == 'close' ) {
				if ( isset( $multi_key[ $x_tag ][ $x_level ] ) ) {
					$multi_key[ $x_tag ][ $x_level ] = 1;
				} else {
					$multi_key[ $x_tag ][ $x_level ] = 0;
				}
			}
			if ( $x_level != 1 && $x_type == 'complete' ) {
				if ( $_tmp == $x_tag ) {
					$multi_key[ $x_tag ][ $x_level ] = 1;
				}
				$_tmp = $x_tag;
			}
		}
		foreach ( $vals as $xml_elem ) {
			$x_tag   = strtolower( $xml_elem['tag'] );
			$x_level = $xml_elem['level'];
			$x_type  = $xml_elem['type'];
			if ( $x_type == 'open' ) {
				$level[ $x_level ] = $x_tag;
			}
			$start_level = 1;
			$php_stmt    = '$xml_array';
			if ( $x_type == 'close' && $x_level != 1 ) {
				$multi_key[ $x_tag ][ $x_level ] ++;
			}
			while ( $start_level < $x_level ) {
				$php_stmt .= '[ $level[ ' . $start_level . ' ] ]';
				if ( isset( $multi_key[ $level[ $start_level ] ][ $start_level ] ) && $multi_key[ $level[ $start_level ] ][ $start_level ] ) {
					$php_stmt .= '[ ' . ( $multi_key[ $level[ $start_level ] ][ $start_level ] - 1 ) . ' ]';
				}
				$start_level ++;
			}
			$add = '';
			if ( isset( $multi_key[ $x_tag ][ $x_level ] ) && $multi_key[ $x_tag ][ $x_level ] && ( $x_type == 'open' || $x_type == 'complete' ) ) {
				if ( ! isset( $multi_key2[ $x_tag ][ $x_level ] ) ) {
					$multi_key2[ $x_tag ][ $x_level ] = 0;
				} else {
					$multi_key2[ $x_tag ][ $x_level ] ++;
				}
				$add = '[ ' . $multi_key2[ $x_tag ][ $x_level ] . ' ]';
			}
			if ( isset( $xml_elem['value'] ) && trim( $xml_elem['value'] ) != '' && ! array_key_exists( 'attributes', $xml_elem ) ) {
				if ( $x_type == 'open' ) {
					$php_stmt_main = $php_stmt . '[ $x_type ]' . $add . '[ \'content\' ] = $xml_elem[ \'value\' ];
    ';
				} else {
					$php_stmt_main = $php_stmt . '[ $x_tag ]' . $add . ' = $xml_elem[ \'value\' ];
    ';
				}
				eval( $php_stmt_main );
			}
			if ( array_key_exists( 'attributes', $xml_elem ) ) {
				if ( isset( $xml_elem['value'] ) ) {
					$php_stmt_main = $php_stmt . '[ $x_tag ]' . $add . '[ \'content\' ] = $xml_elem[ \'value\' ];
    ';
					eval( $php_stmt_main );
				}
				foreach ( $xml_elem['attributes'] as $key => $value ) {
					$php_stmt_att = $php_stmt . '[ $x_tag ]' . $add . '[ $key ] = $value;
    ';
					eval( $php_stmt_att );
				}
			}
		}
		
		return $xml_array;
	}
	
	function splitMyArray( array $input_array, $size = 5, $preserve_keys = NULL ) {
		$nr = (int) ceil( count( $input_array ) / $size );
		
		if ( $nr > 0 ) {
			return array_chunk( $input_array, $nr, $preserve_keys );
		}
		
		return $input_array;
	}
	
	public function general_admin_notice_dd() {
		if ( isset( $_REQUEST['dd-msg'] ) ) {
			if ( isset( $_REQUEST['dd-msg'] ) && $_REQUEST['dd-msg'] == 'success' ) {
				$message = 'Data Refresh from API';
			}
			if ( isset( $_REQUEST['dd-import'] ) && $_REQUEST['dd-import'] == 'success' ) {
				$message = 'DATA Imported';
			}
			
			$classes = 'notice-success is-dismissible';
			
			printf( '<div class="notice %2$s"><p>%1$s</p></div>', $message, $classes );
		}
	}
	
	public function theme_options_panel() {
		add_menu_page( 'Sync Shows', 'Sync Shows', 'manage_options', 'sync-shows-data', [
			$this,
			'shows_sync_func',
		], '', 70 );
	}
	
	function shows_sync_func() {
		
		?>
        <div class="wrap shows-imports">
            <div id="poststuff wrap">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <h1><?php _e( 'Shows Sync', 'uchlimerick' ) ?></h1>
                        <div class="factoy_api_main_div">
                            <p class="label label-warning"
                               style="font-weight: 700;">
								<?php _e( 'Note : It\'ll take a few minutes to sync data.', 'uchlimerick' ) ?></p>
                        </div>
                        <form class='shows_sync_new_data' method='get'
                              accept-charset='utf-8'>
                            <input type='hidden' name='page'
                                   value='sync-shows-new-data'>
                            <button type='submit' id='sync_shows_new'
                                    class='button button-primary'><?php _e( 'Store new shows from API', 'uchlimerick' );
								?></button>
							<?php
							wp_nonce_field( 'shows_data_new', 'shows_data_new' );
							?>
                        </form>
                        
                        <form action="<?php echo admin_url( 'admin.php?page=sync-shows-data' ) ?>"
                              class='shows_sync' method='get'
                              accept-charset='utf-8'>
                            <button type='submit' id='sync_shows'
                                    class='button button-primary'><?php _e( 'Sync Shows', 'uchlimerick' );
								?></button>
							<?php
							$paged = get_option( 'sync-shows-data', 1 );
							wp_nonce_field( 'shows_data', 'shows_data' );
							?>
							<?php
							$sync_process_page = isset( $_REQUEST['sync_process_page'] ) ? $_REQUEST['sync_process_page'] : get_option( 'sync_process_page', 1 );
							?>
                            <input type='hidden' name='sync_process_page'
                                   id='sync_process_page'
                                   value="<?php echo $sync_process_page ?>"/> <input type='hidden' name='page'
                                                                                     value='sync-shows-data'/>
                        </form>
                        
                        <p class='start-msg d-none' style='font-size: 16px;'>
                            <strong><?php _e( 'Sync Process start', 'uchlimerick' ); ?></strong> <img class='img_loader' src='<?php echo get_stylesheet_directory_uri() ?>/assets/images/loader.gif'>
                        </p>
						<?php
						
						$shows_data = isset( $_REQUEST['shows_data'] ) ? $_REQUEST['shows_data'] : '';
						$process = isset( $_REQUEST['process'] ) ? $_REQUEST['process'] : '';
						
						if ( wp_verify_nonce( $shows_data, 'shows_data' ) ) {
						        self::dd_import_function();
						}
						if ( $process) {
							?>
                            <div class="dd-log <?php echo ( $process != 'done' ) ? 'd-none' : '' ?>">
									<?php
									$imported_shows_title = get_option( 'all_imported_shows_ids', true );
									if ( ! is_array( $imported_shows_title ) ) {
										$imported_shows_title = [];
									}
									if ( $imported_shows_title ) {
									$imported_shows_title = array_unique( $imported_shows_title );
									?>
                                <h3><?php _e( 'Imported Shows', 'roborts' ) ?></h3>
                                <p style="font-size: large;font-weight: 600"><?php _e( 'Total Shows : ', 'roborts' ) ?><?php echo count( $imported_shows_title ) ?></p>
								<?php
								foreach ( $imported_shows_title as $post ) {
									echo '<p>' . $post . '</p>';
								}
								}
								?>
                                <?php
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
							if($old_posts){
								$imported_shows_ids = get_option( 'imported_shows_ids', true );
								if ( ! is_array( $imported_shows_ids ) ) {
									$imported_shows_ids = [];
								}
								if ( $imported_shows_ids ) {
									$imported_shows_ids = array_unique( $imported_shows_ids );
								}
								$deleted_post_arr = array_diff($old_posts, $imported_shows_ids);
								$deleted_post_arr = array_unique($deleted_post_arr);
                                $deleted_post = $this->remove_deleted_posts( $deleted_post_arr );
								update_option( 'imported_shows_ids', array() );
								
								if ( $deleted_post) {
									?>
                                    <h3><?php _e( 'Deleted Shows', 'roborts' ) ?></h3>
                                    <p style="font-size: large;font-weight: 600"><?php _e( 'Total Deleted : ', 'roborts' ) ?><?php echo count( $deleted_post ) ?></p>
									<?php
									foreach ( $deleted_post as $post ) {
										echo '<p>' . $post . '</p>';
									}
								}
							}
							?>
                            </div>
							<?php
							
							
						}
						
						?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
	
	function dd_import_function($cron = false){
		$redirect_url = admin_url( 'admin.php?page=sync-shows-data' );
		
		
		
		$sync_process_page = isset( $_REQUEST['sync_process_page'] ) ? $_REQUEST['sync_process_page'] : get_option( 'sync_process_page', 1 );
		$shows_count       = get_option( 'shows_from_api', false );
		
		if ( $shows_count ) {
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			for ( $i = $sync_process_page;
				$i <= $shows_count;
				$i ++ ) {
			 
				$imported_posts     =  [];
				$imported_shows_ids = get_option( 'imported_shows_ids', true );
				if ( !is_array($imported_shows_ids) ) {
					$imported_shows_ids = [];
				}
				
				$all_imported_shows_ids = get_option( 'all_imported_shows_ids', true );
				if ( ! is_array( $all_imported_shows_ids ) ) {
					$all_imported_shows_ids = [];
				}
				$shows_encode = get_option( 'shows_from_api_' . $i );
				
				$shows = json_decode( $shows_encode, true );
				
				if ( $shows ) {
					foreach ( $shows as $key => $single_prop ) {
						$post_id = 0;
						$meta_values = [];
						$post_title  = trim( reset( $single_prop['name'] ) );
						$prev_post_id = $single_prop['ID'];
						
						
						$posts_with_meta  = get_posts( array(
							'posts_per_page' => 1,
							'post_type'      => 'show',
							'post_status'    => array( 'publish', 'preview', 'draft' ),
							'meta_query'     => array(
								array(
									'key'   => 'ID',
									'value' => $prev_post_id,
								)
							),
							'fields'         => 'ids',
						) );
						
						if(isset($posts_with_meta[0])){
							$post_id     = reset($posts_with_meta);
						}
						
						if ( ! in_array( $post_title, $all_imported_shows_ids ) ) {
							$all_imported_shows_ids[] = $post_title;
						}
						
						foreach ( $single_prop as $meta_key => $meta_value ) {
							if ( is_array( $meta_value ) && count( $meta_value ) == 1 ) {
								$meta_value = reset( $meta_value );
							}
							if ( $meta_key == 'events' ) {
								$meta_value = $meta_value['event'];
							}
							$meta_values[ $meta_key ] = $meta_value;
						}
						
						$post_desc = isset( $meta_values['description'] ) ? $meta_values['description'] : '';
						
						$my_post = [
							'post_type'    => 'show',
							'post_title'   => wp_strip_all_tags( $post_title ),
							'post_excerpt' => substr( strip_tags( $post_desc ), 0, 250 ) . '...',
							'post_content' => $post_desc,
							'post_status'  => 'publish',
						];
						if ( ! empty( $post_id ) ) {
							$my_post['ID'] = $post_id;
						}
						$post_id              = wp_insert_post( $my_post );
						$imported_posts[]     = wp_strip_all_tags( $post_title );
						$imported_shows_ids[] = $post_id ;
						
						if ( isset( $meta_values['event_category'] ) && ! empty( $meta_values['event_category'] ) ) {
							if ( is_array( $meta_values['event_category'] ) && count( $meta_values['event_category'] ) == 1 ) {
								$tags = reset( $meta_values['event_category'] );
							} else {
								$tags = $meta_values['event_category'];
							}
							if ( is_array( $tags ) ) {
								foreach ( $tags as $tag_name ) {
									$this->check_assign_terms( $post_id, $tag_name, 'genre' );
								}
								$meta_values['event_category'] = $tags;
							} else {
								$this->check_assign_terms( $post_id, $tags, 'genre' );
							}
						}
						
						if ( isset( $meta_values['event_category'] ) ) {
							$this->check_assign_terms( $post_id, $meta_values['event_category'], 'show_cat' );
						}
						
						if ( isset( $meta_values['events'] ) && !empty($meta_values['events']) ) {
							$bind = 0;
							$bind_event = array();
							foreach ( $meta_values['events'] as $events ) {
								if ( $events ) {
									foreach ( $events as $key => $event ) {
										if ( $key == 'content' ) {
											continue;
										}
										if ( ! empty( $event ) ) {
											if ( is_array( $event ) && count( $event ) == 1 ) {
												$event = reset( $event );
											}
											$bind_event[ $bind ][ $key ] = $event;
										}
									}
									$bind ++;
								}
							}
							$meta_values['events'] = $bind_event;
						}
						$event  = isset( $meta_values['events'][0] ) ? $meta_values['events'][0] : [];
						if ( $event ) {
							$event_date                  = $event['date_time_iso']['content'];
							$meta_value['eventDateTime'] = strtotime( $event_date );
							update_post_meta( $post_id, 'eventDateTime', $meta_value['eventDateTime'] );
						}
						
						if(isset($bind_event)){
							$month_yr = $store_yr = $store_month = $event_dates= array();
						    foreach ($bind_event as $index => $event){
							    $event_date                  = $event['date_time_iso']['content'];
							    
							    $event_dates[$index]     = date_i18n( 'd M, Y', strtotime( $event_date ) );
							    
							    $event_yr  = date_i18n( 'Y', strtotime( $event_date));
							    
							    $event_month   = date_i18n( 'F', strtotime( $event_date ) );
							    
							    $this->check_assign_terms( $post_id, strtolower( $event_month ), 'month', true );
							    
							    $this->check_assign_terms( $post_id, $event_yr, 'years', true );
							    
							    $store_yr[$index] = $event_yr;
							    
							    $store_month[$index] = $event_month;
							    
							    $month_yr[$index] = strtolower($event_month).'-'.$event_yr;
							    update_post_meta( $post_id, 'event_month_years',array_unique($month_yr)  );
							    update_post_meta( $post_id, 'event_years', array_unique($store_yr) );
							    update_post_meta( $post_id, 'event_month', array_unique($store_month));
							    update_post_meta( $post_id, 'eventDate',array_unique($event_dates) );
						    }
                        }
						if ( isset( $meta_values['properties'] ) && ! empty( $meta_values['properties'] ) ) {
							if ( isset( $meta_values['properties']['property'] ) ) {
								$meta_values['properties']                  = reset( $meta_values['properties']['property'] );
								$meta_values['uchlimerick_post_show_video'] = $meta_values['properties']['value'];
							}
						}
						
						if ( $meta_values ) {
							foreach ( $meta_values as $dmeta_key => $dmeta_value ) {
								if ( $dmeta_key == 'images' ) {
									unset( $meta_value[ $dmeta_key ] );
									if ( is_array( $dmeta_value ) && count( $dmeta_value ) == 1 ) {
										if ( $dmeta_value ) {
											$dmeta_value = reset( $dmeta_value );
											$dmeta_value = reset( $dmeta_value );
											
											$attachments_urls = [];
											foreach ( $dmeta_value['url'] as $image_array ) {
												$attachments_urls[] = $image_array['content'];
												
											}
											update_post_meta( $post_id, 'attachments_urls', $attachments_urls );
										}
									} else {
										$dmeta_value = trim( $dmeta_value );
									}
								}
								update_field( $dmeta_key, $dmeta_value, $post_id );
							}
							update_post_meta( $post_id, 'api_meta_values', $meta_values );
						}
					}
					
					update_option( 'imported_shows_ids', $imported_shows_ids );
					
					update_option( 'all_imported_shows_ids', $all_imported_shows_ids );
					
					if($cron==false){
					?>
                        <div class="dd-log <?php echo ! isset( $_REQUEST['sync_process_page'] ) ? 'd-none' : '' ?>">
                            <p>
                                <?php
                                $import_log = implode( '<br>', $imported_posts );
                                echo $import_log;
                                ?>
                            </p>
                        </div>
					<?php
                    }
				}
				if($cron==false){
				    
                    if ( $i == $shows_count ) {
                        update_option( 'sync_process_page', 1 );
                        $redirect_url = admin_url( 'admin.php?page=sync-shows-data&process=done' );
                    } elseif ( isset( $_REQUEST['sync_process_page'] ) ) {
                        update_option( 'sync_process_page', $i );
                        $page         = $_REQUEST['sync_process_page'] + 1;
                        $redirect_url = admin_url( 'admin.php?page=sync-shows-data&shows_data=' . $_REQUEST['shows_data'] . '&sync_process_page=' . $page );
                    }
                    ?>
                    <script type="text/javascript">
                        window.location.href = "<?php echo $redirect_url ?>";
                    </script>
                    
                    <?php
					die();
				}
			}
		}
		
		
	}
	function check_assign_terms( $post_id, $term_slug, $taxonomy, $append = true ) {
		$pid = $post_id;
		// post we will set it's categories
		$cat_name = $term_slug; // category name we want to assign the post to
		$cat      = get_term_by( 'name', $cat_name, $taxonomy );
		if ( $cat == false ) {
			$cat = wp_insert_term( $cat_name, $taxonomy );
			if ( ! is_wp_error( $cat ) ) {
				$cat_id = $cat['term_id'];
			}
		} else {
			$cat_id = $cat->term_id;
		}
		$res = wp_set_post_terms( $pid, [ $cat_id ], $taxonomy, $append );
		
		return $res;
	}
	
	function remove_deleted_posts( $old_posts ) {
		$deleted_posts = [];
		if ( $old_posts ) {
			foreach ( $old_posts as $delete_post_id ) {
				$deleted_posts[] = get_the_title($delete_post_id);
				wp_delete_post( $delete_post_id,true );
			}
		}
		
		return $deleted_posts;
	}
	
	function clean_multi_array( $values ) {
		$return_array = [];
		if ( $values ) {
			foreach ( $values as $a_key => $value ) {
				if ( ! empty( $value ) ) {
					foreach ( $value as $key => $single_arrays ) {
						if ( ! empty( $single_arrays ) ) {
							$count = 0;
							foreach ( $single_arrays as $single_val ) {
								return $single_val['content'];
								$count ++;
							}
						}
					}
				}
			}
		}
		
		return $return_array;
	}
	
}

return new DD_import_shows();
