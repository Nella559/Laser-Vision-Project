<section class="services">
    <div class="container">
        <div class="services__blocks">
            <?php

                // Check rows exists.
                if( have_rows('services') ):

                    // Loop through rows.
                    while( have_rows('services') ) : the_row();

                        // Load sub field value.
                        $services_icon = get_sub_field('services_icon');
                        $services_title = get_sub_field('services_title');
                        $services_link = get_sub_field('services_link');
                        ?>
                        
                            <div class="services__wrapper">
                                <div class="services__icon">
                                    <?php if($services_icon) {
                                        echo wp_get_attachment_image( $services_icon, 'full' );
                                    } ?>
                                </div>
                                <div class="services__title">
                                    <h3><?php echo $services_title ?></h3>
                                </div>
                                <div class="services__link">
                                <?php 
                                    if( $services_link ): 
                                        $services_url = $services_link['url'];
                                        $services_link_title = $services_link['title'];
                                        $services_target = $services_link['target'] ? $services_link['target'] : '_self';
                                        ?>
                                        <a class="btn" href="<?php echo esc_url( $services_url ); ?>" target="<?php echo esc_attr( $services_target ); ?>"><?php echo esc_html( $services_link_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                    
                    <?php
                    endwhile;

                // No value.
                else :
                    // Do something...
                endif; 
                ?>
        </div>
    </div>
</section>