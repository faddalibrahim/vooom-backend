<?php
    #Import db connection class from db_conn.php
    require_once(__DIR__."/../db-config/db_conn.php");

    class BusModel extends DatabaseConnection{
        
        //SELECT ALL BUSES
        protected function selectAllBuses(){
            $results = mysqli_query($this -> connect(), 
                "SELECT * FROM buses"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //SELECT A BUS FROM DATABASE
        protected function selectBus($bus_id){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM buses
             WHERE bus_id = $bus_id"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //SELECT A ACTIVE BUSES FROM DATABASE
        protected function selectActiveBus($bus_id){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM `buses`
             WHERE `bus_id` = '$bus_id' AND `availability` = 'yes'"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }


        //UPDATE BUS IN DATABASE
        protected function updateBus($bus_id, $bus_no, $start_loc, $destination,
        $depature_time, $arrival_time , $capacity, $availability){
            $result = mysqli_query($this -> connect(), 
            "UPDATE `companies` SET `bus_id`='$bus_id',`bus_no`='$bus_no',`start_loc`='$start_loc',
            `destination`='$destination', `depature_time`='$depature_time',`arrival_time`='$arrival_time',
            `capacity`='$capacity',`availability`='$availability',
             WHERE `bus_id` = '$bus_id'"
            );
        }


        //DELETE BUS FROM DATABASE
        protected function  deleteBus($bus_id){
            $results = mysqli_query($this -> connect(), 
            "DELETE FROM `buses` WHERE `bus_id` = $bus_id"
            );  
        }

        //INSERT BUS
        protected function insertBus($bus_id, $bus_no, $start_loc, $destination,
        $depature_time, $arrival_time , $capacity, $availability){
            $results = mysqli_query($this -> connect(),
            "INSERT INTO `buses`(`bus_id`, `bus_no`, `start_loc`, `destination`, `departure_time`, 
            `arrival_time`, `capacity`, `availability`) 
            VALUES ('$bus_id','$bus_no','$start_loc','$destination','$departure_time','$arrival_time',
            '$capacity','$availability')"
           );
       }

        //FETCH TOTAL NUMBER OF BUSES
        protected function countBus(){
            $results = mysqli_query($this -> connect(), 
                "SELECT COUNT(1) FROM `buses`"
            );
            $buses = mysqli_fetch_all($results, MYSQLI_ASSOC);
            return $buses[0]["COUNT(1)"];
        }

    }
?>