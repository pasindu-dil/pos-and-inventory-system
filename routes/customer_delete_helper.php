<?php

use App\Controllers\LoyaltyCustomerController;

require '../resources/helpers/helpers.php';

$controller = new LoyaltyCustomerController();
$response = $controller->delete($_REQUEST);
echo json_encode($response);