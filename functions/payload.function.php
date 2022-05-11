<?php


function getPayload(){
    return (array) json_decode(file_get_contents("php://input"));
}



?>