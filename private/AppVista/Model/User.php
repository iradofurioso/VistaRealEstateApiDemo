<?php
/**
 * Model for table USER.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Model
 */


namespace AppVista\Model;


class User extends \SQLite3 
{
    
    /**
     * Connecting to database. 
     * 
     * @return void
     */
    public function __construct() 
    {
        if($this->open(FMKROOTPATH .'Storage/VistaRealEstateDB.db')) 
        {
            echo "ERROR! " . $this->lastErrorMsg();
        } 
    }  
    

    /**
     * Returns user information. 
     * 
     * @param String $email User email. 
     * @param String $password User password. 
     * @return boolean
     */
    public function getCredentials($email, $password)
    {
        $sql = sprintf('SELECT * FROM vista_users WHERE email = \'%s\' AND password = \'%s\'',$email,$password);

        $result = $this->querySingle($sql,true);

        return (count($result) > 0) ? true : false;
    }


    /**
     * Closing the connection to database. 
     * 
     * @return void
     */
    public function __destruct()
    {
        $this->close();
    }

}


#EOF