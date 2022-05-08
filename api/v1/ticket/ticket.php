<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Ticket.controller.php");

// GET REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'GET'){

    (count($_GET) === 0 
        ? exit(json_encode(getAllTickets())) : array_key_exists('ticket_id',$_GET)) 
        ? exit(json_encode(getTicket($_GET['ticket_id']))) : exit("hello");
}

// POST REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = (array) json_decode(file_get_contents("php://input"));

    echo addTicket($data['bus_id'], $data['staff_id'], $data['payment_id']);
}








?>