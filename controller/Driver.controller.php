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


function addBus($bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability){

    $driver = new Bus();
    $result = $driver->addBus($bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability);

    return $result;

}

function deleteBus($bus_id){
    $driver = new Bus();
    $result=$driver->deleteBus($bus_id);
    return $result;
}

function updateBus($bus_id,$bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability){
    $driver = new Bus();
    $result = $driver->updateBus($bus_id,$bus_no, $start_loc, $destination, $departure_time, $arrival_time, $capacity, $availability);

    return $result;
}



?>