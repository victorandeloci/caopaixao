<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'material' ) );
add_theme_support( 'custom-logo' );

function add_nav_menus() {
	register_nav_menu('primary-menu',__('Menu - Primary'));
  register_nav_menu('secondary-menu',__('Menu - Secondary'));
	register_nav_menu('footer-menu',__('Menu - Footer'));
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
        'name' => __( 'Home' ),
        'singular_name' => __( 'Home' )
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

function excerpt($limit, $postId = null) {
  if($postId)
    $excerpt = explode(' ', get_the_excerpt($postId), $limit);
  else
    $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' [...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
