<?php

function lwhh_setup() {


    load_theme_textdomain( 'lwhh', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'lwhh_setup' );



function lwhh_assets() {
    wp_enqueue_style( 'lwhh_style', get_stylesheet_uri());
    wp_enqueue_style( 'assets_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
}

add_action( "wp_enqueue_scripts", "lwhh_assets");


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

    $loop = new WP_Query( $args );

    // sets up the post, sets the ‘in the loop’ property to true.
    $loop->the_post();

    /* entry header */
    do_action( 'genesis_entry_header' );

    /* entry content */
    do_action( 'genesis_before_entry_content' );

    printf( '<div %s>', genesis_attr( 'entry-content' ) );
    do_action( 'genesis_entry_content' );
    echo '</div>';

    do_action( 'genesis_after_entry_content' );

    /* entry footer */
    do_action( 'genesis_entry_footer' );

    // restores original post data.
    wp_reset_postdata();

    // prevents echoing out `0` via the die function in admin-ajax.php, in addition to the above output.
    die();

}