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
                                        echo '<option value="">Gener</option>';
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
                                        
                                        if( $terms = get_terms( array( 'taxonomy' => 'gift_idea', 'orderby' => 'name' ) ) ) : 
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
                                        endif; 
                                        
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

                                <form>
                                    <input type="text" name="keyword" id="keyword" placeholder="Search Brand Name…" onkeyup="fetch()"></input>
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

<section class="">
    <div class="container-inner">
        <div class="post-main-cover">
            <div class="row" id="show_content_wrap_full">

                        <?php 
                        global $wp_query;
                        $temp=$wp_query;
                        $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
                        $args = array(
                            'post_type' => 'show',
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'posts_per_page' => 12,
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
                                array(
                                'taxonomy' => 'gift_idea',
                                'field' => 'id',
                                'terms' => $gift_idea_cat_id,
                                'operator' => $gift_idea_cat_id ? 'IN' : 'NOT IN'
                                ),
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
                        $classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
			            if ( $wp_query->have_posts() ){
                            while ( $wp_query->have_posts() ) :
                                $wp_query->the_post();   
                                
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
						<?php wp_reset_query(); ?>        
                        <?php $wp_query=null; $wp_query=$temp; ?>    
                        <?php }
                        else {
                           echo "<h2>"."No Matching Selections Found"."</h2>";
                        } ?>

            </div>
            <div class="load-more-btn text-center">
                <a id="load_more" href="javascript:void(0);" class="button-light button">Load more</a>
            </div>
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
                            <a href="<?php echo $card_link['url'];?>" class="button-light button"><?php echo $card_link['title'];?></a>
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