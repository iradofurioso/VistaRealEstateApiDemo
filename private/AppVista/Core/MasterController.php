<?php 

namespace AppVista\Core;

class MasterController
{

    const TPL_PATH = FMKROOTPATH . 'Views/vistatheme/templates/';
    const MDL_PATH = FMKROOTPATH . 'Views/vistatheme/modules/';

    public function __construct()
    {
        
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