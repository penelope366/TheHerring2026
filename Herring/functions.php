<?php

// 1. Setup Theme Features
function herring_theme_setup() {
    // Add support for Featured Images (Post Thumbnails)
    add_theme_support( 'post-thumbnails' );

    // Let WordPress manage the <title> tag automatically
    add_theme_support( 'title-tag' );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Navigation', 'herring' ),
        'footer-menu'  => __( 'Footer Navigation', 'herring' ),
    ) );
}
add_action( 'after_setup_theme', 'herring_theme_setup' );


// 2. Enqueue Stylesheets and Scripts
function herring_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style( 'herring-google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap', array(), null );

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', array(), '5.3.8' );

    // FontAwesome Icons
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2' );

    // Main Theme Stylesheet (style.css)
    wp_enqueue_style( 'herring-main-style', get_stylesheet_uri(), array( 'bootstrap-css' ), '1.0' );

    // Bootstrap JS Bundle
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array(), '5.3.8', true );
}
add_action( 'wp_enqueue_scripts', 'herring_enqueue_assets' );


// 3. Customize Excerpt Length for Post Summaries
function herring_custom_excerpt_length( $length ) {
    return 25; // Displays first 25 words on homepage cards
}
add_filter( 'excerpt_length', 'herring_custom_excerpt_length', 999 );


// 4. Change Excerpt Read More String
function herring_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'herring_excerpt_more' );