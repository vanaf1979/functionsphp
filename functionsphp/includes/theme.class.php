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

    protected $theme_name = null;

    protected $version = null;

    protected $text_domain = null;

    protected $theme_path = null;

    private $template = null;


    public function __construct() {

        $theme = wp_get_theme();

        $this->themename = $theme->get( 'Name' );

        $this->version = $theme->get( 'Version' );

        $this->textdomain = $theme->get( 'TextDomain' );

        $this->theme_path = get_template_directory_uri();

    }


    public function get_template() {

        if( $this->template ) {

            return $this->template;

        } else {

            global $template;
            return $this->template = basename( $template );
            
        }

    }

}