<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Staff extends Database {
    private $table = "staff";

    function driverTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('driver'=>'welcome to staff route');
    }

    // Get all drivers
    public function getAllDrivers(){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Get a single driver
    public function getDriver($id){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table WHERE driver_id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Insert a driver
    public function addDriver($bus_id, $first_name , $last_name , $pin){

        if(!$this->connect()) return;

        $sql = "INSERT INTO $this->table (bus_id, first_name,last_name,pin) 
				VALUES(:bus_id, :first_name, :last_name, :pin)";

		$stmt = $this->conn->prepare($sql);


        //bind data
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':pin', $pin);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'driver was successfully added'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to add driver'));
        }
    }

    // Get a total ticket count
    public function getDriverCount(){
        if(!$this->connect()) return;

        $sql = "SELECT COUNT(1) from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Delete a driver
    public function deleteDriver($driver_id){
        if(!$this->connect()) return;

        // sql to delete a record
        $sql = "DELETE FROM $this->table WHERE driver_id=:driver_id";
        $stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':driver_id', $driver_id);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'Driver was Successfully deleted'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to delete Driver'));
        }
    }
  

    // Update a driver
    public function updateDriver($driver_id,$bus_id , $first_name , $last_name , $pin){

        if(!$this->connect()) return;
        
        $sql = "UPDATE $this->table SET bus_id=:bus_id, first_name=:first_name,last_name=:last_name,pin=:pin 
				WHERE driver_id=$driver_id";
    

		$stmt = $this->conn->prepare($sql);


        //bind data
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':pin', $pin);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'Driver was successfully updated'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to update driver'));
        }
    }

}







?>