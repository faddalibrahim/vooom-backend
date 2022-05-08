<?php

require_once(__DIR__."/../model/Staff.model.php");


    function runStaffTest(){
    $staff = new Staff();
    return $staff->driverTest();
}

function getAllStaff(){
    $staff = new Staff();
    $stmt = $staff->getAllStaff();

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'data' => array())));

    $all_staff = array('ok' => true, 'staff' => array());

    while($data = $stmt->fetch()){
        extract($data);

        $staff = array(
            'staff_id'=>$staff_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
        );

        array_push($all_staff['staff'],$staff);
    }

    exit(json_encode(array('data' => $all_staff)));
}

function getStaff($id){
    $staff = new Staff();
    $stmt = $staff->getStaff($id);

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'message' => "no such staff")));

    $staff = array('ok' => true, 'staff' => null);

    while($data = $stmt->fetch()){
        extract($data);

        $staff = array(
            'staff_id'=>$staff_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
        );

        $staff['staff'] = $stafff;
    }

    exit(json_encode(array('data' => $staff)));
}


function addStaff($first_name , $last_name ,$email, $password){

    $driver = new Staff();
    $result = $driver->addStaff($first_name , $last_name ,$email, $password);

    return $result;

}

function deleteStaff($staff_id){
    $staff = new Staff();
    $result=$staff->deleteStaff($staff_id);
    return $result;
}

function updateStaff($staff_id,$first_name , $last_name ,$email, $password){
    $staff = new Staff();
    $result = $staff->updateStaff($staff_id,$first_name , $last_name ,$email, $password);

    return $result;
}



?>