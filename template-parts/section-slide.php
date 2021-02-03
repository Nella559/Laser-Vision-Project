<?php 
if(have_rows('slide')) : ?>
<div id="slide">
    <?php 
        while( have_rows('slide')) : the_row();
        $slide_image = get_sub_field('slide_background_image');
        $slide_title = get_sub_field('slide_title');
        $slide_subtitle = get_sub_field('slide_subtitle');
        $slide_info = get_sub_field('slide_info');
    ?>
    <div class="slide-bg" style="background-image:url(<?php echo wp_get_attachment_url($slide_image, 'full'); ?>);">
        <div class="container">
            <div class="slide__wrapper">
                <h2><?php echo $slide_title ?></h2>
                <h3><?php echo $slide_subtitle ?></h3>
                <p><?php echo $slide_info ?></p>
            </div>
        </div>
    </div>
    <?php
    endwhile;
    ?>
</div>

<?php
endif;
?>

