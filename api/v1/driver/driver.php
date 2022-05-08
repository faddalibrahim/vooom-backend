<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Driver.controller.php");

// echo json_encode(runDriverTest());

// GET REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'GET'){

    (count($_GET) === 0 
        ? exit(json_encode(getAllDrivers())) : array_key_exists('driver_id',$_GET)) 
        ? exit(json_encode(getDriver($_GET['driver_id']))) : exit("hello");
}

// POST REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = (array) json_decode(file_get_contents("php://input"));


    echo addBus($data['bus_no'], $data['start_loc'], $data['destination'], $data['departure_time'], $data['arrival_time'], $data['capacity'], $data['availability']);
}


// DELETE REQUESTS

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    // echo "yess delete request";

    $data = (array) json_decode(file_get_contents("php://input"));

    return deleteBus($data["bus_id"]);
    // echo  $data['bus_id'];
}

// PUT REQUESTS

if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    // exit(json_encode(var_dump($_POST)));
    $data = (array) json_decode(file_get_contents("php://input"));
    
    echo updateBus($data["bus_id"],$data["bus_no"],$data["start_loc"],$data["destination"],$data["departure_time"],$data["arrival_time"],$data["capacity"],$data["availability"]);
    
}


?>