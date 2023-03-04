<?php

use App\Controllers\LoginController;

require '../../helpers/helpers.php';

$loginController = new LoginController();
$response = $loginController->login($_REQUEST);
echo json_encode($response);