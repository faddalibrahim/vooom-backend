<?php

require_once(__DIR__."/../model/Bus.model.php");


function runBusTest(){
    $bus = new Bus();
    return $bus->busTest();
}

function getAllBuses(){
    $bus = new Bus();
    $stmt = $bus->getAllBuses();

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'data' => array())));

    $all_buses = array('ok' => true, 'buses' => array());

    while($data = $stmt->fetch()){
        extract($data);

        $bus = array(
            'bus_id' => $bus_id,
            'bus_no' => $bus_no,
            'start_loc' => $start_loc,
            'destination' => $destination,
            'departure_time' => $departure_time,
            'arrival_time' => $arrival_time,
            'capacity' => $capacity,
            'availability' => $availability
        );

        array_push($all_buses['buses'],$bus);
    }

    exit(json_encode(array('data' => $all_buses)));
}

?>