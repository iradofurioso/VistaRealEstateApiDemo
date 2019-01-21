<?php
/**
 * Model for tables Adresses.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Model
 */


namespace AppVista\Model;


class Address extends \SQLite3 
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
     * Returns neighborhoods. 
     * 
     * @return Array 
     */
    public function getNeighborhoods()
    {
        $rows   = array();
        $sql    = sprintf('SELECT v.*, c.name AS cityname FROM vista_addrs_neighborhoods AS v, vista_addrs_cities AS c WHERE c.id = v.fk_city_id');

        $result = $this->query($sql);

        while($row = $result->fetchArray(SQLITE3_ASSOC))
        {
            $rows[] = $row;
        }

        return $rows;
    }
    

    /**
     * Returns the cities.
     * 
     * @return Array
     */
    public function getCities()
    {
        $rows   = array();
        $sql    = sprintf('SELECT c.*, s.name AS state_name FROM vista_addrs_cities AS c, vista_addrs_states s WHERE s.id = c.fk_state_id ORDER BY c.name ASC');

        $result = $this->query($sql);

        while($row = $result->fetchArray(SQLITE3_ASSOC))
        {
            $rows[] = $row;
        }

        return $rows;
    }


    /**
     * Updates city table.
     * 
     * @param int       $id        City id. 
     * @param string    $name      City name.
     * @param int       $stateid   State id. 
     */
    public function updateCity($id, $name, $stateId)
    {
       $sql = sprintf('UPDATE vista_addrs_cities SET name = \'%s\' WHERE id = %d', $name, $id);
    
       $this->exec($sql);
    }


    /**
     * Updates neighborhood table.
     * 
     * @param int       $id        City id. 
     * @param string    $name      City name.
     * @param int       $stateid   State id. 
     */
    public function updateNeighborhood($id, $name, $cityId)
    {
       $sql = sprintf('UPDATE vista_addrs_neighborhoods SET name = \'%s\', fk_city_id = %d WHERE id = %d', $name, $cityId, $id);
        
       $this->exec($sql);
    }


    /**
     * Inserts city.
     * 
     * @param string    $name City name. 
     * @param int       $id   State id.
     */
    public function insertCity($name, $stateId)
    {
        $sql = sprintf('INSERT INTO vista_addrs_cities (name, fk_state_id) VALUES (\'%s\',%d)',$name,$stateId);

        $this->exec($sql);

        return $this->lastInsertRowid();
    }


    /**
     * Inserts neighborhood.
     * 
     * @param string    $name City name. 
     * @param int       $id   State id.
     */
    public function insertNeighborhood($name, $cityId)
    {
        $sql = sprintf('INSERT INTO vista_addrs_neighborhoods (name, fk_city_id) VALUES (\'%s\',%d)',$name,$cityId);

        $this->exec($sql);

        return $this->lastInsertRowid();
    }


    /**
     * Delete neighborhood. 
     * 
     * @param int $id neighborhood id. 
     */
    public function deleteNeighborhood($id)
    {
        $sql = sprintf('DELETE FROM vista_addrs_neighborhoods WHERE id = %d', $id);

        $result = $this->exec($sql);

        if(!$result)
        {
            return false;
        } 
        else 
        {
            // Dados removidos com sucesso!
            return true;
        }
    }


    /**
     * Delete city. 
     * 
     * @param int $id City id. 
     */
    public function deleteCity($id)
    {
        $sql = sprintf('DELETE FROM vista_addrs_cities WHERE id = %d', $id);

        $result = $this->exec($sql);

        if(!$result)
        {
            return false;
        } 
        else 
        {
            // Dados removidos com sucesso!
            return true;
        }
    }


    /**
     * Get a city by its id. 
     * 
     * @param int $id City id.
     */
    public function getCityById($id)
    {
        $sql = sprintf('SELECT * FROM vista_addrs_cities WHERE id = %d',$id);

        return $this->querySingle($sql,true);
    }


    /**
     * Get a city by its id. 
     * 
     * @param int $id City id.
     */
    public function getNeighborhoodById($id)
    {
        $sql = sprintf('SELECT n.*, c.name AS city FROM vista_addrs_neighborhoods AS n, vista_addrs_cities AS c WHERE c.id = n.fk_city_id AND n.id = %d',$id);

        return $this->querySingle($sql,true);
    }


    /**
     * Removes all neighborhoods by city id. 
     * 
     * @param int $id City id.
     */
    public function deleteNeighborhoodsByCity($id)
    {
        $sql = sprintf('DELETE FROM vista_addrs_neighborhoods WHERE fk_city_id = %d', $id);

        $result = $this->exec($sql);

        if(!$result)
        {
            return false;
        } 
        else 
        {
            // Dados removidos com sucesso!
            return true;
        }
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