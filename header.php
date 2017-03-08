<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php wp_head(); ?>
</head>

<body id="page-top" <?php body_class(); ?>>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>#page-top"><?php bloginfo( 'name' ); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php 
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu( array( 
                        'theme_location' => 'header-menu',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse'
                    ) ); 
                }
            ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>