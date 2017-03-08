<?php get_header() ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        $main_image = ot_get_option( 'main_picture' ); 
                        if(isset($main_image['background-image'])):
                            echo "<img class='img-responsive circle-border' src='{$main_image['background-image']}' alt=''>";        
                        else:
                    ?>
                    
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/img/profile.png" alt="">
                    
                    <?php endif ?>

                    <div class="intro-text">
                        <span class="name"><?php echo ot_get_option( 'main_title' ); ?></span>
                        <hr class="star-light">
                        <span class="skills"><?php echo ot_get_option( 'main_subtitle' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo ot_get_option('portfolio_title') ?></h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
            
                <?php
                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => -1, // -1 mean show all data
                        'post_status' => 'publish'
                    );

                    $the_query = new WP_Query($args);
                    $total_number = $the_query->found_posts;

                    // loop
                    while ($the_query->have_posts()) : $the_query->the_post(); 
                ?>
            
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php the_ID() ?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive', 'alt' => get_the_title())) ?>
                    </a>
                </div>

                <?php endwhile; wp_reset_query(); ?>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo ot_get_option( 'about_title' ); ?></h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2"><?php echo ot_get_option( 'about_text_left' ); ?></div>
                <div class="col-lg-4"><?php echo ot_get_option( 'about_text_right' ); ?></div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo ot_get_option( 'contact_title' ); ?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo do_shortcode('[contact-form-7 id="' . wp_freelacer_wpcf7_first_id() . '"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Modals -->
    <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1, // -1 mean show all data
            'post_status' => 'publish'
        );

        $the_query = new WP_Query($args);
        $total_number = $the_query->found_posts;

        // loop
        while ($the_query->have_posts()) : $the_query->the_post(); 
    ?>

    <div class="portfolio-modal modal fade" id="portfolioModal<?php the_ID() ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php the_title() ?></h2>
                            <hr class="star-primary">
                            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive img-centered', 'alt' => get_the_title())) ?>
                            <p><?php the_content() ?></p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="<?php the_field('client_url') ?>" target="_blank">
                                        <?php the_field('client') ?></a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><?php the_field('date') ?></strong>
                                </li>
                                <li>Service:
                                    <strong>
                                    <?php
                                        $terms = get_the_terms(get_the_ID(), 'service');
                                        if (! is_wp_error($terms)) {
                                            $term_links = wp_list_pluck($terms, 'name');
                                            $term_text = implode(", ", $term_links);
                                            echo $term_text;
                                        }
                                        else {
                                            echo 'Uncategorized';
                                        }
                                    ?>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; wp_reset_query(); ?>

<?php get_footer() ?>