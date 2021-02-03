<?php 
    $posts = get_posts( [
        'post-type' => 'post',
        'post_status' => 'publish'
    ]);
    if( $posts ){ 
        ?>
        <section class="news">
            <div class="container">
                <?php 
                    $title_articles = get_field('articles_title');
                    if($title_articles) {
                        ?>
                        <h2 class="news-title"><?php echo $title_articles ?></h2>
                    <?php } ?>

                    <div class="news__wrapper">
                        <?php
                            $args = array(
                                'numberposts' => 3,
                                'posts_status' => 'publish',
                            );
                            $results = wp_get_recent_posts( $args );
                            foreach( $results as $p ){ ?>
                                <div class="news__col">
                                    <div class="news__image" style="background-image: url(<?php echo get_the_post_thumbnail_url($p['ID'], 'full'); ?>);"></div>
                                    <div class="news__info">
                                        <div class="news__title">
                                            <h4><?php echo $p['post_title'] ?></h4>
                                        </div>
                                        <div class="news__details">
                                            <span><?php echo date('j F, Y', strtotime($p['post_date'])); ?></span>
                                            <span> . </span>
                                            <div class="news__links">
                                                <?php 
                                                    $post_categories = wp_get_post_categories( $p['ID']);
                                                    $treatments = array();
                                                    foreach($post_categories as $c){
                                                        $treatment = get_category( $c)
                                                    }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            }

                    </div>

            </div>
        </section>
    } 





