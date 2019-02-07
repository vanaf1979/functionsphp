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
		wp_enqueue_style( $this->theme_name  . '-css', get_stylesheet_directory_uri() . '/style.css', array() , $this->version , 'screen' );
	}


	public function enqueue_scripts()
	{
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
