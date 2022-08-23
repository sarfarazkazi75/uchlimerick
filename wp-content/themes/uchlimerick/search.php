<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package uchlimerick
 */

get_header();
?>

<?php if ( get_post_type() === 'faq' ) { ?>

<?php if (have_posts()) : ?>
<div class="search-page">
    <div class="container-inner">
        <?php while (have_posts()) : the_post(); ?>
        <?php if(isset($_GET['post_type'])) {
		        $type = $_GET['post_type'];
		           if($type == 'faq') {?>
        <a href="<?php echo get_the_permalink(); ?>">
            <h5><?php echo get_the_title(); ?></h5>
        </a>
        <p><?php echo get_the_content();?></p>

        <?php }?>
        <?php } else { ?>
        <?php } ?>
        <?php endwhile; else: ?>
        <?php endif; ?>

        <?php } else { ?>


        <main id="primary" class="site-main">
            <div class="container-inner">
                <div class="serch-main">
                    <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'uchlimerick' ), '<span>' . get_search_query() . '</span>' );
					?>
                        </h1>
                    </header><!-- .page-header -->

                    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

        </main><!-- #main -->

        <?php } ?>
    </div>
</div>
</div>
</div>
<?php
//get_sidebar();
get_footer();