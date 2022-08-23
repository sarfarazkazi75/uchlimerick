<?php
$show_id     = get_the_id();
$show_video  = get_field('uchlimerick_post_show_video',$show_id); ?>
<!-- youtu video / -->
<section class="youtube-video">
    <div class="container-inner">
        <div class="video-cover">
        <?php if(!empty($show_video)){ ?>
             <?php  preg_match('/src="(.+?)"/', $show_video, $matches);
                    $src = $matches[1];
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 0
                    );
                    $new_src = add_query_arg($params, $src);
                    $show_video = str_replace($src, $new_src, $show_video);
                    $attributes = 'frameborder="0"';
                    $show_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $show_video);
                    echo $show_video;
         } ?>
        </div>
    </div>
</section>