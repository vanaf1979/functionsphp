<?php

class Functionsphp_Admin {

	private $theme_name;

	private $version;
	

	public function __construct( $theme_name , $version ) {
		
		$this->theme_name = $theme_name;
		$this->version = $version;

	}


	public function enqueue_styles( $page ) {
		
		// https://developer.wordpress.org/reference/functions/wp_enqueue_style/

		if( $page == 'post.php' ) {

			wp_enqueue_style( $this->theme_name  . '-css' , get_stylesheet_directory_uri() . '/public/css/admin.css' , array() , $this->version , 'screen' );
			
		}

	}


	public function enqueue_scripts( $page ) {
		
		// https://developer.wordpress.org/reference/functions/wp_enqueue_script/

		if( $page == 'post.php' ) {

			wp_enqueue_script( $this->theme_name . '-js' , get_stylesheet_directory_uri() . '/public/js/admin.js' , array() , $this->version , true );
		
		}
		
	}


	public function register_nav_menus() {
		
		// https://codex.wordpress.org/Navigation_Menus

		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' ),
				'mobile-menu' => __( 'Mobile Menu' )
			)
		);

	}


	function register_widget_areas() {

		// https://codex.wordpress.org/Widgetizing_Themes
		
		register_sidebar( array(
			'name'          => 'Footer area one',
			'id'            => 'footer_area_one',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-area-one">',
			'after_title'   => '</h4>',
		));

		register_sidebar( array(
			'name'          => 'Footer area two',
			'id'            => 'footer_area_two',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-area-two">',
			'after_title'   => '</h4>',
		));

		register_sidebar( array(
			'name'          => 'Footer area three',
			'id'            => 'footer_area_three',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-area-three">',
			'after_title'   => '</h4>',
		));

		register_sidebar( array(
			'name'          => 'Footer area four',
			'id'            => 'footer_area_four',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-area-four">',
			'after_title'   => '</h4>',
		));

	}


	public function register_custom_posttypes() {
		
		// https://codex.wordpress.org/Function_Reference/register_post_type

		// $args = array(
		// 	'label' => __('Portfolio'),
		// 	'singular_label' => __('Project'),
		// 	'public' => true,
		// 	'show_ui' => true,
		// 	'capability_type' => 'post',
		// 	'hierarchical' => false,
		// 	'rewrite' => array('slug' => 'POST-TYPE-SLUG-HERE'),
		// 	'supports' => array('title', 'editor', 'thumbnail')
		// );
		//
		// register_post_type( 'custom-post-type' , $args );

	}


	public function register_shortcodes( ) {
		
		/* https://codex.wordpress.org/Shortcode_API */
		
		add_shortcode( 'span' , array(  $this , 'handle_span_tag') );

	}


	public function handle_span_tag( $atts , $content = null ) {
		
		$a = shortcode_atts( array(
			'class' => 'classname'
		), $atts );

		return "<span class=\"{$a['class']}\">{$content}</span>";

	}

}
