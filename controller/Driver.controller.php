<?php

require_once(__DIR__."/../model/Driver.model.php");


function runDriverTest(){
    $driver = new Driver();
    return $driver->driverTest();
}

function getAllDrivers(){
    $driver = new Driver();
    $stmt = $driver->getAllDrivers();

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'data' => array())));

    $all_drivers = array('ok' => true, 'drivers' => array());

    while($data = $stmt->fetch()){
        extract($data);

        $driver = array(
            'driver_id' => $driver_id,
            'bus_id' => $bus_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'pin' => $pin
        );

        array_push($all_drivers['drivers'],$driver);
    }

    exit(json_encode(array('data' => $all_drivers)));
}

function getDriver($id){
    $driver = new Driver();
    $stmt = $driver->getDriver($id);

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'message' => "no such driver")));

    $driver = array('ok' => true, 'driver' => null);

    while($data = $stmt->fetch()){
        extract($data);

        $driverr = array(
            'driver_id' => $driver_id,
            'bus_id' => $bus_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'pin' => $pin
        );

        $driver['driver'] = $driverr;
    }

    exit(json_encode(array('data' => $driver)));
}


function addDriver($bus_id , $first_name , $last_name , $pin){

    $driver = new Driver();
    $result = $driver->addDriver($bus_id , $first_name , $last_name , $pin);

    return $result;

}

function deleteDriver($driver_id){
    $driver = new Driver();
    $result=$driver->deleteDriver($driver_id);
    return $result;
}

function updateDriver($driver_id,$bus_id , $first_name , $last_name , $pin){
    $driver = new Driver();
    $result = $driver->updateDriver($driver_id,$bus_id , $first_name , $last_name , $pin);

    return $result;
}



?>