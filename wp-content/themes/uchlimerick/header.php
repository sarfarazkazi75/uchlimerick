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
                        <?php if($header_book_tickets_button != ""): ?><a href="<?php echo $header_book_tickets_button['url']; ?>" target="<?php echo $header_book_tickets_button['target']; ?>" class="button button-dark"><?php echo $header_book_tickets_button['title']; ?></a><?php endif; ?>
                     </div>
                  </div>
                  <div class="header-right-mobile d-lg-none">
                     <div class="mobile-menu-toggle-wrap">
                        <a href="<?php echo site_url(); ?>" class="mobile-menu-toggle">
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
                        <?php if($header_book_tickets_button != ""): ?><a href="<?php echo $header_book_tickets_button['url']; ?>" target="<?php echo $header_book_tickets_button['target']; ?>"  class="button button-dark"><?php echo $header_book_tickets_button['title']; ?></a><?php endif; ?>
                     </div>
                     <div class="call-wrap">
                        <?php if($header_phone_number != ""): ?><a href="tel:<?php echo $header_phone_number; ?>" ><i class="fa-solid fa-phone"></i><?php echo $header_phone_number; ?></a><?php endif; ?>
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

<?php if( have_rows('page_banner') ): ?>
    <?php while( have_rows('page_banner') ): the_row(); ?>
        <?php if( get_row_layout() == 'banner_section' ): ?>
        <?php
            $select_video_or_image = get_sub_field('select_video_or_image');
            $support_us_desktop_video = get_sub_field('support_us_desktop_video');
            $banner_image = get_sub_field('banner_image');
            $banner_small_image = get_sub_field('banner_small_image');
            $banner_title = get_sub_field('banner_title');
            
        ?>
        <section class="page-banner">
            <?php 
                if( get_sub_field('select_video_or_image') == 'image' ) {
                    ?>
                <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>" class="d-none d-md-block img-100">
            <?php
                }
                if( get_sub_field('select_video_or_image') == 'video' ) {   
                    ?>
            <div class="support-video-wrap">
                <video loop="" muted="" autoplay="" class="d-none d-md-flex">
                    <source src="<?php echo $support_us_desktop_video ;?>" type="video/mp4">
                </video>
            </div>
            <?php
                }
            ?>
            <?php if($banner_small_image != ""): ?>
                <img src="<?php echo $banner_small_image['url']; ?>" alt="" class="d-md-none img-100">
            <?php endif; ?>
            <div class="page-banner-text">
                <div class="container-inner">
                    <div class="page-border-bottom">
                        <?php if($banner_title = !empty($banner_title) ? $banner_title : get_the_title()): ?>
                            <h1><?php echo $banner_title; ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
 <?php endwhile; ?>
<?php endif; ?>