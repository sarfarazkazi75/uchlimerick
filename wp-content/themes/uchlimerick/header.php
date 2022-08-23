<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uchlimerick
 */
   $header_phone_number = get_field('header_phone_number', 'option');
   $header_book_tickets_button = get_field('header_book_tickets_button', 'option');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'uchlimerick' ); ?></a>

	<header id="masthead" class="site-header">
   <div class="header-main">
      <div class="container">
         <div class="main-menu">
            <div class="row align-items-center">
               <div class="col-6 col-lg-2">
                  <div class="site-branding navbar-brand">
                     <?php the_custom_logo();?>	
                  </div>
               </div>
               <div class="col-6 col-lg-10">
                  <div class="header-right d-none d-lg-flex">
                     <div class="nav-menu desktop-menu">
                        <?php
                           wp_nav_menu(
                           	array(
                           		'theme_location' => 'menu-1',
                           		'menu_id'        => 'primary-menu',
                           	)
                           );
                           ?>
                        <?php if($header_book_tickets_button != ""): ?><a href="<?php echo $header_book_tickets_button['url']; ?>" class="button button-dark"><?php echo $header_book_tickets_button['title']; ?></a><?php endif; ?>
                     </div>
                  </div>
                  <div class="header-right-mobile d-lg-none">
                     <div class="mobile-menu-toggle-wrap">
                        <a href="#" class="mobile-menu-toggle">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                        </a>
                     </div>
                     <div class="mobile-menu">
                        <nav class="main-menu">
                           <?php
                              wp_nav_menu(
                              	array(
                              		'theme_location' => 'menu-1',
                              		'menu_id'        => 'primary-menu',
                              	)
                              );
                              ?>
                     </nav>
                     <div class="button-wrap">
                        <?php if($header_book_tickets_button != ""): ?><a href="<?php echo $header_book_tickets_button['url']; ?>" class="button button-dark"><?php echo $header_book_tickets_button['title']; ?></a><?php endif; ?>
                     </div>
                     <div class="call-wrap">
                        <?php if($header_phone_number != ""): ?><a href="tel:<?php echo $header_phone_number; ?>"><i class="fa-solid fa-phone"></i><?php echo $header_phone_number; ?></a><?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- #masthead -->
<!-- //common banner section for pages -->
<?php
if ( is_page( array( 'governance','terms-conditions', 'privacy-policy','booking-terms' , 'contact' , 'board-of-directors' , 'about' , 'venue-hire' , 'accessibility' , 'seating-plan' , 'become-a-friend' , 'corporate-member' , 'booking-information') ) ) {
   get_template_part( 'template-parts/flex', 'banner_section' );
}
?>
