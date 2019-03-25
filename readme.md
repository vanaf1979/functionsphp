### FunctionsPhp: A OOP WordPress functions.php boilerplate.

#### What?
FunctionsPhp is a Objkect Oriented WordPress functions.php Boilerplate based upon the [WordPress Plugin Boilerplate](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/) by [Devin Vinson](https://twitter.com/DevinVinson). I refactored WPPB to be used in theme development and to include Php namespaces and Autoloading. 

#### Why?
Becouse of it's legacy WordPress by nature is not written in modern Php. But that doesn't mean our theme's code can't be. Working in OOP means more maintanable code and prevents us from creating spaghetti code functions.php files.

#### How?
It's basic design is that all WordPress action and filter hooks are defined within the main class (functionsphp.class.php), and the hook callback functions are placed within seperated classes (admin/admin.class.php, and frontend/frontend.class.php etc).

#### Now what?
Download and check it out. The code should be pretty self explanitory.  If you have any suggestions for improvement please do let me knwo.