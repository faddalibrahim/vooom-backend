<?php

require_once(__DIR__."/../model/Admin.model.php");


function runAdminTest(){
    $admin = new Admin();
    return $admin->adminTest();
}

?>