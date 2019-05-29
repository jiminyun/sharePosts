<?php 
// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
// Load LibrarieS
// require_once 'libraries/core.php' ;
// require_once 'libraries/controller.php' ;
// require_once 'libraries/database.php' ;

// Autoload Core Libraries : filename === className
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});