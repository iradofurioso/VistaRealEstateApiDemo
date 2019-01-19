<?php 
/**
 * Simple route control for friendly URLs. 
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Library
 */

namespace AppVista\Library;

use AppVista\Controllers;

class RouteManager 
{
    

    /**
     * Load the controller according to informed param. 
     * 
     * @param String $url User requested action.
     * @return null
     */
    public static function loadRoute($url)
    {
        
        $controller = '';
        $method     = '';
        $param      = '';
        
        // Check if is homepage
        if(strlen($url) <= 1)
        {
            // +++ Load index - DASHBOARD +++ //
            
        }
        else 
        {
            $parts = explode('/',$url);
            
            // Dealing with controller - first argument
            if(!empty($parts[1]))
            {
                $controller = ucfirst(strtolower($parts[1]));
                
            }
            else 
            {
                die("Index carregado");
                // +++ Load index - DASHBOARD +++ //
            }

            // Dealing with method - second argument 
            if(!empty($parts[2]))
            {
                $method = strtolower($parts[2]);
            }
            else 
            {
                die("Index carregado");
                // +++ Load index - DASHBOARD +++ //
            }

            // Dealing with param - third argument 
            if(!empty($parts[3]))
            {
                $param = $parts[3];
            }

            // We have a controler and a method so we invoke them
            if($controller!='' and $method!='')
            {
                if($param == '')
                { 
                    // Without param
                    $controller = "AppVista\Controllers\\" . $controller;
                    $controller = new $controller;
                    $controller->$method();
                    return null;
                }
                else 
                {
                    // With param
                    $controller = "AppVista\Controllers\\" . $controller;
                    $controller = new $controller;
                    $controller->$method($param);
                    return null;
                }
            } 
            

        } //endelse
    }


}

#EOF