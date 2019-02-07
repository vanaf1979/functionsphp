<?php

class Functions
{
	protected $loader;

	protected $theme;


	public function __construct()
	{
		$this->theme = wp_get_theme();

		$this->load_dependencies();
		$this->define_global_hooks();
		$this->define_public_hooks();
		$this->define_admin_hooks();
	}


	private function load_dependencies()
	{
		require_once get_template_directory( ) . '/functions/includes/class-functions-loader.php';
		require_once get_template_directory( ) . '/functions/global/class-functions-global.php';
		require_once get_template_directory( ) . '/functions/admin/class-functions-admin.php';
		require_once get_template_directory( ) . '/functions/public/class-functions-public.php';

		$this->loader = new Functions_Loader();
	}


	private function define_public_hooks()
	{
		if( ! is_admin() )
		{
			$functions_public = new Functions_Public( $this->get_theme_name(), $this->get_version() );
			
			/** Enqueue styles and scripts. **/
			$this->loader->add_action( 'wp_enqueue_scripts', $functions_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $functions_public, 'enqueue_scripts' );
			
			/** Register image sizes. **/
			$this->loader->add_action( 'setup_theme' , $functions_public , 'register_thumbnail_sizes' , 1 );

			/** Add theme support items. **/
			$this->loader->add_action( 'after_setup_theme' , $functions_public , 'theme_support' , 1 , 1 );
		}
	}


	private function define_admin_hooks()
	{	
		if( is_admin() )
		{
			$functions_admin = new Functions_Admin( $this->get_theme_name(), $this->get_version() );

			/** Enqueue styles and scripts. **/
			$this->loader->add_action( 'admin_enqueue_scripts', $functions_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $functions_admin, 'enqueue_scripts' );

			/** Register navigation menus. **/
			$this->loader->add_action( 'init' , $functions_admin , 'register_nav_menus' );

			/** Register widgert areas. **/
			$this->loader->add_action( 'widgets_init' , $functions_admin , 'register_widget_areas' );

			/** Register a custom posttypes. **/
			$this->loader->add_action( 'init' , $functions_admin , 'register_custom_posttypes' );

			/** Register custom shortcodes. **/
			$this->loader->add_action( 'init' , $functions_admin , 'register_shortcodes' );
		}
	}


	private function define_global_hooks()
	{	
		$functions_global = new Functions_Global( $this->get_theme_name(), $this->get_version() );

		/** Remove emoji's header **/
		$this->loader->add_action( 'init' , $functions_global , 'disable_emoji_dequeue_script' , 10 );
		
		/** Remove junk from header **/
		$this->loader->add_action( 'init' , $functions_global , 'clean_up_header' );

		/** Remove the rest api **/
		$this->loader->add_action( 'after_setup_theme' , $functions_global , 'remove_json_api' );

		/** Remove wpembed scripts **/
		$this->loader->add_action( 'wp_footer' , $functions_global , 'remove_wpembed_scripts' );
	}


	public function get_theme_name()
	{
		return $this->theme->get('Name');
	}


	public function get_version()
	{
		return $this->theme->get('Version');
	}


	public function get_loader()
	{
		return $this->loader;
	}


	public function run()
	{
		$this->loader->run();
	}

}
