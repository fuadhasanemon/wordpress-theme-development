<?php
/* Template Name: AJAX Load */

// Forces sidebar-content layout setting.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

/* Relocates entry header */
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

add_action( 'genesis_before_content_sidebar_wrap', 'genesis_entry_header_markup_open' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_post_title' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_entry_header_markup_close' );

// Removes Primary Sidebar from the Primary Sidebar area.
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

add_action( 'genesis_sidebar', 'sk_show_post_links' );
/**
 * Outputs links to all the posts in the Primary Sidebar area.
 */
function sk_show_post_links() {

    // WP_Query arguments.
    $args = array(
        'posts_per_page' => '-1',
        'post_type' => 'gs_faq',
    );

    // The Query.
    $query = new WP_Query( $args );

    // The Loop.
    if ( $query->have_posts() ) {
        echo '<ul>';
        while ( $query->have_posts() ) {
            $query->the_post();
            printf( '<li><a href="%s" class="post-link" data-id="%s">%s</a></li>',
                esc_url( get_the_permalink() ),
                get_the_ID(),
                esc_html( get_the_title() )
            );
        }
        echo '</ul>';
    } else {
        // no posts found.
    }

    // Restore original Post Data.
    wp_reset_postdata();

}

add_action( 'wp_enqueue_scripts', 'sk_load_post_script' );
/**
 * Passes WP AJAX URL and loading image URL to `load-post.js` and loads it in the footer.
 */
function sk_load_post_script() {

    wp_enqueue_script(
        'sk-loadpost',
        get_stylesheet_directory_uri() . '/js/load-post.js',
        array( 'jquery' ),
        CHILD_THEME_VERSION,
        true
    );

    wp_localize_script(
        'sk-loadpost',
        'sk_ajaxobject',
        array(
            'ajaxurl'       => admin_url( 'admin-ajax.php' ),
            'loadingimage'  => get_stylesheet_directory_uri() . '/images/loading.gif',
        )
    );

}

genesis();