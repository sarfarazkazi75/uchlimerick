<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_page_404
 *
 * @package uchlimerick
 */

	get_header();
	$page_404 = get_field('page_404', 'options');
?>
	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container-inner">
			<header class="page-header">
				<?php if( $page_404['404_title'] ): ?><h1 class="page-title"><?php echo $page_404['404_title']; ?></h1><?php endif; ?>
			</header><!-- .page-header -->

			<div class="page-content">
				<?php if( $page_404['404_subtitle'] ): ?><?php echo $page_404['404_subtitle']; ?><?php endif; ?>
				<?php if( $page_404['404_home_link'] ): ?><a href="<?php echo esc_html( $page_404['404_home_link']['url'] ); ?>" class="button button-dark"><?php echo esc_html( $page_404['404_home_link']['title'] ); ?></a><?php endif; ?>
			</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->
<?php
get_footer();
