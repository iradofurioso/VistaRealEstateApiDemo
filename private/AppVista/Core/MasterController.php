<?php 

namespace AppVista\Core;

class MasterController
{

    const TPL_PATH = FMKROOTPATH . 'Views/vistatheme/templates/';
    const MDL_PATH = FMKROOTPATH . 'Views/vistatheme/modules/';
    
    public $appUrl = '';


    /**
     * Prepares the starting procedures. 
     * 
     */
    public function __construct()
    {
       $this->appUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    }
    

    /**
     * Simple method to check if the user is loggedIn
     * 
     */
    public function checkLoggedIn()
    {
        session_start();

        if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true))
        {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            
            header('location:' . $this->appUrl . 'auth/index');
            exit();
        }
    }


    /**
     * Returns the class root name without namespace. 
     * 
     * @param String $className The name of the class. 
     * @return String
     */
    public function getClassRootName($className) 
    {
        $path = explode('\\', $className);
        return array_pop($path);
    }
}


#EOF