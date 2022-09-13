<!-- book now section  -->
<?php
global $post;
$events = get_post_meta($post->ID,'events',true);
// print_r($events);
/*
date_default_timezone_set('UTC');
$today = date("Y-m-d g:i a");
$args     = array(
    'post_type'      =>'show',
    'posts_per_page' => -1,
    'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
    'meta_key' => 'uchlimerick_post_show_start_date',
    'orderby' => 'meta_value',
    'order'  => 'ASC',
    'post__not_in'   => array(get_the_ID()),
    'meta_query' => array(
        array(
            'key' => 'uchlimerick_post_show_start_date',
            'value' => $today,
            'compare' => '>=', //Compare $current_date with _event_start_date and show only the post with a date after or equal $current_date
            'type' => 'DATE',
            ),

     )
); 
$query = new WP_query($args);
*/
?>
<section class="book-now" id="book_now">
    <div class="book-inner bg-dark">
        <div class="book-title">
            <h3 class="bored-bottom"><?php echo _('Book Now');?></h3>
        </div>
    </div>
    <!-- tabble  -->
    <div class="custom-container">
        <div class="table-row">
            <ul>
                <li>Event</li>
                <li>date</li>
                <li>Time</li>
                <li>Book</li>
            </ul>
        </div>
        <?php
        if($events)
        {
            $events = array_reverse($events);
            foreach ($events as $event){

                
        

                $title         = $event['name'];
                $Event_title = strstr($title , '@');
                $book_ticket   = $event['url'];
                
                $evenDate = date('d M Y ',strtotime($event['opening_time_iso']['content']));
                $openDate = date('G:i a',strtotime($event['opening_time_iso']['content']));
                $opening_time=date_create($event['opening_time_iso']['content']);
                $opening_time_date= date_format($opening_time,"h:i A");
                ?>
                <div class="table-row">
                    <ul>
                        <li><?php echo str_replace('@', '' , $Event_title); ?></li>
                        <li><?php echo $evenDate; ?></li>
                        <li><?php echo $opening_time_date; ?></li>
                        <li>
                        <?php if(!empty($book_ticket)){ ?>
                            <a href="<?php echo $book_ticket;?>" class="bg-transparent button"><?php echo __("Book now",'uchlimerick');?></a>
                        <?php } ?>
                        </li>
                    </ul>
                </div>
                <?php
            }
        }
        ?>
        <?php
        /*
        if($query ->have_posts()) {
          while($query ->have_posts()) {
            $query ->the_post();
            $id            = get_the_id();
            $title         = get_the_title();
            $book_ticket   = get_field('uchlimerick_post_show_book_ticket_link',$id);
            $start_date    = get_field('uchlimerick_post_show_start_date',$id);
            $evenStartDate =new DateTime($start_date);
            ?>
            <div class="table-row">
                <ul>
                    <li><?php echo $title;?></li>
                    <li><?php echo $evenStartDate->format('d M Y');?></li>
                    <li><?php echo $evenStartDate->format('g:i a');?> 7:30pm</li>
                    <?php if(!empty($book_ticket)){ ?>
                    <a href="<?php echo $book_ticket['url'];?>" class="bg-transparent button"><?php echo $book_ticket['title'];?></a>
                    <?php } ?>
                </ul>
            </div>
    <?php
        } wp_reset_postdata();
        }
        */
        ?>
    </div>
</section>