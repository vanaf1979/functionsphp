<?php

class Functions_Global
{

	private $theme_name;

	private $version;


	public function __construct( $theme_name, $version )
	{
		$this->theme_name = $theme_name;
		$this->version = $version;
	}


	public function disable_emoji_dequeue_script()
	{
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
	}


	public function clean_up_header()
	{
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


	public function remove_json_api()
	{
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		add_filter( 'embed_oembed_discover', '__return_false' );
		add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
		add_filter('rest_enabled', '__return_false');
		add_filter('rest_jsonp_enabled', '__return_false');
	}

	public function remove_wpembed_scripts()
	{
		wp_deregister_script( 'wp-embed' );
	}

}
