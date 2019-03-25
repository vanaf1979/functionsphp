<?php

namespace FunctionsPhp\CleanUp;

class CleanUp {

	private $theme_name;

	private $version;


	public function __construct( $theme_name , $version ) {

		$this->theme_name = $theme_name;
		$this->version = $version;

	}


	public function disable_emoji_dequeue_script() {

		remove_action('wp_head' , 'print_emoji_detection_script' , 7 );
		remove_action('wp_print_styles' , 'print_emoji_styles');
		remove_action( 'admin_print_scripts' , 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles' , 'print_emoji_styles' );

	}


	public function clean_up_header() {

		remove_action( 'wp_head' , 'rsd_link' );
		remove_action( 'wp_head' , 'wp_generator' );
		remove_action( 'wp_head' , 'feed_links' , 2 );
		remove_action( 'wp_head' , 'feed_links_extra' , 3 );
		remove_action( 'wp_head' , 'index_rel_link' );
		remove_action( 'wp_head' , 'wlwmanifest_link' );
		remove_action( 'wp_head' , 'start_post_rel_link' , 10 , 0 );
		remove_action( 'wp_head' , 'parent_post_rel_link' , 10 , 0 );
		remove_action( 'wp_head' , 'adjacent_posts_rel_link' , 10 , 0 );
		remove_action( 'wp_head' , 'adjacent_posts_rel_link_wp_head' , 10 , 0 );
		remove_action( 'wp_head' , 'wp_shortlink_wp_head' , 10 , 0 );
		remove_action( 'wp_head' , 'print_emoji_detection_script' , 7 );
		remove_action( 'wp_head' , 'wp_resource_hints' , 2 );
		remove_action( 'wp_head' , 'rel_canonical' );

	}

	
	public function remove_wpembed_scripts() {

		wp_deregister_script( 'wp-embed' );
		
	}

}
