<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Admin extends Database {
    function adminTest(){
        // if(!$this->connect()) return $this->connection_error;
        return array('admin'=>'welcome to admin route');
    }

}







?>