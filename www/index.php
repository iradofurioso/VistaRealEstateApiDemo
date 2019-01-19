<?php 

define('SECURED_FOLDER_PATH', '../private');
define('DS', DIRECTORY_SEPARATOR);
define('ROOTDIR', __DIR__);
define('FMKROOTPATH' , ROOTDIR . DS . SECURED_FOLDER_PATH . DS . 'AppVista' . DS);
define('VENDORPATH' , ROOTDIR . DS . SECURED_FOLDER_PATH . DS . 'vendor' . DS);

require_once(VENDORPATH.'autoload.php');


use AppVista\Controllers;
use AppVista\Library\RouteManager;

RouteManager::loadRoute(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
