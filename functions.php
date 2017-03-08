<?php 

// include css and js
add_action( 'wp_enqueue_scripts', 'wp_freelancer_add_theme_scripts' );
function wp_freelancer_add_theme_scripts() {
  	wp_enqueue_style( 'style', get_stylesheet_uri() );

  	// css
  	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all');
  	wp_enqueue_style( 'freelancer', get_template_directory_uri() . '/css/freelancer.min.css', array(), '1.1', 'all');
 	
  	// fonts
  	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css', array(), '1.1', 'all');
  	wp_enqueue_style( 'gfonts-Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', array(), '1.1', 'all');
  	wp_enqueue_style( 'gfonts-Lato', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', array(), '1.1', 'all');

  	// javascripts
  	wp_enqueue_script( 'jquery' );
  	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
  	wp_enqueue_script( 'easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'freelancer', get_template_directory_uri() . '/js/freelancer.min.js', array ( 'jquery' ), 1.1, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      	wp_enqueue_script( 'comment-reply' );
    }
}

// action init
add_action( 'init', 'wp_freelancer_init' );
function wp_freelancer_init() {
    // register menu
    register_nav_menu('header-menu',__( 'Header Menu' ));

    // add theme support thumbnail
    add_theme_support( 'post-thumbnails' );

    // register custom post type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add Portfolio',
            'add_new_item' => 'Add Portfolio Item',
            'edit' => 'Edit',
            'edit_item' => 'Edit Portfolio',
            'new_item' => 'New Portfolio',
            'view' => 'View',
            'view_item' => 'View Portfolio',
            'search_items' => 'Search Portfolio',
            'not_found' => 'No Portfolios Found',
            'not_found_in_trash' => 'No Portfolio found in the trash',
            'parent' => 'Parent Portfolio view'
        ),
        'public' => true,            
        'supports' => array( 'editor','title','thumbnail'),            
        'has_archive' => true,
        'menu_position' => 5, // places menu item directly below Posts
        'menu_icon' => 'dashicons-image-filter'
    ));

    // register custom taxonomy
    register_taxonomy('service', array('portfolio'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Service', 'taxonomy general name' ),
            'singular_name' => _x( 'Service', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Service' ),
            'all_items' => __( 'All Service' ),
            'parent_item' => __( 'Parent Service' ),
            'parent_item_colon' => __( 'Parent Service:' ),
            'edit_item' => __( 'Edit Service' ), 
            'update_item' => __( 'Update Service' ),
            'add_new_item' => __( 'Add New Service' ),
            'new_item_name' => __( 'New Service Name' ),
            'menu_name' => __( 'Service' ),
            ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'service' ),
    ));
}

// add class to li navbar
add_filter( 'nav_menu_css_class', 'wp_freelancer_li_class', 10, 3 );
function wp_freelancer_li_class( $classes, $item, $args ) {
    if ( 'header-menu' === $args->theme_location ) {
        $classes[] = 'page-scroll';
    }

    return $classes;
}

// contact form 7 template
add_filter('wpcf7_default_template', 'wp_freelacer_wpcf7_default_template', 10, 2);
function wp_freelacer_wpcf7_default_template($template, $prop) {
    if($prop == 'form') {
        $template = implode('', array(
            '<div class="row control-group">',
            '<div class="form-group col-xs-12 floating-label-form-group controls">',
            '<label> Your Name (required)</label>',
                '[text* your-name placeholder "Name"]',
            '</div>',
            '</div>',

            '<div class="row control-group">',
            '<div class="form-group col-xs-12 floating-label-form-group controls">',
            '<label> Your Email (required)</label>',
                '[email* your-email placeholder "Email"]',
            '</div>',
            '</div>',

            '<div class="row control-group">',
            '<div class="form-group col-xs-12 floating-label-form-group controls">',
            '<label> Subject</label>',
                '[text your-subject placeholder "Subject"]',
            '</div>',
            '</div>',

            '<div class="row control-group">',
            '<div class="form-group col-xs-12 floating-label-form-group controls">',
            '<label> Your Message</label>',
                '[textarea your-message placeholder "Message"]',
            '</div>',
            '</div>',

            '<div class="row">',
            '<div class="form-group col-xs-12">',
            '[submit class:btn class:btn-success class:btn-lg "Send"]',
            '</div>',
            '</div>',
        ));
    }
    
    return $template;
}

function wp_freelacer_wpcf7_first_id() {
    $the_query = new WP_Query(array(
        'post_type' => 'wpcf7_contact_form', 
        'posts_per_page' => 1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ));

    /* result */
    if($the_query->have_posts()) {
        while( $the_query->have_posts() ) : $the_query->the_post();
        return get_the_ID();
        endwhile; wp_reset_query();    
    }
    else {
        return false;
    }
}

// avoid fatal error if no acf plugin installed
if(! function_exists('the_field')) {
    function the_field($field) {
        echo $field;
    }

    function get_field($field) {
        return $field;
    }
}

/**
 * OptionTree in Theme Mode
 */
require( trailingslashit(get_template_directory()) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory()) . 'theme-options.php' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );

// change OptionTree header
add_action('ot_header_list', 'wp_freelacer_ot_header_list');
function wp_freelacer_ot_header_list() {
   echo '<li id="theme-version"><span>WP Freelancer</span></li>';
   echo '<li id="theme-version"><span>WordPress Theme by <a href="https://github.com/harisrozak">Haris</a></span></li>';
}
