<?php 
/**
 * This controller loads the property module.  
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */


namespace AppVista\Controllers;

use AppVista\Core\MasterController as MasterController;
use AppVista\Model\Address as tbAdress;
use AppVista\Config\Config as cfg;

class Property extends MasterController
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
    public function index($id)
    {
        $neigh  = $this->tbAddress->getNeighborhoodById($id);
        $bairro = $this->formatAreaName($neigh['name']);
        $cidade = $this->formatAreaName($neigh['city']);
        $gmap   = $bairro . '%20' . $cidade; 

        // Filtros de pesquisa
        $dados = array(
            'fields' => array('Cidade', 'Bairro', 'ValorVenda'),
            'filter'    => array(array('Bairro'  => array($bairro)),'Cidade' => $cidade)
        );
        
        $postFields  =  json_encode($dados);
        $key         =  cfg::$apiKey; 
        $url         =  cfg::$sandboxAddress . $key . '&pesquisa=' . $postFields;
         
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
        $result = curl_exec($ch);
         
        $result = json_decode($result, true);
        
        include(self::MDL_PATH . $this->getClassRootName(__CLASS__) . '/list.php');
    }


    /**
     * Prepares the text for the API.
     * 
     * @param string $text The text to be converted.
     * @return string
     */
    private function formatAreaName($text)
    {
        $text = trim($text);
        $text = preg_replace("/[\/_|+ -]+/", '+', $text);
        $text = strtolower($text);
        $text = str_replace (".","-",$text);
        $text = str_replace ("_","-",$text);
        $text = str_replace ("&","e",$text);
        $text = str_replace ("ë","e",$text);
        $text = str_replace ("ç","c",$text);
        $text = str_replace ("á","a",$text);
        $text = str_replace ("à","a",$text);
        $text = str_replace ("ã","a",$text);
        $text = str_replace ("â","a",$text);
        $text = str_replace ("é","e",$text);
        $text = str_replace ("ê","e",$text);
        $text = str_replace ("í","i",$text);
        $text = str_replace ("ï","i",$text);
        $text = str_replace ("ó","o",$text);
        $text = str_replace ("ô","o",$text);
        $text = str_replace ("õ","o",$text);
        $text = str_replace ("ö","o",$text);
        $text = str_replace ("ú","u",$text);
        $text = str_replace ("ü","u",$text);
        $text = str_replace ('--','',$text);
        $text = str_replace ('---','',$text);
        $text = str_replace ('----','',$text);
        $text = str_replace ('-----','',$text);
        $text = str_replace ('------','',$text);
        $text = str_replace ('-------','',$text);
        
        return $text;
    }

    
}

#EOF