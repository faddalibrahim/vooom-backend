<?php

require_once __DIR__."/../../../require/headers.require.php";

require_once __DIR__."/../../../class/admin/Admin.class.php";

$admin = new Admin;

print_r(json_encode($admin -> adminTest()));

?>