<?php

use App\Controllers\LoginController;

require '../resources/helpers/helpers.php';

$loginController = new LoginController();
$response = $loginController->login($_REQUEST);
echo json_encode($response);