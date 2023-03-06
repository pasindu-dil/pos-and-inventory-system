<?php

use App\Controllers\ProductController;

require '../resources/helpers/helpers.php';

$controller = new ProductController();
$response = $controller->store($_REQUEST);
echo json_encode($response);