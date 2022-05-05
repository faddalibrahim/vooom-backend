<?php

require_once __DIR__."/../../../require/headers.require.php";


require_once __DIR__."/../../../class/user/User.class.php";

$user = new User;

print_r(json_encode($user -> userTest()));

?>