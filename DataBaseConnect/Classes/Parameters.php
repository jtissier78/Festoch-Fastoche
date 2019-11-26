<?php

/**
 * Recove element from json file.
 * 
 * @author JTissier <jtissier78@gmail.com>
 */
class Parameters{
    
    /**
     * Undocumented function
     * @author JTissier <jtissier78@gmail.com>
     * @param string $categorie
     * @param string $info
     * @return void
     */
    function getParameter(string $categorie, string $info){
        $parameters='IdSQL.json';
        $data=file_get_contents($parameters,true);
        $parameter= json_decode($data,true);
        return $parameter[$categorie][$info];
    }
}