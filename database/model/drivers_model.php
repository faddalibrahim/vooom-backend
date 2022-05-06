<?php
    #Import db connection class from db_conn.php
    require_once(__DIR__."/../db-config/db_conn.php");

    class DriverModel extends DatabaseConnection{
        
        //SELECT ALL DRIVERS
        protected function selectAllDrivers(){
            $results = mysqli_query($this -> connect(), 
                "SELECT * FROM drivers"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //SELECT A DRIVER
        protected function selectDriver($driver_id){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM drivers
             WHERE driver_id = $driver_id"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //SELECT DRIVER BY SPECIAL ID & PIN
        protected function selectDriverPin($dirver_id, $pin){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM `drivers`
             WHERE `driver_id`='$driver_id' AND `pin`='$pin'"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //UPDATE DRIVER
        protected function updateDriver($driver_id, $bus_id, $fname, $lname, $pin){
            $result = mysqli_query($this -> connect(), 
            "UPDATE `drivers` SET `driver_id` = '$driver_id', `first_name` = '$fname',`last_name` = '$lname', `pin` = '$pin'
             WHERE `driver_id` = '$driver_id'"
            );
        }

        //DELETE DRIVER
        protected function  deleteDriver($driver_id){
            $results = mysqli_query($this -> connect(), 
            "DELETE FROM `drivers` WHERE `driver_id` = $driver_id"
            );  
        }

        //INSERT DRIVER
        protected function insertClient($driver_id, $fname, $lname, $pin){
            $results = mysqli_query($this -> connect(),
            "INSERT INTO `drivers`(`driver_id`, `first_name`, `last_name`, `pin`) 
            VALUES (''$driver_id', $fname','$lname','$pin')"
           );
       }

        // FETCH TOTAL NUMBER OF DRIVERS 
        protected function countDrivers(){
            $results = mysqli_query($this -> connect(), 
                "SELECT COUNT(1) FROM `drivers`"
            );
            $drivers = mysqli_fetch_all($results, MYSQLI_ASSOC);
            return $drivers[0]["COUNT(1)"];
        }
   
    }
?>