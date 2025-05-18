<?php
add_action('after_setup_theme', 'theme_slug_setup');

function theme_slug_setup()
{
	add_theme_support('wp-block-styles');
}

function narc_enqueue_styles()
{
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), 1.0,);
	wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'), array(), 1.0,);
	wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.css'), array(), 1.0,);
	wp_enqueue_style('main-style', get_stylesheet_uri());
	wp_enqueue_style('style', get_theme_file_uri('/assets/css/styles.css'), array(), 1.0,);
}
add_action('wp_enqueue_scripts', 'narc_enqueue_styles');

function add_custom_script()
{
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), true);
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'add_custom_script');

function custom_theme_menus()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu'),
		)
	);
}
add_action('after_setup_theme', 'custom_theme_menus');

/* Better way to add multiple widgets areas */
function widget_registration($name, $id, $description, $beforeWidget, $afterWidget)
{
	register_sidebar(array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}

function multiple_widget_init()
{
	widget_registration('Footer widget 1', 'footer-sidebar-1', 'test', '', '', '', '');
	widget_registration('Footer widget 2', 'footer-sidebar-2', 'test', '', '', '', '');
	widget_registration('Footer widget 3', 'footer-sidebar-3', 'test', '', '', '', '');
	widget_registration('Footer widget 4', 'footer-sidebar-4', 'test', '', '', '', '');
	widget_registration('Footer widget 5', 'footer-sidebar-5', 'test', '', '', '', '');
}

add_action('widgets_init', 'multiple_widget_init');

add_theme_support('custom-logo');
function themename_custom_logo_setup()
{
	add_theme_support( 'post-thumbnails' );

	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

if ( class_exists( '\Elementor\Plugin' ) ){
	require get_stylesheet_directory() . '/inc/elementor-widgets.php';
}

function narc_custom_post_type() {
	register_post_type('narc_portfolio',
		array(
			'labels'      => array(
				'name'          => __('Portfolios', 'textdomain'),
				'singular_name' => __('Portfolio', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => ['title', 'post_tag', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'trackbacks', 'page-attributes', 'excerpt', 'post-formats', 'custom-fields']
		)
	);
}
add_action('init', 'narc_custom_post_type');

function narc_register_tag() {
    $labels = array(
        'name'              => _x( 'Tags', 'tag general name' ),
        'singular_name'     => _x( 'Tag', 'tag singular name' ),
        'search_items'      => __( 'Search tags' ),
        'all_items'         => __( 'All tags' ),
        'parent_item'       => __( 'Parent Tag' ),
        'parent_item_colon' => __( 'Parent Tag:' ),
        'edit_item'         => __( 'Edit Tag' ),
        'update_item'       => __( 'Update Tag' ),
        'add_new_item'      => __( 'Add New Tag' ),
        'new_item_name'     => __( 'New Tag Name' ),
        'menu_name'         => __( 'Tag' ),
    );
    $args = array(
        'hierarchical'      => true, // Make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'narc_tag' ),
    );
    register_taxonomy( 'narc_tag', array( 'narc_portfolio' ), $args );
}
add_action( 'init', 'narc_register_tag' );