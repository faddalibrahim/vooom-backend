<?php

require_once(__DIR__."/../config/database.config.php");


class ConnectionTest extends Database{
    public function test_db_connection(){
        if($this->connect()) return $this->connection_success;
        else return $this->connection_error;
    }
}

$connection_test = new ConnectionTest();
echo $connection_test -> test_db_connection();




?>