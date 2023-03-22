<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function todaysSales()
    {
        $query = "SELECT SUM(total) as total FROM sales LIMIT 10";
        $data = $this->connection->getCount($query);
        
        return $data[0][0];
    }

    public function todaysCustomers()
    {
        $query = "SELECT COUNT(id) FROM loyalty_customers LIMIT 10";
        $data = $this->connection->getCount($query);
        
        return $data[0][0];
    }

    public function totalProducts()
    {
        $query = "SELECT COUNT(id) FROM products";
        $data = $this->connection->getCount($query);
        
        return $data[0][0];
    }
}