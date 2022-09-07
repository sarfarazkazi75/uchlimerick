<?php
/**
 * uchlimerick functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uchlimerick
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uchlimerick_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on uchlimerick, use a find and replace
		* to change 'uchlimerick' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'uchlimerick', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'uchlimerick' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'uchlimerick_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'uchlimerick_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uchlimerick_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uchlimerick_content_width', 640 );
}
add_action( 'after_setup_theme', 'uchlimerick_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uchlimerick_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'uchlimerick' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'uchlimerick' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'uchlimerick_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uchlimerick_scripts() {
	wp_enqueue_style( 'uchlimerick-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array());
	//wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', array());
	wp_enqueue_style( 'all-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array());
	wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/assets/css/aos.css', array());
	wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/assets/css/fancybox.css', array());
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array());
	wp_enqueue_style( 'style-one', get_template_directory_uri() . '/assets/css/style-one.css', array());
	wp_enqueue_style( 'style-two', get_template_directory_uri() . '/assets/css/style-two.css', array());
	wp_enqueue_style( 'custom-two', get_template_directory_uri() . '/assets/css/custom-2.css', array());
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', array());
	wp_style_add_data( 'uchlimerick-style', 'rtl', 'replace' );


	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uchlimerick-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-zoom-js', get_template_directory_uri() . '/assets/js/jquery.zoom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'fancybox-umd-js', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'myjs', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.dc5e7f18c8.js', array(), time(), false );
	wp_enqueue_script( 'section-accordian', get_template_directory_uri() . '/assets/js/section-accordian.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uchlimerick_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/********************SVG************************/
 function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

include get_template_directory().'/inc/dd-functions.php';

register_nav_menus( array(
			'Your-Visit' => esc_html__( 'Your-Visit', 'uchlimerick' ),
) );
register_nav_menus( array(
			'About' => esc_html__( 'About', 'uchlimerick' ),
) );
register_nav_menus( array(
			'Support-Us' => esc_html__( 'Support-Us', 'uchlimerick' ),
) );
register_nav_menus( array(
			'Governance' => esc_html__( 'Governance', 'uchlimerick' ),
) );
register_nav_menus( array(
			'Ancillary' => esc_html__( 'Ancillary', 'uchlimerick' ),
) );

// recent posts shortcode

function recent_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '3',
		'order'   => 'DESC',
		'orderby' => 'post_date',
	), $atts));
	
	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $num,
		'order'          => $order,
		'orderby'        => $orderby,
		'post__not_in' => get_option( 'sticky_posts' ) 
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
		
		$output .= '
		<div class="col-lg-4 col-md-6">
            <a href="'. get_the_permalink() .'" class="project-card"  target="blank">
                <div class="card-img">
                	'. get_the_post_thumbnail() .'
                </div>
            </a>
            <div class="project-des"><a href="'. get_the_permalink() .'" class="project-card" target="blank">
                <h6>'. get_the_title() .' </h6>
                </a><a href="'. get_the_permalink() .'" class="read-btn" target="blank">Read more <img src="https://dddemo.net/wordpress/2022/uchlimerick/wp-content/themes/uchlimerick/assets/images/righ-chevrow-yellow.svg" alt=""></a>
            </div>          
        </div>';		
	}
	
	wp_reset_postdata();	
	return  $output ;	
}
add_shortcode('recent_posts', 'recent_posts_shortcode');


/*-------------Search for Custom Post Type--------------*/
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'faq') {
                    $query->set('post_type',array('faq'));
                }
        }       
    }
return $query;
}

add_filter('pre_get_posts','searchfilter');

function dd($data = false, $flag = false, $display = false)
{
    if (empty($display)) {
        echo "<pre class='direct_display'>";
        if ($flag == 1) {
            print_r($data);
            die;
        } else {
            print_r($data);
        }
        echo "</pre>";
    } else {
        echo "<div style='display:none' class='direct_display'><pre>";
        print_r($data);
        echo "</pre></div>";
    }
}

include_once 'inc/import-shows.php';

/*-------------Disable single page view & Show archive pages-----------*/
add_action( 'template_redirect', 'single_faq_redirect' );
function single_faq_redirect()
{
	if ( ! is_singular( 'faq' ) )
		return;

	wp_redirect( get_post_type_archive_link( 'faq' ), 301 );
	exit;
}

/*admin custom logo */
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo() {
  $admin_logo = get_field('uchlimerick_site_admin_logo','option');
  if(!empty($admin_logo)){ ?>
    <style type="text/css">
      body.login div#login h1 a {
        background-image: url(<?php echo $admin_logo;?>);
        margin: 0 auto;
        background-size: auto;
        width: auto;
      }
      body.login div#login h1 a:focus {
        box-shadow: none;
      }
    </style>
  <?php }
} //end function

add_filter( 'login_headerurl', 'custom_loginlogo_url' );																								
	function custom_loginlogo_url($url) {	
		return site_url();									
	}
add_action('admin_head', 'remove_content_editor');

/**
 * Remove the content editor from pages as all content is handled through Panels
 */
function remove_content_editor()
{
    $ids_array= array('21' , '143' , '152' , '183' , '258' ,'115' , '278' , '190' , '263' , '35' , '123' , '19' , '210' , '57' , '16');
	if(in_array(get_the_ID(),$ids_array) ){
	remove_post_type_support('page', 'editor');
	}
}

