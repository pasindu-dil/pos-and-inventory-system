<?php

use App\Controllers\categoryController;

require '../resources/helpers/helpers.php';

$controller = new categoryController();
$response = $controller->update($_REQUEST);
echo json_encode($response);