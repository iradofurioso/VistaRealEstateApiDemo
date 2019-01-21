<?php 
/**
 * This controller loads the City module.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */


namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;
use AppVista\Model\Address as tbAdress;

class City extends MasterController
{
    private $tbAddress;
    
    public function __construct()
    {
        parent::__construct();

        $this->tbAddress = new tbAdress();

        // Check if the user is loggedin
        $this->checkLoggedIn();
    }
    
    
    /**
     * Address module home screen. 
     * 
     */
    public function index()
    {
        $addrs  = $this->tbAddress->getCities();
        $qtd    = count($addrs);
        

        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/list.php');
    }


    /**
     * Edit a city.
     * 
     * @param int $id City id
     */
    public function edit($id)
    {
        $url    = $this->appUrl;
        $city   = $this->tbAddress->getCityById($id);

        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/edit.php');
    }


    /**
     * Add a city.
     * 
     */
    public function add()
    {
        $url    = $this->appUrl;
        
        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/add.php');
    }


    /**
     * Saves a city.
     * 
     */
    public function save()
    {
        $cityName   = $_POST['city'];
        $stateId    = $_POST['state'];
        
        if(isset($_POST['id']))
        {
            // Update
            $id                     = $_POST['id'];

            $this->tbAddress->updateCity($id, $cityName, $stateId);

            $success['savedstatus']	= '1';
            $success['message']		= 'Dados salvos com sucesso!';
            $success['name'] 		= $cityName;
            $success['state'] 		= 'Santa Catarina';
            $success['id'] 			= $id;
            echo json_encode($success);
            exit();
        }
        else
        {
            // Insert
            $id = $this->tbAddress->insertCity($cityName, $stateId);
            
            $success['savedstatus']	= '1';
            $success['message']		= 'Dados salvos com sucesso!';
            $success['name'] 		= $cityName;
            $success['state'] 		= 'Santa Catarina';
            $success['id'] 			= $id;
            echo json_encode($success);
            exit();

        }
    }


    /**
     * Deletes a city from database. 
     * 
     * @param int $id City ID. 
     */
    public function delete($id)
    {
        $url = $this->appUrl;

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Removes the city 
            if($this->tbAddress->deleteCity($id))
            {
                // Removes all neighborhoods related to the city. 
                $this->tbAddress->deleteNeighborhoodsByCity($id);

                $success['savedstatus']	= '1';
                $success['message']		= 'A cidade foi removida com sucesso!';
                $success['id'] 			= $id;
                echo json_encode($success);
                exit();
            }
            else
            {
                $error['savedstatus']	= '0';
                $error['message']		= 'Erro ao remover a cidade!';
                $error['id'] 			= $id;
                echo json_encode($error);
                exit();
            }
        }
        else
        {
            include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/delete.php');
        }

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