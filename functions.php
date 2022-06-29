<?php

// Theme configaration

function lwhh_setup()
{

    load_theme_textdomain('lwhh');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu( 'topmenu', __('Top Menu', 'lwhh'));
    register_nav_menu( 'footermenu', __('Footer Menu', 'lwhh'));
}

add_action('after_setup_theme', 'lwhh_setup');

// Load styles

function lwhh_assets()
{
    wp_enqueue_style('lwhh_style', get_stylesheet_uri());
    wp_enqueue_style('assets_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}

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

}

add_filter( "protected_title_format", "lwhh_protected_title_formate_change" );


// For adding a class for modifing nav menu

function lwhh_menu_item_class($classes , $item) {

    $classes[] = "list-inline-item";
    return $classes;
}

add_filter( "nav_menu_css_class", "lwhh_menu_item_class", 10, 2);
