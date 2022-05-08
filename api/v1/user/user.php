<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/User.controller.php");

echo json_encode(runUserTest());

?>