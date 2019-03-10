<?php

class Functionsphp {

	protected $loader;

	protected $theme;


	public function __construct() {

		$this->theme = wp_get_theme();

		$this->load_dependencies();
		$this->define_global_hooks();
		$this->define_public_hooks();
		$this->define_admin_hooks();

	}


	private function load_dependencies() {

		require_once get_template_directory( ) . '/functionsphp/includes/class-functionsphp-loader.php';
		require_once get_template_directory( ) . '/functionsphp/public/class-functionsphp-public.php';
		require_once get_template_directory( ) . '/functionsphp/admin/class-functionsphp-admin.php';
		require_once get_template_directory( ) . '/functionsphp/global/class-functionsphp-global.php';

		$this->loader = new Functionsphp_Loader();

	}


	private function define_public_hooks() {

		$functionsphp_public = new Functionsphp_Public( $this->get_theme_name(), $this->get_version() );

		// Enqueue styles and scripts.
		$this->loader->add_action( 'wp_enqueue_scripts', $functionsphp_public, 'enqueue_styles', 10, 1 );
		$this->loader->add_action( 'wp_enqueue_scripts', $functionsphp_public, 'enqueue_scripts', 10, 1  );

		// Add theme support.
		$this->loader->add_action( 'init' , $functionsphp_public , 'add_theme_support' , 1 , 1 );

		// Register thumbnail sizes.
		$this->loader->add_action( 'init' , $functionsphp_public , 'register_thumbnail_sizes' , 1 );

	}


	private function define_admin_hooks() {	

		$functionsphp_admin = new Functionsphp_Admin( $this->get_theme_name(), $this->get_version() );

		// Enqueue styles and scripts.
		$this->loader->add_action( 'admin_enqueue_scripts', $functionsphp_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $functionsphp_admin, 'enqueue_scripts' );

		// Register navigational menus.
		$this->loader->add_action( 'init' , $functionsphp_admin , 'register_nav_menus' );

		// Register sidebar/widgert areas.
		$this->loader->add_action( 'widgets_init' , $functionsphp_admin , 'register_widget_areas' );

		// Register custom posttypes.
		$this->loader->add_action( 'init' , $functionsphp_admin , 'register_custom_posttypes' );

		// Register custom shortcodes.
		$this->loader->add_action( 'init' , $functionsphp_admin , 'register_shortcodes' );

	}


	private function define_global_hooks() {

		$functionsphp_global = new Functionsphp_Global( $this->get_theme_name(), $this->get_version() );

		// Remove emoji's header.
		$this->loader->add_action( 'init' , $functionsphp_global , 'disable_emoji_dequeue_script' , 10 );

		// Remove junk from header.
		$this->loader->add_action( 'init' , $functionsphp_global , 'clean_up_header' );

		// Remove wpembed scripts.
		$this->loader->add_action( 'wp_footer' , $functionsphp_global , 'remove_wpembed_scripts' );

	}


	public function get_theme_name() {

		return $this->theme->get('TextDomain');

	}


	public function get_version() {

		return $this->theme->get('Version');

	}


	public function get_loader() {

		return $this->loader;

	}


	public function run() {

		$this->loader->run();

	}

}
