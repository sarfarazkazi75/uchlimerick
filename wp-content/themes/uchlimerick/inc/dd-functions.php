<?php 

require get_template_directory() . '/inc/custom-posttype.php';

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-options',
        'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Options',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-options',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-options',
	));
	
}

/*remove the span wrapper in Contact Form 7*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);
    return $content;

});

/*Remove p Tag From Contact Form 7*/
add_filter('wpcf7_autop_or_not', '__return_false');

// AJAX URL DEFINING
add_action('wp_head','ajaxurl');
function ajaxurl() {
?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}


function load_more_shows()
{
    $count = $_POST["count"];

    $cpt = 1;

    $args = array(
        'posts_per_page' => -1,
        'post_type'   => 'show', // change the post type if you use a custom post type
        'post_status' => 'publish',
    );

    $articles = new WP_Query( $args );

    $ar_posts = array();
	$i=0;
	$classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
    if( $articles->have_posts() )
    {
        while( $articles->have_posts() )
        {
            $articles->the_post();

            $more_posts = "";

            if( $cpt > $count && $cpt < $count+12 )
            {

					$more_posts .= '<div class="show_single_wrap '.$classes[$i%12].'">';                           
					$more_posts .= '<div class="post-card">';
					$more_posts .= '<div class="post-image">';
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
					$more_posts .= '<img src="'.$url.'" />';
					$more_posts .= '</div>';
					$more_posts .= '<div class="post-details">';
					$more_posts .= '<h6 class="text-border-bottom">'.get_the_title().'</h6>';
					$more_posts .= '<a class="post-date" href="'.get_the_permalink().'">02 Jan - 03 Feb</a>';
					$more_posts .= '<div class="btn-wrapper book-btn-cover">';
					$more_posts .= '<a href="#" class="button button-dark">Book Tickets</a>';
					$more_posts .= '<a href="'.get_the_permalink().'" class="button-light button">Learn More</a>';
					$more_posts .= '</div>';
					$more_posts .= '</div>';
					$more_posts .= '</div>';
					$more_posts .= '</div>';					

                $ar_posts[] = $more_posts;

                if( $cpt == $articles->found_posts )
                    $ar_posts[] = "0";
            }
            $cpt++;
            $i++;
        }
    }
    echo json_encode($ar_posts);
    die();
}
add_action( 'wp_ajax_load_more_shows', 'load_more_shows' );
add_action( 'wp_ajax_nopriv_load_more_shows', 'load_more_shows' );

function load_more_blog_posts()
{
    $count = $_POST["count"];

    $cpt = 1;

    $args = array(
        'posts_per_page' => -1,
        'post_type'   => 'post', // change the post type if you use a custom post type
        'post_status' => 'publish',
    );

    $articles = new WP_Query( $args );

    $ar_posts = array();
	
    if( $articles->have_posts() )
    {
        $i = 1; 
        $temp_data = 1;
        while( $articles->have_posts() )
        {
            $articles->the_post();
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
             }elseif($i == 10){
                $inner_class='donate-cover Become-friend-cover bg-light-gray';
             }else{
                $inner_class='post-card';
             }
            $more_posts = "";

            if( $cpt > $count && $cpt < $count+10 )
            {
                    
				    $more_posts .= '<div class="'.$class.' order-md-'.$i.' order-'.$i.'">';
                    $more_posts .= '<div class="'.$inner_class.'">';
                    $more_posts .= '<div class="post-image">';
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
                    $more_posts .= '<img src="'.$url.'" />';
                    // $more_posts .= the_post_thumbnail();
                    $more_posts .= '</div>';
                    $more_posts .= '<div class="post-details">';
                    $more_posts .= $col_8_content;
                    $more_posts .= '</div>';
                    $more_posts .= '</div>';
                    $more_posts .= '</div>';


                $ar_posts[] = $more_posts;

                if( $cpt == $articles->found_posts )
                    $ar_posts[] = "0";
            }
            $cpt++;
            $i++;
        }
    }
    echo json_encode($ar_posts);
    die();
}
add_action( 'wp_ajax_load_more_blog_posts', 'load_more_blog_posts' );
add_action( 'wp_ajax_nopriv_load_more_blog_posts', 'load_more_blog_posts' );

function load_more_project_posts()
{
    $count = $_POST["count"];

    $cpt = 1;
    $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
    $args = array(
        'posts_per_page' => -1,
        'post_type'   => 'project', // change the post type if you use a custom post type
        'paged' => $paged,
        'post_status' => 'publish',
    );

    $articles = new WP_Query( $args );

    $ar_posts = array();
	
    if( $articles->have_posts() )
    {
        $i = 0; 
        $temp_data = 0;
        while( $articles->have_posts() )
        {
            $articles->the_post();
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
             }elseif($i == 10){
                $inner_class='donate-cover Become-friend-cover bg-light-gray';
             }else{
                $inner_class='post-card';
             }
            $more_posts = "";

            if( $cpt > $count && $cpt < $count+10 )
            {
                    
				    $more_posts .= '<div class="project_single_wrap '.$class.' order-md-'.$i.' order-'.$i.'">';
                    $more_posts .= '<div class="'.$inner_class.'">';
                    $more_posts .= '<div class="post-image">';
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
                    $more_posts .= '<img src="'.$url.'" />';
                    $more_posts .= '</div>';
                    $more_posts .= '<div class="post-details">';
                    $more_posts .= $col_8_content;
                    $more_posts .= '</div>';
                    $more_posts .= '</div>';
                    $more_posts .= '</div>';


                $ar_posts[] = $more_posts;

                if( $cpt == $articles->found_posts )
                    $ar_posts[] = "0";
            }
            $cpt++;
            $i++;
        }
    }
    echo json_encode($ar_posts);
    die();
}
add_action( 'wp_ajax_load_more_project_posts', 'load_more_project_posts' );
add_action( 'wp_ajax_nopriv_load_more_project_posts', 'load_more_project_posts' );


// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
	$i=0;
	$classes = array('col-md-8 order-md-1 order-2', 'col-md-4 order-md-2 order-1', 'col-md-4 order-md-3 order-4', 'col-md-4 order-md-4 order-3', 'col-md-4 order-md-5 order-5', 'col-md-4 order-md-6 order-6', 'col-md-8 order-md-7 order-7', 'col-md-4 order-md-8 order-9', 'col-md-4 order-md-9 order-10', 'col-md-4 order-md-10 order-8', 'col-md-8 order-md-11 order-11', 'col-md-4 order-md-12 d-md-block d-none order-12');
    $the_query = new WP_Query( array( 'posts_per_page' => 12, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'show' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            
                        <div class="show_single_wrap <?php echo $classes[$i%12]; ?>">                           
                            <div class="post-card">
                                <div class="post-image">
                                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                    <img src="<?php echo $url ?>" />
                                </div>
                                <div class="post-details">
                                    <h6 class="text-border-bottom"><?php the_title(); ?></h6>
                                    <a class="post-date" href="<?php the_permalink(); ?>">02 Jan - 03 Feb</a>
                                    <div class="btn-wrapper book-btn-cover">
                                        <a href="#" class="button button-dark">Book Tickets</a>
                                        <a href="<?php the_permalink(); ?>" class="button-light button">Learn More</a>
                                    </div>
                                </div>
                            </div>                           
                        </div>  
		<?php $i++; ?>
        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}
