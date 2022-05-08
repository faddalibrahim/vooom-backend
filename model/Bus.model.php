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

    public function addBus($bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability){

        if(!$this->connect()) return;

        $sql = "INSERT INTO $this->table (bus_no, start_loc,destination,departure_time,arrival_time,capacity, availability) 
				VALUES(:bus_no, :start_loc, :destination, :departure_time, :arrival_time, :capacity, :availability)";

		$stmt = $this->conn->prepare($sql);


        //bind data
        $stmt->bindParam(':bus_no', $bus_no);
        $stmt->bindParam(':start_loc', $start_loc);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':departure_time', $departure_time);
        $stmt->bindParam(':arrival_time', $arrival_time);
        $stmt->bindParam(':capacity', $capacity);
        $stmt->bindParam(':availability', $availability);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'bus was successfully added'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to add bus'));
        }
    }
    public function deleteBus(){}
    public function updateBus(){}
    public function searchBus(){}
    public function selectActiveBus(){}

}







?>