<?php

// Featured image support
add_theme_support( 'post-thumbnails' );

// SVG image support
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Add stylesheets and scripts
function theme_scripts() {
	wp_enqueue_style( 'style.css', get_template_directory_uri() . '/css/style.css', false, '1.0.1' );
	wp_enqueue_style( 'load-fa', '//use.fontawesome.com/releases/v5.2.0/css/all.css', false, '5.2.0' );
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery.js', '//code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', true);
	wp_enqueue_script( 'jquery-ui.js', '//code.jquery.com/ui/1.12.1/jquery-ui.min.js', false, '1.12.1', true);
	if(is_home()) {
		wp_enqueue_script( 'jquery.scrollify.js', get_template_directory_uri() . '/js/jquery.scrollify.js', array(), true, '1.0.19', true );
	}
	wp_enqueue_script( 'script.js', get_template_directory_uri() . '/js/script.js', array(), true, '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// Disable auto generation of thumbnails
function add_image_insert_override($sizes){
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );

// Add theme title support
add_theme_support( 'title-tag' );

// ADD MENU SUPPORT
function register_menus() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu' ),
		'mobile-header-menu' => __( 'Mobile Header Menu' ),
		'footer-menu' => __( 'Footer Menu' )
	  )
	  );
}
add_action( 'init', 'register_menus' );

// CUSTOM QUERIES
add_action( 'pre_get_posts', 'homepage_query' );

function homepage_query( $query ) {
  if ( is_front_page() && $query->is_main_query() ) :
    $query->set( 'post_type', 'page ');
    $query->set( 'name', 'homepage' );
  endif;
}

// CLEAN MENUS
function print_menu( $menu_name, $class_name ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	
	  $menu_items = wp_get_nav_menu_items($menu->term_id);
	  $menu_list = '';
	  $count = 0;
	  $submenu = false;
	  $cpi = get_the_id();
	  foreach( $menu_items as $current ) {
		if($cpi == $current->object_id ){if ( !$current->menu_item_parent ) {$cpi=$current->ID;}
		else{$cpi=$current->menu_item_parent;}$cai=$current->ID;break;}
	  }
	  foreach( $menu_items as $menu_item ) {
		$link = $menu_item->url;
		$title = $menu_item->title;
		$target = $menu_item->target;
		if ( !$menu_item->menu_item_parent ) {
		  $parent_id = $menu_item->ID;$parent_id==$cpi ? $ac=' current_item' : $ac='';
		  if(!empty($menu_items[$count + 1]) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ){//Checking has child
			$menu_list .= '<li class="'.$class_name.'-column"><a '.( $link != '' ? 'href="'.$link.'"' : '' ).' '.( $target != '' ? 'target="'.$target.'"' : '').' class="'.$class_name.'-item '.$class_name.'-item--subnav">'.$title.'</a>';
		  }else{
			$menu_list .= '<li class="'.$class_name.'-column">' ."\n";$menu_list .= '<a '.( $link != '' ? 'href="'.$link.'"' : '' ).' '.( $target != '' ? 'target="'.$target.'"' : '').' class="'.$class_name.'-item">'.$title.'</a>' ."\n";
		  }
		}
		if ( $parent_id == $menu_item->menu_item_parent ) {
		  if ( !$submenu ) {
			$submenu = true;
			$menu_list .= '<ul class="'.$class_name.'-sub">' ."\n";
		  }
		  $menu_list .= '<li>' ."\n";
		  $menu_list .= '<a '.( $link != '' ? 'href="'.$link.'"' : '' ).' '.( $target != '' ? 'target="'.$target.'"' : '').' class="'.$class_name.'-sub-item">'.$title.'</a>' ."\n";
		  $menu_list .= '</li>' ."\n";
		  if(empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu){
			$menu_list .= '</ul>' ."\n";
			$submenu = false;
		  }
		}
		if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
		  $menu_list .= '</li>' ."\n";      
		  $submenu = false;
		}
		$count++;
	  }
	} else {
	  $menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
	}
	echo $menu_list;
	}
	
//Register our sidebars and widgetized areas.

function social_widgets_init() {

	register_sidebar( array(
		'name'          => 'social sidebar',
		'id'            => 'social_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'social_widgets_init' );

// CUSTOM POST TYPE
function create_post_type() {

  register_post_type( 'film',
    array(
      'labels' => array(
        'name' => __( 'Film' ),
        'singular_name' => __( 'Film' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-format-video',
    )
	);
	
	register_post_type( 'television',
    array(
      'labels' => array(
        'name' => __( 'Television' ),
        'singular_name' => __( 'Television' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-video-alt3',
    )
	);
	
}
add_action( 'init', 'create_post_type' );


//Custom Film Columns

add_filter('manage_film_posts_columns' , 'mysite_add_film_columns');

function mysite_add_film_columns( $columns ) {

  $columns = array(
		'cb'	 	=> '<input type="checkbox" />',
		'thumbnail'	=>	'Poster',
		'title' 	=> 'Title',
		'featured' 	=> 'Featured',
		'marquee'	=>	'Marquee',
		'date'		=>	'Date',
  );
  return $columns;
}

add_action( 'manage_film_posts_custom_column', 'mysite_custom_film_columns', 10, 2 );

function mysite_custom_film_columns( $column ) {

  global $post;

  switch ( $column ) {
    case 'thumbnail':
			$thumbnail = get_field( "film_poster", $post->ID )['url'];
			echo '<img src="'.$thumbnail.'" width="100" height="150">';
      break;

    case 'featured':
			if(get_field('film_featured', $post->ID))
			{
				echo 'Yes';
			}
			else
			{
				echo 'No';
			}
			break;
			
			case 'marquee':
			if(get_field('film_marquee', $post->ID))
			{
				echo 'Yes';
			}
			else
			{
				echo 'No';
			}
      break;
  }

}

