<?php

use App\Controllers\categoryController;

require '../resources/helpers/helpers.php';

$controller = new categoryController();
$response = $controller->delete($_REQUEST);
echo json_encode($response);