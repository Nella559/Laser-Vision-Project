<section class="specialists">

    <?php $specialists_image = get_field( 'specialists_image' );
        $size = 'full'; ?>
    <?php if ( $specialists_image ) : ?>
        <div class="specialists__bg" style="background-image:url(<?php echo wp_get_attachment_url($specialists_image, $size); ?>);">
            <?php endif; ?>
            <div class="container">
                <div class="specialists__wrapper">
                    <div class="specialists__heading">
                        <h2><?php the_field( 'specialists_heading' ); ?></h2>
                    </div>
                    <div class="specialists__description">
                        <p><?php the_field( 'specialists_description' ); ?></p>
                    </div>
                    <div class="specialists__link">
                    <?php $specialists_link = get_field( 'specialists_link' );
                    if ( $specialists_link ) : ?>
                            <a class="white_btn" href="<?php echo esc_url( $specialists_link['url'] ); ?>" target="<?php echo esc_attr( $specialists_link['target'] ); ?>"><?php echo esc_html( $specialists_link['title'] ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


</section>


