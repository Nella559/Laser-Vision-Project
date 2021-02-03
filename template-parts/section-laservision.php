


<section class="laservision">
    
        <div class="laservision__wrapper">
        <?php
            // Check value exists.
            if( have_rows('laservision') ):

                // Loop through rows.
                while ( have_rows('laservision') ) : the_row();

                    // Case: Image layout.
                    if( get_row_layout() == 'laservision_image' ):
                        $image_laservision = get_sub_field('laservision_image');
                       
                        // Do something...
                        ?>
            <div class="laservision_img">
                        <?php echo wp_get_attachment_image($image_laservision, 'large') ?>
            </div>
            <?php
                // Case: Download layout.
                elseif( get_row_layout() == 'laservision_description' ): 
                    $heading_laservision = get_sub_field('laservision_heading');
                    $description_laservision = get_sub_field('laservision_paragraph');
                    $button_laservision = get_sub_field('laservion_btn');
                    // Do something...

                endif;

                // End loop.
                endwhile;

                // No value.
                else :
                    // Do something...
                endif;
                ?>
            <div class="laservision_description">
                <div class="laservision__title">
                    <h2><?php echo $heading_laservision ?></h2>
                </div>
                <div class="laservision__paragraph">
                    <p><?php echo $description_laservision ?></p>
                </div>
                <div class="laservision__btn">
                <?php 
                    if( $button_laservision ): 
                        $link_laservision_url = $button_laservision['url'];
                        $link_laservision_title = $button_laservision['title'];
                        $link_laservision_target = $button_laservision['target'] ? $button_laservision['target'] : '_self';
                        ?>
                        <a class="btn" href="<?php echo esc_url( $link_laservision_url ); ?>" target="<?php echo esc_attr( $link_laservision_target ); ?>"><?php echo esc_html( $link_laservision_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    

</section>