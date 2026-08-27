<?php

// 1. Setup Theme Features
function herring_theme_setup() {
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    register_nav_menus( array(
        'primary-menu' => __( 'Primary Navigation', 'herring' ),
        'footer-menu'  => __( 'Footer Navigation', 'herring' ),
    ) );
}
add_action( 'after_setup_theme', 'herring_theme_setup' );

// Stylesheets and Scripts
function herring_enqueue_assets() {
    wp_enqueue_style( 'herring-google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap', array(), null );
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', array(), '5.3.8' );
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2' );

    wp_enqueue_style( 'herring-main-style', get_stylesheet_uri(), array( 'bootstrap-css' ), '1.0' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array(), '5.3.8', true );
}
add_action( 'wp_enqueue_scripts', 'herring_enqueue_assets' );


function herring_get_cat_url( $slug ) {
    $cat = get_category_by_slug( $slug );
    return $cat ? esc_url( get_category_link( $cat->term_id ) ) : '#';
}

// Prevent WordPress from scanning child categories on parent archive pages
function herring_optimize_category_queries( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_category() ) {
        $query->set( 'include_children', false );
    }
}
add_action( 'pre_get_posts', 'herring_optimize_category_queries' );


function herring_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'herring_excerpt_more' );

function herring_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'herring_banner_section', array(
        'title'    => __( 'Top Announcement Banner', 'herring' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'herring_banner_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'herring_banner_text', array(
        'label'    => __( 'Banner Message', 'herring' ),
        'section'  => 'herring_banner_section',
        'type'     => 'text',
        'description' => __( 'Leave empty to hide the banner completely.', 'herring' ),
    ) );
}
add_action( 'customize_register', 'herring_customize_register' );
