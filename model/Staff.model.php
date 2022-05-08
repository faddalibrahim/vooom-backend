<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Staff extends Database {
    private $table = "staff";

    function staffTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('satff'=>'welcome to staff route');
    }

    // Get all staffs
    public function getAllStaff(){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Get a single staff
    public function getStaff($id){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table WHERE staff_id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
  

    // Insert a staff
    public function addStaff($first_name , $last_name ,$email, $password){

        if(!$this->connect()) return;

        $sql = "INSERT INTO $this->table (first_name,last_name,email,password) 
				VALUES(:first_name, :last_name, :email, :password)";

		$stmt = $this->conn->prepare($sql);


        //bind data
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'staff was successfully added'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to add staff'));
        }
    }


    // Delete a staff
    public function deleteStaff($staff_id){
        if(!$this->connect()) return;

        // sql to delete a record
        $sql = "DELETE FROM $this->table WHERE staff_id=:staff_id";
        $stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':staff_id', $staff_id);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'staff was Successfully deleted'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to delete staff'));
        }
    }
  

    // Update a driver
    public function updateStaff($staff_id,$first_name , $last_name ,$email, $password){

        if(!$this->connect()) return;
        
        $sql = "UPDATE $this->table SET first_name=:first_name,last_name=:last_name,email=:email,password=:password 
				WHERE staff_id=$staff_id";
    

		$stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'Staff was successfully updated'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to update staff'));
        }
    }

}







?>