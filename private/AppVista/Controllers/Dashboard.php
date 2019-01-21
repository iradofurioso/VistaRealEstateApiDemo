<?php 
/**
 * This controller loads the dashboard module. 
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */


namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;
use AppVista\Model\Address as tbAdress;


class Dashboard extends MasterController
{
    
    private $tbAddress;

    /**
     * Initial procedures. 
     * 
     */
    public function __construct()
    {
        parent::__construct();

        $this->tbAddress = new tbAdress();

        // Check if the user is loggedin
        $this->checkLoggedIn();
    }
    
    
    /**
     * Dashboard home screen. 
     */
    public function index()
    {
        $qtdNeigh   = count($this->tbAddress->getNeighborhoods());
        $qtdCities  = count($this->tbAddress->getCities());
        
        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/list.php'); 
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