<section class="links">
    <div class="container">
        <div class="links__wrapper">
        <?php

        // Check rows exists.
        if( have_rows('links') ):

            // Loop through rows.
            while( have_rows('links') ) : the_row();

                // Load sub field value.
                $bg_image = get_sub_field('images');
                $link = get_sub_field('link');
                $description = get_sub_field('description');
                ?>
                <div class="links-image" style="background-image:url(<?php echo wp_get_attachment_url($bg_image); ?>);">
                        <div class="links-link">
                                <?php 
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="links-item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            
                        </div>
                        <div class="links-description">
                                <p class="links-paragraph"><?php echo $description ?></p>
                        </div>
                </div>
                
                <?php
            // End loop.
            endwhile;

        // No value.
        else :
            // Do something...
        endif; ?>

        </div>
    </div>

</section>