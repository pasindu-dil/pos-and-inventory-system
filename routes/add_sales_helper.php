<?php

use App\Controllers\SalesController;

require '../resources/helpers/helpers.php';

$controller = new SalesController();
$response = $controller->store($_REQUEST);
echo json_encode($response);