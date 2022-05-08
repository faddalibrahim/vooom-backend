<?php

require_once(__DIR__."/../config/database.config.php");


/**
 * 
 * Comments
 * 
 */
class User extends Database {
    function userTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('user'=>'welcome to user route');
    }

}







?>