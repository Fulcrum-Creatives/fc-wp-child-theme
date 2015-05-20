<?php
/* Load Parent Stylesheets
================================================================================*/
if( !function_exists( 'fcwp_load_parent_stylesheets' ) ) :
	function fcwp_load_parent_stylesheets() {
		// Load the main stylesheet.
		wp_enqueue_style( 'parent-style', FCWP_URI . '/style.css', array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_parent_stylesheets' );
endif;

/* Theme Setup
================================================================================*/
if( !function_exists( 'fcwp_theme_support' ) ) :
	function fcwp_theme_support() {
		// Load taxdomain
		load_theme_textdomain( FCWP_TAXDOMAIN, get_template_directory() . '/languages' );
	    // Automatic Feed Support
	    // add_theme_support( 'automatic-feed-links' );
	    // Title Tage Support
	    add_theme_support( 'title-tag' );
	    // Post Thumbnails
	    add_theme_support( 'post-thumbnails' );
	    // Post Formats
	    $post_formats_args = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	    // add_theme_support( 'post-formats', $post_formats_args );
	    // HTML5 Support
	    $html5_args = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' );
	    // add_theme_support( 'html5', $html5_args );
	    // Custom Background
	    $custom_background_args = array(
	        'default-color'          => '',
	        'default-image'          => '',
	        'default-repeat'         => '',
	        'default-position-x'     => '',
	        'wp-head-callback'       => '_custom_background_cb',
	        'admin-head-callback'    => '',
	        'admin-preview-callback' => ''
	    );
	    // add_theme_support( 'custom-background', $custom_background_args );
	    // Custom Header
	    $custom_header_args = array(
	        'default-image'          => '',
	        'random-default'         => false,
	        'width'                  => 0,
	        'height'                 => 0,
	        'flex-height'            => false,
	        'flex-width'             => false,
	        'default-text-color'     => '',
	        'header-text'            => true,
	        'uploads'                => true,
	        'wp-head-callback'       => '',
	        'admin-head-callback'    => '',
	        'admin-preview-callback' => '',
	    );
	    // add_theme_support( 'custom-header', $custom_header_args );
	    // Register Nav Menus*/
	    register_nav_menus( array(
	        'primary' => __( 'Primary', FCWP_TAXDOMAIN ),
	    ) );
	}
	add_action( 'after_setup_theme', 'fcwp_theme_support' );
endif;

/* Load Stylesheets
================================================================================*/
if( !function_exists( 'fcwp_load_stylesheets' ) ) :
	function fcwp_load_stylesheets() {
		// Load the main stylesheet.
		wp_enqueue_style( 'prefix-style', FCWP_STYLESHEETURI, array(), '1.0.0' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'prefix-ie8-style', FCWP_URI . '/css/ie8.style.css', array( 'prefix-style' ), '1.0.0' );
		wp_style_add_data( 'prefix-ie8-style', 'conditional', 'if IE 8' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'prefix-ie9-style', FCWP_URI . '/css/ie9.style.css', array( 'prefix-style' ), '1.0.0' );
		wp_style_add_data( 'prefix-ie9-style', 'conditional', 'if IE 9' );
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_stylesheets' );
endif;

/* Load JavaScript
================================================================================*/
if( !function_exists( 'fcwp_load_child_javascript' ) ) :
	function fcwp_load_child_javascript() {
	    // scripts.min.js
	    /*wp_register_script( 'scripts.min.js', FCWP_URI . '/js/scripts.min.js', false, '1.0.0', true );
	    wp_enqueue_script( 'scripts.min.js' );*/
	    // comment reply
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_child_javascript' );
endif;

/* Sidebar Widget Area
===============================================================================*/
if( !function_exists( 'fcwp_register_custom_sidebars' ) ) :
	function fcwp_register_custom_sidebars() {
	    register_sidebar( array(
	        'name'          => __( 'Sidebar', FCWP_TAXDOMAIN ),
	        'id'            => 'sidebar',
	        'description'   => '',
	        'class'         => '',
	        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	        'after_widget'  => '</li>',
	        'before_title'  => '<h2 class="widgettitle">',
	        'after_title'   => '</h2>'
	    ));
	}
	add_action( 'widgets_init', 'fcwp_register_custom_sidebars' );
endif;