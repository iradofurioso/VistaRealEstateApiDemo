<?php 
/**
 * Simple auth class just to simulate a login. Don't use in production
 * environment! 
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */


namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;


class Auth extends MasterController
{
    
    
    public function __construct()
    {
        
    }
    
    
    public function index()
    {
        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . 'list.php');
    }


    public function login()
    {

    }

    
    public function logout()
    {

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