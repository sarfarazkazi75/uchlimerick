<?php
//related post taxonomy
$args     = array(
    'post_type'      =>'show',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
);
$cats     = wp_get_post_terms(get_the_ID(), 'show_cat');
$cats_ids = array();
foreach ($cats as $related_cat) {
    $cats_ids[] = $related_cat->term_id;
}
if (!empty($cats_ids)){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'show_cat',
            'field' => 'id',
            'terms' => $cats_ids,
            'operator'=> 'IN' //Or 'AND' or 'NOT IN'
        ));
}
$related_blog_query = new wp_query($args); 
?>
<!-- You might also like  -->
<section class="you-might-like">
    <div class="container-inner">
        <div class="section-title text-border-bottom">
            <h4><?php echo _('You might also like');?></h4>
        </div>
        <div class="row">
            <?php // Loop through posts
            if(!empty($related_blog_query->posts)){
                foreach ($related_blog_query->posts as $post) {
                    setup_postdata($post);
                    $rel_title     = get_the_title();
                    $rel_permalink = get_the_permalink();
                    $rel_image     = get_the_post_thumbnail_url();
                    $book_ticket   = get_field('uchlimerick_post_show_book_ticket_link',get_the_id());
                    $start_date    = get_field('uchlimerick_post_show_start_date',get_the_id());
                    $end_date      = get_field('uchlimerick_post_show_end_date',get_the_id());
                    $evenStartDate =new DateTime($start_date);
                    $evenEndtDate  =new DateTime($end_date);?>
                    <div class="col-lg-4 col-md-4">
                        <div class="post-card" data-aos="fade-up">
                            <div class="post-image">
                                <img src="<?php echo $rel_image;?>" alt="">
                            </div>
                            <div class="post-details">
                                <h6 class="text-border-bottom"><?php echo $rel_title;?></h6>
                                <a class="post-date" href="<?php echo $rel_permalink;?>"><?php echo $evenStartDate->format('d M');?> - <?php echo $evenEndtDate->format('d M');?></a>
                                <div class="btn-wrapper book-btn-cover">
                                    <?php if(!empty($book_ticket)){ ?>
                                    <a href="<?php echo $book_ticket['url'];?>" class="button button-dark"><?php echo $book_ticket['title'];?></a>
                                    <?php } ?>
                                    <a href="<?php echo $rel_permalink;?>" class="button-light button"><?php echo _('Learn More');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } wp_reset_postdata();
            }else{
                echo '<h2>Empty</h2>';
            }
                ?>
        </div>
    </div>
</section>