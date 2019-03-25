<?php
/**
 * Store and provide theme inforation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Theme
 */

namespace FunctionsPhp\Includes;


class Theme {
	

    /**
	 * Theme name.
	 *
	 * @since    1.0.0
	 */
    protected $theme_name;

    /**
	 * Theme version.
	 *
	 * @since    1.0.0
	 */
    protected $version;

    /**
	 * Theme text domain.
	 *
	 * @since    1.0.0
	 */
    protected $text_domain;

    /**
	 * Theme path.
	 *
	 * @since    1.0.0
	 */
    protected $theme_path;

    
    /**
	 * Initialize the class and set its properties.
	 */
    public function __construct() {

        $theme = wp_get_theme();

        $this->themename = $theme->get( 'Name' );

        $this->version = $theme->get( 'Version' );

        $this->textdomain = $theme->get( 'TextDomain' );

        $this->theme_path = get_stylesheet_directory_uri();

    }
    
}