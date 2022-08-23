<?php
    $venue_hire_data = get_field('venue_hire_data', 'option');  
?>
<section class="venue-hire">
    <div class="venue-row">
        <?php if( $venue_hire_data['venue_hire_image'] ): ?><img src="<?php echo esc_url( $venue_hire_data['venue_hire_image']['url'] ); ?>" title="image" alt="image" class="img-100"><?php endif; ?>
        <div class="container-inner">
        <div class="venue-text">
                <?php if( $venue_hire_data['venue_hire_title'] ): ?><h3 class=""><?php echo $venue_hire_data['venue_hire_title']; ?></h3><?php endif; ?>
                <?php if( $venue_hire_data['venue_hire_subtitle'] ): ?><p><?php echo $venue_hire_data['venue_hire_subtitle']; ?></p><?php endif; ?>
                <div class="btn-wrapper">
                    <?php if( $venue_hire_data['read_more_link'] ): ?><a href="<?php echo esc_url( $venue_hire_data['read_more_link']['url'] ); ?>" target="<?php echo esc_url( $venue_hire_data['read_more_link']['target'] ); ?>" class="button button-dark"><?php echo esc_html( $venue_hire_data['read_more_link']['title'] ); ?></a><?php endif; ?>
                    <?php if( $venue_hire_data['contact_us_link'] ): ?><a href="<?php echo esc_url( $venue_hire_data['contact_us_link']['url'] ); ?>"  target="<?php echo esc_url( $venue_hire_data['contact_us_link']['target'] ); ?>" class="button-light button"><?php echo esc_html( $venue_hire_data['contact_us_link']['title'] ); ?></a><?php endif; ?>
               </div>
        </div>
    </div>
    </div>
</section>