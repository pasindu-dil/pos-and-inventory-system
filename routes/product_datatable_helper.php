<?php

use App\Controllers\ProductController;

require '../resources/helpers/helpers.php';

$controller = new ProductController();
$response = $controller->dataTable();
echo json_encode($response);