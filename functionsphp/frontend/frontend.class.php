<?php
/**
 * Fontend specific functionality of this theme.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/FrontEnd
 */

namespace FunctionsPhp\FrontEnd;

use \FunctionsPhp\Includes\Theme as Theme;


class FrontEnd extends Theme {


	public function __construct() {
		
		return $this;

	}
		

	public function enqueue_styles() {
		
		wp_enqueue_style( $this->text_domain  . '-styles' , $this->theme_path . '/style.css' , array() , $this->version , 'all' );

	}


	public function enqueue_scripts() {
		
		wp_enqueue_script( $this->text_domain . '-scripts' , $this->theme_path . '/script.js' , array() , $this->version , true );
	
	}


	public function register_thumbnail_sizes() {
		
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'custom-thumbnail' , 900 , 600 , true );

	}


	public function add_theme_support() {
		
		add_theme_support( 'html5' , array( 'comment-list' , 'comment-form' , 'search-form' , 'gallery' , 'caption' ) );
		
		add_theme_support( 'menus' );

		add_theme_support( 'post-formats' , array( 'aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat' ) );
	
	}

}