<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Bus.controller.php");

// GET REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'GET'){

    (count($_GET) === 0 
        ? exit(json_encode(getAllBuses())) : array_key_exists('bus_id',$_GET)) 
        ? exit(json_encode(getBus($_GET['bus_id']))) : exit("hello");

}

// POST REQUESTS

// DELETE REQUESTS

// PUT REQUESTS

// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//     // exit(json_encode(var_dump($_POST)));
//     $data = json_decode(file_get_contents("php://input"));

//     echo json_encode(getBus($data->bus_id));
// }

// echo json_encode(runBusTest());
// echo json_encode(getAllBuses());
// echo json_encode(getBus("1"));

?>