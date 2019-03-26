<?php
/**
 * Store and provide theme inforation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Includes/Theme
 */

namespace FunctionsPhp\Includes;


class Theme {
	

    protected $theme_name;

    protected $version;

    protected $text_domain;

    protected $theme_path;

    
    public function __construct() {

        $theme = wp_get_theme();

        $this->themename = $theme->get( 'Name' );

        $this->version = $theme->get( 'Version' );

        $this->textdomain = $theme->get( 'TextDomain' );

        $this->theme_path = get_stylesheet_directory_uri();

    }
    
}