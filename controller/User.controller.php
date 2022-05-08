<?php

require_once(__DIR__."/../model/User.model.php");


function runUserTest(){
    $user = new User();
    return $user->userTest();
}

?>