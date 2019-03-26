
<?php

require_once get_template_directory( ) . '/functionsphp/includes/autoloader.php';

use \JetFire\Autoloader\Autoload as AutoLoad;

$loader = new AutoLoad();

$loader->addNamespace( 'FunctionsPhp' , get_template_directory( ) . '/functionsphp/' );

$loader->register();


/* Run functions class */
require_once get_template_directory() . '/functionsphp/functionsphp.class.php';

use \FunctionsPhp\FunctionsPhp as FunctionsPhp;

function run_functionsphp() {

	$functions = new FunctionsPhp();
	
}

run_functionsphp();