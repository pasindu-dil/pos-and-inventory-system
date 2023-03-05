<?php

use App\Controllers\ProductController;

require '../../helpers/helpers.php';

$controller = new ProductController();
$response = $controller->store($_REQUEST);
echo json_encode($response);