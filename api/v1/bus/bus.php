<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Bus.controller.php");

// echo json_encode(runBusTest());
echo json_encode(getAllBuses());

?>