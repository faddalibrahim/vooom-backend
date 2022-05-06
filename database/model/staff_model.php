
<?php 
#Import db connection class from db_conn.php
require_once(__DIR__."/../db-config/db_conn.php");

class StaffModel extends DatabaseConnection{

    //add a staff
    public function addStaff($staff_id,$first_name,$last_name,$email,$password){
        $results = mysqli_query($this-> connect(),
            "INSERT INTO `staff`(`staff_id`, `first_name`, `last_name`, `email`,`password`) 
            VALUES ('$staff_id','$first_name','$last_name','$email','$password')"
           );

        if(!$results){
            echo "Staff Insertion Model Failed";
        }else{
            //echo "Staff insertion Model passed";
            return $results;
        }
    }

    //update a staff
    public function updateStaff($staff_id,$first_name,$last_name,$email,$password){
        $results = mysqli_query($this -> connect(),
        "UPDATE `staff` SET `staff_id`='$staff_id', `fname`='$first_name', `lname`='$last_name', `email`='$email', `password`='$password'
        WHERE `staff_id`='$staff_id'");
        return $results;
        
    }

    //Delete staff
    public function deleteStaff($staff_id){
        $results = mysqli_query($this -> connect(),
        "DELETE FROM `staff` WHERE `staff_id`='$staff_id'");
        return $results;
    }

    //get a Single staff
    public function getStaff($staff_id){
        $results = mysqli_query($this -> connect(),
        "SELECT * FROM `staff` 
        WHERE `staff_id`='$staff_id'");

        if(!$results){
            echo "model failed";
            return false;
        }else{
            return mysqli_fetch_all($results, MYSQLI_ASSOC);  
        }
    }

    //Get All staff
    public function getAllStaff(){
        $results = mysqli_query($this -> connect(),
        "SELECT * FROM `staff`");
        if(!$results){
            echo "model failed";
            return false;
        }else{
            return mysqli_fetch_all($results, MYSQLI_ASSOC);    
        }
    }
    //Get staff count
    public function getPersonCount(){
        $results = mysqli_query($this -> connect(), 
        "SELECT COUNT(1) FROM `staff`"
        );
        if(!$results){
            echo "model failed";
            return false;
        }else{
            return mysqli_fetch_all($results, MYSQLI_ASSOC);   
        }
    }

    
}

?>