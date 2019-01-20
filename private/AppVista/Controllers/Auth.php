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
use AppVista\Model\User as tbUser;


class Auth extends MasterController
{
    
    private $tbUser;
    
    /**
     * Initial procedures. 
     * 
     */
    public function __construct()
    {
        parent::__construct();

        $this->tbUser = new tbUser();
    }
    

    /**
     * Login page. 
     * 
     */
    public function index()
    {
        session_start();

        $url = $this->appUrl;
        $msg = '';

        // Verificar na sessão se tem alguma mensagem de erro.
        if((isset($_SESSION['msg'])) and ($_SESSION['msg']!=''))
            $msg = $_SESSION['msg'];
        
        include(self::TPL_PATH . 'login.php');
    }


    /**
     * Log user in. 
     * 
     */
    public function login()
    {
        session_start();
        
        // Post values with xss clean
        $email      = filter_var( trim($_POST['email']), FILTER_SANITIZE_STRING);
        $password   = filter_var( trim($_POST['password']), FILTER_SANITIZE_STRING);

        // Check the email and password
        if($this->tbUser->getCredentials($email, $password))
        {
            $_SESSION['email']      = $email;
            $_SESSION['password']   = $password;

            header('location:' . $this->appUrl);
        }
        else 
        {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            
            $_SESSION['msg'] = 'Usuário e senha inválidos!';

            header('location:' . $this->appUrl . 'auth/index');
        }
    }


    /**
     * Logout user and redirects to login.
     * 
     */
    public function logout()
    {
        session_start();

        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['msg']);
        session_destroy();

        header('location:' . $this->appUrl);
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