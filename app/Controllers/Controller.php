<?php

namespace App\Controllers;

class Controller
{
    /**
     * 
     */
    public function sendResponse($message, $title): object
    {
        return toastr()->success($message, $title);
    }
}