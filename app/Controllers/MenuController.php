<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\dbConnection as Connection;

class MenuController extends Controller
{
    public function index(): array
    {
        return $this->connection->selectColumns('menus', ['id', 'depth', 'title', 'url', 'depth', 'name',]);
    }
}