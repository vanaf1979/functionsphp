
<?php

require_once get_template_directory( ) . '/functionsphp/includes/autoloader.class.php';

use FunctionsPhp\includes\Autoloader as Autoloader;

$autoloader = new Autoloader( 'FunctionsPhp' , get_template_directory( ) , '.class.php' );


/* Run functions class */
require_once get_template_directory() . '/functionsphp/functionsphp.class.php';

use \FunctionsPhp\FunctionsPhp as FunctionsPhp;

function run_functionsphp() {

	$functions = new FunctionsPhp();
	
}

run_functionsphp();