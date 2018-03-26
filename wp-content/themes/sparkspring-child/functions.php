<?php

class SparkSpringChild {

	function __construct(){
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}
	
	function pre_get_posts( $query ){
		if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'team' ) ){
			$query->set( 'nopaging', true );
			$query->set( 'orderby', 'menu_order' );
			$query->set( 'order', 'ASC' );
		}
	}

	function wp_enqueue_scripts(){
		$msw_object = array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
            'google_map_data' => get_google_map_data(),
			'home_url' => home_url(),
			'show_dashboard_link' => current_user_can( 'manage_options' ) ? 1 : 0,
			'site_url' => site_url(),
			'stylesheet_directory' => get_stylesheet_directory_uri()
		);
		$google_api_key = get_field( 'msw_google_map_api_key', 'option' );
		wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key, array( 'theme' ), null, true );
		wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/scripts.min.js' );
		wp_localize_script( 'theme', 'MSWObject', $msw_object );

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Arizonia|Montserrat:300,400,500,600|Open+Sans:400,400i,700,700i' );
		wp_enqueue_style( 'theme', get_stylesheet_uri(), null, time() );
	}
	
	static public function get_excerpt_by_id($post_id, $word_count = 10){
		$the_post = get_post($post_id); //Gets post ID
		$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
		$excerpt_length = $word_count; //Sets excerpt length by word count
		$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
		$words = explode(' ', $the_excerpt, $excerpt_length + 1);
		if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '…');
		$the_excerpt = implode(' ', $words);
		endif;
		//$the_excerpt = '<p>' . $the_excerpt . '</p>';
		return $the_excerpt;
	}

}

$SparkSpringChild = new SparkSpringChild();