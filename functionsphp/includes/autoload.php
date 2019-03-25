
<?php

require_once get_template_directory( ) . '/functionsphp/includes/autoloader.php';

use \JetFire\Autoloader\Autoload as AutoLoad;

$loader = new AutoLoad();
$loader->addNamespace( 'FunctionsPhp' , get_template_directory( ) . '/functionsphp/' );

$loader->register();