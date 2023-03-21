<?php

use App\Controllers\LoyaltyCustomerController;

require '../resources/helpers/helpers.php';

$controller = new LoyaltyCustomerController();
$response = $controller->index();
echo json_encode($response);