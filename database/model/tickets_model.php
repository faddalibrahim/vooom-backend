<?php 
#Import db connection class from db_conn.php
require_once(__DIR__."/../db-config/db_conn.php");

class TicketsModel extends DatabaseConnection{

    //add a ticket
    public function addTicket($ticket_id,$staff_id,$bus_id,$payment_id){
        $results = mysqli_query($this -> connect(),
            "INSERT INTO `tickets`(`ticket_id`,`staff_id`,`bus_id`,`payment_id`) 
            VALUES ('$ticket_id','$staff_id','$bus_id','$payment_id')"
           );
           if(!$results){
            die("Oh Shit! ticket insertion Failed in the Model");
           }else{
            return $results;    
        }
    }


    //get a Single ticket
    public function getTicket($ticket_id){
        $results = mysqli_query($this -> connect(),
        "SELECT 
        staff.staff_id,
        staff.first_name,
        staff.last_name,
        buses.start_loc,
        buses.destination,
        buses.bus_no,
        payment.amount,
        payment.date_of_payment
        FROM `staff` JOIN `tickets` ON `staff`.`staff_id` =`tickets`.`staff_id` 
        JOIN `buses` ON `buses`.`bus_id`=`tickets`.`bus_id`
        JOIN `payment` ON `payment`.`payment_id`=`tickets`.`payment_id` 
        WHERE `tickets`.`ticket_id`= `$ticket_id`");
        if(!$results){
            echo "model failed";
            return false;
        }else{
            return mysqli_fetch_all($results, MYSQLI_ASSOC);    
        }
    }

    //Get All Tickets
    public function getAllTickets(){
        $results = mysqli_query($this -> connect(),
        "SELECT 
        staff.staff_id,
        staff.first_name,
        staff.last_name,
        buses.start_loc,
        buses.destination,
        buses.bus_no,
        payment.amount,
        payment.date_of_payment
        FROM `staff` JOIN `tickets` ON `staff`.`staff_id` =`tickets`.`staff_id` 
        JOIN `buses` ON `buses`.`bus_id`=`tickets`.`bus_id`
        JOIN `payment` ON `payment`.`payment_id`=`tickets`.`payment_id`  
         ORDER BY `payment`.`date_of_payment` DESC");
        if(!$results){
            return false;
        }else{
            return mysqli_fetch_all($results, MYSQLI_ASSOC);   
        }
    }
    //Get Players count
    public function getTicketCount(){
        $results = mysqli_query($this -> connect(), 
        "SELECT COUNT(1) FROM `tickets`"
        );
        return mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    
}
?>