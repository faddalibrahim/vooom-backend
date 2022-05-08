<?php

require_once(__DIR__."/../model/Driver.model.php");


function runDriverTest(){
    $driver = new Driver();
    return $driver->driverTest();
}

?>