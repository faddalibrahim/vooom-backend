<?php
    require __DIR__."headers.php";

    $user = new User($db);
    
	$loginInputs = json_decode(file_get_contents("php://input"));
    
    $user->details = (array) $loginInputs;
    
    echo($user->login());

?>