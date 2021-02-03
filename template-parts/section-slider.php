<?php

// Check rows exists.
if( have_rows('slider') ): ?>
<div id="slider-home">
<?php
    // Loop through rows.
    while( have_rows('slider') ) : the_row();

        // Load sub field value.
        $slider_image = get_sub_field('slider_bg_img');
        $slider_heading = get_sub_field('slider_heading');
        $slider_description = get_sub_field('slider_description');
        $slider_button = get_sub_field('slider_btn');
        ?>
        
        <div class="slider-bg" style="background-image:url(<?php echo wp_get_attachment_url($slider_image, 'full'); ?>);">
            <div class="slider__wrapper">
                <div class="container">
                    <h1 class="slider-heading"><?php echo $slider_heading ?></h1>
                    <p class="slider-ph"><?php echo $slider_description ?></p>
                    <?php 
                    if( $slider_button ): 
                        $link_url = $slider_button['url'];
                        $link_title = $slider_button['title'];
                        $link_target = $slider_button['target'] ? $slider_button['target'] : '_self';
                        ?>
                        <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="banner-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="500" viewBox="0 0 1920 500"><path fill="#FFF" fill-rule="evenodd" d="M0,406 L0,500 L1920,500 C1920,354 1920,234 1920,140 C1280,438.666667 640,527.333333 0,406 Z"></path></svg> 
            </div>
        </div>


    <?php
    endwhile;
    ?>
    </div>
    <?php
endif;

?>





		