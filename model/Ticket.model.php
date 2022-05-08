<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Ticket extends Database {
    private $table = "tickets";

    function ticketTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('ticket'=>'welcome to ticket route');
    }

    // Get all tickets
    public function getAllTickets(){
        if(!$this->connect()) return;

        $sql =  "SELECT 
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
         ORDER BY `payment`.`date_of_payment` DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Get a single ticket
    public function getTicket($id){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table WHERE ticket_id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // Get a total ticket count
    public function getTicketCount(){
        if(!$this->connect()) return;

        $sql = "SELECT COUNT(1) from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }


    // Insert a ticket
    public function addTicket($bus_id ,$staff_id,$payment_id){

        if(!$this->connect()) return;

        $sql = "INSERT INTO $this->table (bus_id, staff_id, payment_id) 
				VALUES(:bus_id, :staff_id,:payment_id)";

		$stmt = $this->conn->prepare($sql);


        //bind data
        $stmt->bindParam(':staff_id', $staff_id);
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->bindParam(':payment_id', $payment_id);

        if($stmt->execute()){
            return json_encode(array('ok' => true, 'message' => 'Ticket was successfully added'));
        }
        else{
            return json_encode(array('ok' => false, 'message' => 'Failed to add ticket'));
        }
    }
}







?>