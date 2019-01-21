<?php 
/**
 * This controller loads the Neighborhood module.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */


namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;
use AppVista\Model\Address as tbAdress;

class Neighborhood extends MasterController
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
        $addrs  = $this->tbAddress->getNeighborhoods();
        $qtd    = count($addrs);
        

        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/list.php');
    }


    /**
     * Edit a neighborhood.
     * 
     * @param int $id neighborhood id
     */
    public function edit($id)
    {
        $url    = $this->appUrl;
        $neigh  = $this->tbAddress->getNeighborhoodById($id);
        $cities = $this->tbAddress->getCities();

        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/edit.php');
    }


    /**
     * Add a neighborhood.
     * 
     */
    public function add()
    {
        $url    = $this->appUrl;
        $cities = $this->tbAddress->getCities();
        
        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/add.php');
    }


    /**
     * Saves a neighborhood.
     * 
     */
    public function save()
    {
        $neighborhoodName   = $_POST['neighborhood'];
        $cityId             = $_POST['city'];
        $cityName           = $this->tbAddress->getCityById($cityId);

        if(isset($_POST['id']))
        {
            // Update
            $id                     = $_POST['id'];

            $this->tbAddress->updateNeighborhood($id, $neighborhoodName, $cityId);

            $success['savedstatus']	= '1';
            $success['message']		= 'Dados salvos com sucesso!';
            $success['name'] 		= $neighborhoodName;
            $success['city'] 		= $cityName['name'];
            $success['id'] 			= $id;
            echo json_encode($success);
            exit();
        }
        else
        {
            // Insert
            $id = $this->tbAddress->insertNeighborhood($neighborhoodName, $cityId);
            
            $success['savedstatus']	= '1';
            $success['message']		= 'Dados salvos com sucesso!';
            $success['name'] 		= $neighborhoodName;
            $success['city'] 		= $cityName['name'];
            $success['id'] 			= $id;
            echo json_encode($success);
            exit();

        }
    }


    /**
     * Deletes a neighborhood from database. 
     * 
     * @param int $id neighborhood ID. 
     */
    public function delete($id)
    {
        $url = $this->appUrl;

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Removes the neighborhood.
            if($this->tbAddress->deleteNeighborhood($id))
            {
                $success['savedstatus']	= '1';
                $success['message']		= 'O bairro foi removido com sucesso!';
                $success['id'] 			= $id;
                echo json_encode($success);
                exit();
            }
            else
            {
                $error['savedstatus']	= '0';
                $error['message']		= 'Erro ao remover o bairro!';
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