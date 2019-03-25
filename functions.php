<?php
/*!
Theme Name:         Functions.php boilerplate
Theme URI:          https://vanaf1979.nl/
Description:        Wordpress functions.php boilerplate.
Version:            1.0.0
Author:             Vanaf1979
Author URI:         https://vanaf1979.nl
Text Domain:        functions-php
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/


/* Run functions class */
require_once get_template_directory() . '/functionsphp/functionsphp.class.php';

function run_functions() {

	$functions = new \FunctionsPhp\Functionsphp();
	$functions->run();
	
}

run_functions();
?>
