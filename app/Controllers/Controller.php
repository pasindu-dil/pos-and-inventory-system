<?php

namespace App\Controllers;

use Symfony\Component\Dotenv\Dotenv;
use App\Models\dbConnection as Connection;

class Controller
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    /**
     * 
     */
    public function sendResponse($message, $title): object
    {
        return toastr()->success($message, $title);
    }
}