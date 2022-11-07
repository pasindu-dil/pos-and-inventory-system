<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function success()
    {
        $this->sendResponse("Success message", "Congrats");
    }
}