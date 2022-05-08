<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Staff.controller.php");

// echo json_encode(runDriverTest());

// GET REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'GET'){

    (count($_GET) === 0 
        ? exit(json_encode(getAllStaff())) : array_key_exists('staff_id',$_GET)) 
        ? exit(json_encode(getStaff($_GET['staff_id']))) : exit("hello");
}

// POST REQUESTS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = (array) json_decode(file_get_contents("php://input"));


    echo addStaff($data['first_name'], $data['last_name'], $data['email'],$data['password']);
}


// DELETE REQUESTS

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    // echo "yess delete request";

    $data = (array) json_decode(file_get_contents("php://input"));
   
    return deleteStaff($data["staff_id"]);
   
}

// PUT REQUESTS

if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    // exit(json_encode(var_dump($_POST)));
    $data = (array) json_decode(file_get_contents("php://input"));
    
    echo updateStaff($data['staff_id'],$data['first_name'], $data['last_name'], $data['email'],$data['password']);
}


?>