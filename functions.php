<?php

// Theme configaration

<<<<<<< HEAD
    load_theme_textdomain( 'lwhh', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menu( 'topmenu', __('Top Menu','lwhh') );
    register_nav_menu( 'footermenu', __('Footer Menu','lwhh') );
    add_theme_support( 'widgets' );

=======
function lwhh_setup()
{

    load_theme_textdomain('lwhh');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu( 'topmenu', __('Top Menu', 'lwhh'));
    register_nav_menu( 'footermenu', __('Footer Menu', 'lwhh'));
>>>>>>> cb63854d48816e5c5c90a1f486d0896b58c83c30
}

add_action('after_setup_theme', 'lwhh_setup');

// Load styles

function lwhh_assets()
{
    wp_enqueue_style('lwhh_style', get_stylesheet_uri());
    wp_enqueue_style('assets_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}

<<<<<<< HEAD
add_action( "wp_enqueue_scripts", "lwhh_assets");



// Register sidebar

function lwhh_sidebar(){
    register_sidebar( 
        array(
            'name'           => __('Single Post Sidebar', 'lwhh' ),
            'id'             => 'sidebar-1',
            'description'    => __('Right Sidebar', 'lwhh' ),
            'class'          => '',
            'before_widget'  => '<li id="%1$s" class="widget %2$s">',
            'after_widget'   => "</li>\n",
            'before_title'   => '<h2 class="widgettitle">',
            'after_title'    => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar'  => '',
            'show_in_rest'   => false,
        ) 
    );

    register_sidebar( 
        array(
            'name'           => __('Footer Widget Left', 'lwhh' ),
            'id'             => 'footer-1',
            'description'    => __('Footer Left', 'lwhh' ),
            'class'          => '',
            'before_widget'  => '<li id="%1$s" class="widget %2$s">',
            'after_widget'   => "</li>\n",
            'before_title'   => '<h2 class="widgettitle">',
            'after_title'    => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar'  => '',
            'show_in_rest'   => false,
        ) 
    );

    register_sidebar( 
        array(
            'name'           => __('Footer Widget Right', 'lwhh' ),
            'id'             => 'footer-2',
            'description'    => __('Footer Right', 'lwhh' ),
            'class'          => '',
            'before_widget'  => '<li id="%1$s" class="widget %2$s">',
            'after_widget'   => "</li>\n",
            'before_title'   => '<h2 class="widgettitle">',
            'after_title'    => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar'  => '',
            'show_in_rest'   => false,
        ) 
    );
}

add_action( 'widgets_init', "lwhh_sidebar" );


// ajax


add_action( 'wp_ajax_nopriv_sk_load_post', 'sk_load_post' );
add_action( 'wp_ajax_sk_load_post', 'sk_load_post' );
/**
 * Outputs entry header, entry content and entry footer for the specified post.
 */
function sk_load_post() {

    $args = array(
        'posts_per_page' => '1',
        'no_found_rows' => true,
        // set post id to the ID of the post whose title has been clicked via `load-post.js`.
        'p' => intval( $_POST['post_id'] ),
        'post_type' => get_post_type( $_POST['post_id'] ),
    );
=======
add_action("wp_enqueue_scripts", "lwhh_assets");


// Register sidebar with widgets

function lwhh_sidebar() {
        register_sidebar (
            array(
                'name'          => __('Single Post Sidebar', 'lwhh'),
                'id'            => 'sidebar-1',
                'description'   => __('right_sidebar', 'lwhh'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar (
            array(
                'name'          => __('Left Footer', 'lwhh'),
                'id'            => 'footer-1',
                'description'   => __('Left side Footer', 'lwhh'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar (
            array(
                'name'          => __('Right Footer', 'lwhh'),
                'id'            => 'footer-2',
                'description'   => __('Right side Footer', 'lwhh'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
add_action("widgets_init", "lwhh_sidebar");


// Change protected word from protected post title

function lwhh_protected_title_formate_change() {
    return "%s";
>>>>>>> cb63854d48816e5c5c90a1f486d0896b58c83c30

}

add_filter( "protected_title_format", "lwhh_protected_title_formate_change" );


// For adding a class for modifing nav menu

function lwhh_menu_item_class($classes , $item) {

    $classes[] = "list-inline-item";
    return $classes;
}

add_filter( "nav_menu_css_class", "lwhh_menu_item_class", 10, 2);
