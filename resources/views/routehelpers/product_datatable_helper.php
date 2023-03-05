<?php

use App\Controllers\ProductController;

require '../../helpers/helpers.php';

$controller = new ProductController();
$response = $controller->dataTable($_REQUEST);
echo json_encode($response);