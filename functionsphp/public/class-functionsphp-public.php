<?php

class Functionsphp_Public {

	private $theme_name;

	private $version;


	public function __construct( $theme_name , $version ) {
		
		$this->theme_name = $theme_name;
		$this->version = $version;

	}
		

	public function enqueue_styles() {

		// Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
		
		wp_enqueue_style( $this->theme_name  . '-styles' , get_stylesheet_directory_uri() . '/style.css', array() , $this->version , 'screen' );

	}


	public function enqueue_scripts() {

		// Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
		
		wp_enqueue_script( $this->theme_name . '-scripts' , get_stylesheet_directory_uri() . '/script.js' , array() , $this->version , true );
	
	}


	public function register_thumbnail_sizes() {
		
		// Ref: https://developer.wordpress.org/reference/functions/add_theme_support/

		add_theme_support( 'post-thumbnails' );

		// Ref: https://developer.wordpress.org/reference/functions/add_image_size/

		add_image_size( 'custom-thumbnail' , 900 , 600 , true );

	}


	public function add_theme_support() {
		
		// Ref: https://developer.wordpress.org/reference/functions/add_theme_support/

		// HTML5.
		add_theme_support( 'html5' , array( 'comment-list' , 'comment-form' , 'search-form' , 'gallery' , 'caption' ) );
		
		// Menus.
		add_theme_support( 'menus' );

		// Post formats.
		add_theme_support( 'post-formats' , array( 'aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat' ) );
	
	}

}