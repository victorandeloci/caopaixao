<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'material' ) );
add_theme_support( 'custom-logo' );

function add_nav_menus() {
	register_nav_menu('primary-menu',__('Menu - Primary'));
  register_nav_menu('secondary-menu',__('Menu - Secondary'));
}
add_action('init','add_nav_menus');

function add_widget_support() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'add_widget_support' );

function create_posttype() {
  register_post_type( 'home',
  	// CPT Options
    array(
      'labels' => array(
        'name' => __( 'Home Content' ),
        'singular_name' => __( 'Home Content' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'home'),
      'show_in_rest' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields')
    )
  );
}
add_action( 'init', 'create_posttype' );
