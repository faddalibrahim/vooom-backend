
<?php

/**
 * * handle null exceptions for getPayload() to avoid making queries for null column name
 *
 * * create constants for 
 */

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Bus.controller.php");

require_once(__DIR__."/../../../functions/payload.function.php");

require_once(__DIR__."/../../../constants/constants.php");


// GET REQUESTS
if($_SERVER[REQUEST_METHOD] === GET){

    (count($_GET) === 0 
        ? exit(json_encode(getAllBuses())) : array_key_exists('bus_id',$_GET)) 
        ? exit(json_encode(getBus($_GET['bus_id']))) : exit("hello");
}

// POST REQUESTS
if($_SERVER[REQUEST_METHOD] === POST){

    $payload = getPayload();


    exit(addBus($payload['bus_no'], $payload['start_loc'], $payload['destination'], $payload['departure_time'], $payload['arrival_time'], $payload['capacity'], $payload['availability']));
}


// DELETE REQUESTS
if($_SERVER[REQUEST_METHOD] === DELETE){

    $payload = getPayload();
    exit(deleteBus($payload["bus_id"]));
}

// PUT REQUESTS

if($_SERVER[REQUEST_METHOD] === PUT){
    $payload = getPayload();
    
    echo updateBus($payload["bus_id"],$payload["bus_no"],$payload["start_loc"],$payload["destination"],$payload["departure_time"],$payload["arrival_time"],$payload["capacity"],$payload["availability"]);
    
}



?>