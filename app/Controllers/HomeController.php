<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\dbConnection as Connection;

class HomeController extends Controller
{
    public Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function index(): array
    {
        return $this->connection->selectAll('users');
    }

    public function success()
    {
        $this->sendResponse("Success message", "Congrats");
    }
}