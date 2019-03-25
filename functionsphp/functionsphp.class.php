<?php

namespace FunctionsPhp;

use \JetFire\Autoloader\Autoload as AutoLoad;
use \FunctionsPhp\Includes\Loader as Loader;
use \FunctionsPhp\FrontEnd\FrontEnd as FrontEnd;
use \FunctionsPhp\Admin\Admin as Admin;
use \FunctionsPhp\CleanUp\CleanUp as CleanUp;


class Functionsphp {

	protected $loader;

	protected $theme;


	public function __construct() {

		$this->autoload();

		$this->theme = wp_get_theme();

		$this->loader = new Loader();

		$this->define_frontend_hooks();
		$this->define_admin_hooks();
		$this->define_cleanup_hooks();
	
	}


	private function define_frontend_hooks() {

		$frontend = new FrontEnd( $this->get_theme_name() , $this->get_version() );

		// Enqueue styles and scripts.
		$this->loader->add_action( 'wp_enqueue_scripts' , $frontend , 'enqueue_styles' , 10 , 1 );
		$this->loader->add_action( 'wp_enqueue_scripts' , $frontend , 'enqueue_scripts' , 10 , 1  );

		// Add theme support.
		$this->loader->add_action( 'init' , $frontend , 'add_theme_support' , 1 , 1 );

		// Register thumbnail sizes.
		$this->loader->add_action( 'init' , $frontend , 'register_thumbnail_sizes' , 1 );

	}


	private function define_admin_hooks() {	

		$admin = new Admin( $this->get_theme_name() , $this->get_version() );

		// Enqueue styles and scripts.
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_scripts' );

		// Register navigational menus.
		$this->loader->add_action( 'init' , $admin , 'register_nav_menus' );

		// Register sidebar/widgert areas.
		$this->loader->add_action( 'widgets_init' , $admin , 'register_widget_areas' );

		// Register custom posttypes.
		$this->loader->add_action( 'init' , $admin , 'register_custom_posttypes' );

		// Register custom shortcodes.
		$this->loader->add_action( 'init' , $admin , 'register_shortcodes' );

	}


	private function define_cleanup_hooks() {

		$cleanup = new CleanUp( $this->get_theme_name() , $this->get_version() );

		// Remove emoji's header.
		$this->loader->add_action( 'init' , $cleanup , 'disable_emoji_dequeue_script' );

		// Remove junk from header.
		$this->loader->add_action( 'init' , $cleanup , 'clean_up_header' );

		// Remove wpembed scripts.
		$this->loader->add_action( 'wp_footer' , $cleanup , 'remove_wpembed_scripts' );

	}


	private function autoload() {

		require_once get_template_directory( ) . '/functionsphp/includes/autoloader.php';

		$loader = new AutoLoad();
		$loader->addNamespace( 'FunctionsPhp' , get_template_directory( ) . '/functionsphp/' );

        $loader->register();

	}


	private function get_theme_name() {

		return $this->theme->get('TextDomain');

	}


	private function get_version() {

		return $this->theme->get('Version');

	}


	public function run() {

		$this->loader->run();

	}

}
