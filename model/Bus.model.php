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
    public function deleteBus($bus_id){
        if(!$this->connect()) return;

        // sql to delete a record
        $sql = "DELETE FROM $this->table WHERE bus_id=:bus_id";
        $stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':bus_id', $bus_id);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'bus was Successfully deleted'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to delete bus'));
        }
    }
  

    public function updateBus($bus_id,$bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability){

        if(!$this->connect()) return;
        "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
        $sql = "UPDATE $this->table SET bus_no=:bus_no, start_loc=:start_loc,destination=:destination,departure_time=:departure_time,arrival_time=:arrival_time,capacity= :capacity, availability=:availability 
				WHERE bus_id=$bus_id";

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
            return json_encode(array('ok' => true, 'message' => 'bus was successfully updated'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to update bus'));
        }
    }

}







?>