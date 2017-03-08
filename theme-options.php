<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'top_section',
        'title'       => __( 'Top Section', 'wp-freelancer' )
      ),
      array(
        'id'          => 'portfolio',
        'title'       => __( 'Portfolio', 'wp-freelancer' )
      ),
      array(
        'id'          => 'about',
        'title'       => __( 'About', 'wp-freelancer' )
      ),
      array(
        'id'          => 'contact',
        'title'       => __( 'Contact', 'wp-freelancer' )
      ),
      array(
        'id'          => 'footer',
        'title'       => __( 'Footer', 'wp-freelancer' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'main_picture',
        'label'       => __( 'Main Picture', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'top_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'main_title',
        'label'       => __( 'Main Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'top_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'main_subtitle',
        'label'       => __( 'Main Subtitle', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'top_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_title',
        'label'       => __( 'Portfolio Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_title',
        'label'       => __( 'About Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_text_left',
        'label'       => __( 'About Text Left', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'about',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_text_right',
        'label'       => __( 'About Text Right', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'about',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_title',
        'label'       => __( 'Contact Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_left_title',
        'label'       => __( 'Footer Left Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_left_text',
        'label'       => __( 'Footer Left Text', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_title',
        'label'       => __( 'Footer Center Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_facebook',
        'label'       => __( 'Footer Center Facebook', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_gplus',
        'label'       => __( 'Footer Center GPlus', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_linkedin',
        'label'       => __( 'Footer Center Linkedin', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_wordpress',
        'label'       => __( 'Footer Center WordPress', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_center_github',
        'label'       => __( 'Footer Center Github', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_right_title',
        'label'       => __( 'Footer Right Title', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_right_text',
        'label'       => __( 'Footer Right Text', 'wp-freelancer' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}