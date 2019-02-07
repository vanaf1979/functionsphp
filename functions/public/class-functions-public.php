<?php

class Functions_Public
{

	private $theme_name;

	private $version;


	public function __construct( $theme_name, $version )
	{
		$this->theme_name = $theme_name;
		$this->version = $version;
	}
		

	public function enqueue_styles()
	{
		wp_enqueue_style( $this->theme_name  . '-css', get_stylesheet_directory_uri() . '/public/css/header.css', array() , $this->version , 'screen' );

		wp_enqueue_style( $this->theme_name . '-ie9' , get_stylesheet_directory_uri() . '/public/css/header-ie9.css', array() , $this->version , 'screen' );
		wp_style_add_data( $this->theme_name . '-ie9' , 'conditional' , 'IE 9' );

		wp_enqueue_style( $this->theme_name . '-lt-ie8' , get_stylesheet_directory_uri() . '/public/css/header-ie8.css', array() , $this->version , 'screen' );
		wp_style_add_data( $this->theme_name . '-lt-ie8' , 'conditional' , 'lt IE 9' );
	}


	public function enqueue_scripts()
	{
		wp_enqueue_script( $this->theme_name . '-html5' , 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js' , array() , $this->version , true );
    	wp_script_add_data( $this->theme_name . '-html5'  , 'conditional' , 'lt IE 9' );
		
		wp_enqueue_script( $this->theme_name . '-js' , get_stylesheet_directory_uri() . '/public/js/app.js' , array() , $this->version , true );
	}


	public function register_thumbnail_sizes()
	{
		add_theme_support( 'post-thumbnails' );
		//add_image_size( 'theme-resposive-img', 600, 9999, true );
	}


	public function add_theme_support()
	{
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'menus' );
	}


}
