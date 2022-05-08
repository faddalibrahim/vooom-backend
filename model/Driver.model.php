<?php

require_once(__DIR__."/../config/database.config.php");


/**
 * 
 * Comments
 * 
 */
class Driver extends Database {
    function driverTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('driver'=>'welcome to driver route');
    }

}







?>