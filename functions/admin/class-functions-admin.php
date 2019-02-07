<?php

class Functions_Admin
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
		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/css/seobox-admin.css', array(), $this->version, 'all' );
	}


	public function enqueue_scripts()
	{
		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/js/seobox-admin.js', array(), $this->version, false );
	}

}
