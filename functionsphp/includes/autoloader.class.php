<?php
/**
 * PSR-4 Autoloader.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Includes/Autoloader
 */

namespace FunctionsPhp\includes;


class Autoloader {

    private $mainNamespace = null;

    private $basePath = null;

    private $extention = null;

    
    public function __construct( $namespace , $basePath , $extention ) {

        $this->mainNamespace = $namespace;

        $this->basePath = $basePath;

        $this->extention = $extention;

        $this->registerAutoloader();
        
    }


    private function registerAutoloader() {

        spl_autoload_register( array( $this , 'loadClass' ) );

    }


    private function loadClass( $namespace ) {

        $fullClassPath = $this->fullClassPath( $namespace );

        if( $this->classInNamespace( $namespace ) && $this->classFileExists( $fullClassPath ) ) {

            require_once $fullClassPath;

        }

    }


    private function classInNamespace( $namespace ) {

        return strpos( $namespace , $this->mainNamespace ) === 0 ? true : false;

    }


    private function fullClassPath( $namespace ) {

        return $this->basePath . '/' . $this->convertNamespace( $namespace ) . $this->extention;

    }


    private function classFileExists( $fullpath ) {

        return file_exists( $fullpath ) ? true : false;

    }


    private function convertNamespace( $namespace ) {

        return strtolower( str_replace( '\\' , DIRECTORY_SEPARATOR , $namespace ) );

    }
    
}

