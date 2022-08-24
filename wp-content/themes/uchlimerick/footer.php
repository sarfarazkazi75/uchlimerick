<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uchlimerick
 */

$footer_logo = get_field( 'footer_logo', 'options' );
$footer_social_heading_text = get_field( 'footer_social_heading_text', 'options' );
$footer_copyright_text = get_field( 'footer_copyright_text', 'options' );
$footer_section1_menu_heading = get_field( 'footer_section1_menu_heading', 'options' );
$footer_section2_menu_heading = get_field( 'footer_section2_menu_heading', 'options' );
$footer_section3_menu_heading = get_field( 'footer_section3_menu_heading', 'options' );
$footer_section4_menu_heading = get_field( 'footer_section4_menu_heading', 'options' );
$footer_section5_menu_heading = get_field( 'footer_section5_menu_heading', 'options' );

?>

	<footer id="colophon" class="site-footer">
		<div class="container-inner">
			<div class="footer-top">
				<div class="row footer-blocks">
					<div class="col-lg-8 footer-block footer-links-block">
						<div class="footer-links-items">
						<div class="footer-logo d-lg-none">
							<img src="<?php echo $footer_logo['url'];?>" alt="">
						</div>
							<div class="footer-links">
								<h6 class="footer-link-title"><?php echo $footer_section1_menu_heading; ?><i class="fa-solid fa-angle-down"></i></h6>
								<div class="menu-visit-container footer-link-content">
									<?php
					                  wp_nav_menu( array(
					                  	'theme_location' => 'Your-Visit',
					                  	'menu_id'        => 'Your-Visit',
					                  ) );
					                ?>
					            </div>
							</div>
							<div class="footer-links">
								<h6 class="footer-link-title"><?php echo $footer_section2_menu_heading; ?><i class="fa-solid fa-angle-down"></i></h6>	
								<div class="menu-about-container footer-link-content">
									<?php
					                  wp_nav_menu( array(
					                  	'theme_location' => 'About',
					                  	'menu_id'        => 'About',
					                  ) );
					                ?>
								</div>
							</div>
							<div class="footer-links">
								<h6 class="footer-link-title"><?php echo $footer_section3_menu_heading; ?><i class="fa-solid fa-angle-down"></i></h6>
								<div class="menu-support-container footer-link-content">
									<?php
					                  wp_nav_menu( array(
					                  	'theme_location' => 'Support-Us',
					                  	'menu_id'        => 'Support-Us',
					                  ) );
					                ?>
					            </div>
							</div>
							<div class="footer-links">
								<h6 class="footer-link-title"><?php echo $footer_section4_menu_heading; ?><i class="fa-solid fa-angle-down"></i></h6>
								<div class="menu-governace-container footer-link-content">
									<?php
					                  wp_nav_menu( array(
					                  	'theme_location' => 'Governance',
					                  	'menu_id'        => 'Governance',
					                  ) );
					                ?>
								</div>
							</div>
							<div class="footer-links">
								<h6 class="footer-link-title"><?php echo $footer_section5_menu_heading; ?><i class="fa-solid fa-angle-down"></i></h6>
								<div class="menu-ancillary-conatiner footer-link-content">
									<?php
					                  wp_nav_menu( array(
					                  	'theme_location' => 'Ancillary',
					                  	'menu_id'        => 'Ancillary',
					                  ) );
					                ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 footer-block footer-logo-block">
						<div class="footer-logo d-none d-lg-block">
							<img src="<?php echo $footer_logo['url'];?>" alt="">
						</div>
						<div class="footer-social-block">
							<p class="p-small"><?php echo $footer_social_heading_text; ?></p>
							<div class="socail-icon">
								<?php
									$twitter_link = get_field( 'twitter_link', 'options' );
									$facebook_link = get_field( 'facebook_link', 'options' );
									$instagram_link = get_field( 'instagram_link', 'options' );
									$linkedin_link = get_field( 'linkedin_link', 'options' );
									$tiktok_link = get_field( 'tiktok_link', 'options' );
									$youtube_link = get_field( 'youtube_link', 'options' );
								?>
								<ul>
									<?php if($twitter_link != ""): ?>
									<li>
										<a href="<?php echo isset($twitter_link['url'])?$twitter_link['url']:'#'; ?>" target="<?php echo $twitter_link['target']; ?>"><i class="fa-brands fa-twitter"></i></a>
									</li>
									<?php endif; ?>
									<?php if($facebook_link != ""): ?>
									<li>
										<a href="<?php echo isset($facebook_link['url'])?$facebook_link['url']:'#'; ?>"><i class="fa-brands fa-facebook-f"></i></a>
									</li>
									<?php endif; ?>
									<?php if($instagram_link != ""): ?>
									<li>
										<a href="<?php echo isset($instagram_link['url'])?$instagram_link['url']:'#'; ?>"><i class="fa-brands fa-instagram"></i></a>
									</li>
									<?php endif; ?>
									<?php if($linkedin_link != ""): ?>
									<li>
										<a href="<?php echo isset($linkedin_link['url'])?$linkedin_link['url']:'#'; ?>"><i class="fa-brands fa-linkedin-in"></i></a>
									</li>
									<?php endif; ?>
									<?php if($tiktok_link != ""): ?>
									<li>
										<a href="<?php echo isset($tiktok_link['url'])?$tiktok_link['url']:'#'; ?>"><i class="fa-brands fa-tiktok"></i></a>
									</li>
									<?php endif; ?>
									<?php if($youtube_link != ""): ?>
									<li>
										<a href="<?php echo isset($youtube_link['url'])?$youtube_link['url']:'#'; ?>"><i class="fa-brands fa-youtube"></i></a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
			<div class="site-info p-small">
				<a href="<?php echo site_url(); ?>">
				<span class="rights"><?php echo $footer_copyright_text; ?> </span>
				</a>
			</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
