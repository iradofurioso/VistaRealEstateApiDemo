<?php 
/**
 * This controller loads the base frontend.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */

namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;


class Frontend extends MasterController
{
    
    /**
     * Initial procedures. 
     * 
     */
    public function __construct()
    {
        parent::__construct();

        // Check if the user is loggedin
        $this->checkLoggedIn();
    }
    
    
    public function index()
    {
        $url = $this->appUrl;

        include(self::TPL_PATH . 'layout.php');
    }


    /**
     * If the class method do not exist.
     * 
     * @param String $method Method name
     * @param String $args Arguments
     */
    public function __call($method, $args)
    {
        die("Página não encontrada!");
    }
    
}