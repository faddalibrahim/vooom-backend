<?php

require_once(__DIR__."/../../../require/headers.require.php");

require_once(__DIR__."/../../../controller/Admin.controller.php");

echo json_encode(runAdminTest());

?>