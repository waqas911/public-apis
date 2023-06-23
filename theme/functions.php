<?php

/*** Adding featured image support 	*/
function theme_featured_images() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'theme_featured_images' );


// Adding navigation menu support
function theme_name_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => esc_html__( 'Primary Menu', 'theme-domain' ),
            // Add more menu locations if needed
            // 'secondary-menu' => esc_html__( 'Secondary Menu', 'theme-domain' ),
        )
    );
}
add_action( 'after_setup_theme', 'theme_name_register_menus' );



// Enable Widgets Support
function theme_widgets_init() {
    // Register a widget area for the sidebar
    register_sidebar(array(
        'name'          => __('Sidebar', 'your-theme-textdomain'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in the sidebar.', 'your-theme-textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'theme_widgets_init');




// Register Custom Post Type project
function create_project_cpt() {

	$labels = array(
		'name' => _x( 'projects', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'project', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'projects', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'project', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'project Archives', 'textdomain' ),
		'attributes' => __( 'project Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent project:', 'textdomain' ),
		'all_items' => __( 'All projects', 'textdomain' ),
		'add_new_item' => __( 'Add New project', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New project', 'textdomain' ),
		'edit_item' => __( 'Edit project', 'textdomain' ),
		'update_item' => __( 'Update project', 'textdomain' ),
		'view_item' => __( 'View project', 'textdomain' ),
		'view_items' => __( 'View projects', 'textdomain' ),
		'search_items' => __( 'Search project', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into project', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'textdomain' ),
		'items_list' => __( 'projects list', 'textdomain' ),
		'items_list_navigation' => __( 'projects list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter projects list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'project', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-editor-table',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'create_project_cpt', 0 );




// Register custom taxonomy "Project type" Under projects CPT
function register_project_type_taxonomy() {
    $labels = array(
        'name'                       => 'Project Types',
        'singular_name'              => 'Project Type',
        'menu_name'                  => 'Project Types',
        'all_items'                  => 'All Project Types',
        'edit_item'                  => 'Edit Project Type',
        'view_item'                  => 'View Project Type',
        'update_item'                => 'Update Project Type',
        'add_new_item'               => 'Add New Project Type',
        'new_item_name'              => 'New Project Type Name',
        'search_items'               => 'Search Project Types',
        'popular_items'              => 'Popular Project Types',
        'separate_items_with_commas' => 'Separate Project Types with commas',
        'add_or_remove_items'        => 'Add or remove Project Types',
        'choose_from_most_used'      => 'Choose from the most used Project Types',
        'not_found'                  => 'No Project Types found',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-type' ),
    );

    register_taxonomy( 'project_type', 'project', $args );
}
add_action( 'init', 'register_project_type_taxonomy', 0 );



// Code to redirect user away from website based on Server IP Address


function redirect_ip_range() {
    $user_ip = $_SERVER['REMOTE_ADDR'];
    
    // Check if the user's IP address starts with "77.29"
    if (strpos($user_ip, '77.29') === 0) {
        wp_redirect('https://google.com'); // Replace 'https://example.com' with your desired redirect URL
        exit();
    }
}
add_action('template_redirect', 'redirect_ip_range');

/*

// Code to redirect user away from website based on custom IP Address

function redirect_ip_range() {
    // Simulate a different IP address for testing
    $user_ip = '77.29.123.45'; // Replace with the IP you want to test

    // Check if the user's IP address starts with "77.29"
    if (strpos($user_ip, '77.29') === 0) {
        wp_redirect('https://medcaremso.com'); // Replace 'https://example.com' with your desired redirect URL
        exit();
    }
}
add_action('template_redirect', 'redirect_ip_range');
*/

// Custom function to retrieve and display Kanye quotes

function kanye_quote_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'count' => 1, // Default count is 1
        ),
        $atts,
        'kanye_quote'
    );

    $count = absint($atts['count']); // Ensure count is a positive integer

    $quotes = array();

    for ($i = 0; $i < $count; $i++) {
        $response = wp_remote_get('https://api.kanye.rest/');
        if (is_wp_error($response)) {
            $quotes[] = 'Oops! Unable to fetch Kanye quotes. Please try again later.';
        } else {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
            if (!$data) {
                $quotes[] = 'Oops! Unable to decode Kanye quotes response. Please try again later.';
            } else {
                $quote = isset($data->quote) ? $data->quote : '';
                if (empty($quote)) {
                    $quotes[] = 'Oops! Unable to find a Kanye quote. Please try again later.';
                } else {
                    $quotes[] = $quote;
                }
            }
        }
    }

    $output = '<ul>';

    foreach ($quotes as $quote) {
        $output .= '<li>"' . esc_html($quote) . '" - Kanye West</li>';
    }

    $output .= '</ul>';

    return $output;
}
add_shortcode('kanye_quote', 'kanye_quote_shortcode');




// Register Coffee Widget
function theme_coffee_widgets_init() {
    // Register your widget areas here
    register_sidebar(array(
        'name' => 'Coffee',
        'id' => 'coffee',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    // Add more widget areas if needed
}
add_action('widgets_init', 'theme_coffee_widgets_init');






function hs_give_me_coffee_shortcode($atts) {
    // Make a request to the Random Coffee API
    $response = wp_remote_get('https://coffee.alexflipnote.dev/random');

    // Check if the request was successful
    if (is_wp_error($response)) {
        return 'Oops! Unable to fetch coffee. Please try again later.';
    }

    // Retrieve the response body
    $body = wp_remote_retrieve_body($response);

    // Decode the JSON response
    $data = json_decode($body);

    // Extract the direct link to the coffee
    $coffeeLink = isset($data->coffee_link) ? $data->coffee_link : '';

    $output = '<img src="https://coffee.alexflipnote.dev/random" alt="Coffee" width="700px"  height="auto">';

    return $output;
}
add_shortcode('coffee_shortcode', 'hs_give_me_coffee_shortcode');
