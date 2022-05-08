<?php

require_once(__DIR__."/../model/Ticket.model.php");


function runTicketTest(){
   $ticket = new Ticket();
    return $ticket->ticketTest();
}

function getAllTickets(){
   $ticket = new Ticket();
    $stmt =$ticket->getAllTickets();

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'data' => array())));

    $all_tickets = array('ok' => true, 'tickets' => array());

    while($data = $stmt->fetch()){
        extract($data);

       $ticket = array(
            'staff_id' => $staff_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'start_loc' => $start_loc,
            'destination' => $destination,
            'bus_no' => $bus_no,
            'amount' => $amount,
            'date_of_payment' => $date_of_payment
        );

        array_push($all_tickets['tickets'],$ticket);
    }

    exit(json_encode(array('data' => $all_tickets)));
}

function getTicket($id){
   $ticket = new $Ticket();
    $stmt =$ticket->getTicket($id);

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'message' => "no such Ticket")));

   $ticket = array('ok' => true, 'ticket' => null);

    while($data = $stmt->fetch()){
        extract($data);

        $ticketss = array(
            'staff_id' => $staff_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'start_loc' => $start_loc,
            'destination' => $destination,
            'bus_no' => $bus_no,
            'amount' => $amount,
            'date_of_payment' => $date_of_payment
        );

       $ticket['ticket'] = $ticketss;
    }

    exit(json_encode(array('data' =>$ticket)));
}


function addTicket($staff_id , $bus_id , $payment_id){

   $ticket = new Ticket();
    $result =$ticket->addTicket($staff_id , $bus_id , $payment_id);

    return $result;

}







?>