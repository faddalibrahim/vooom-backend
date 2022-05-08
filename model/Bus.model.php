<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Bus extends Database {
    private $table = "buses";

    function busTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('bus'=>'welcome to bus route');
    }

    public function getAllBuses(){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getBus($id){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table WHERE bus_id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function addBus(){

    }
    public function deleteBus(){}
    public function updateBus(){}
    public function searchBus(){}
    public function selectActiveBus(){}

}







?>