<?php

namespace App\Models;

use mysqli;
use Symfony\Component\Dotenv\Dotenv;

class dbConnection 
{
    private $dotenv;
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connection();
    }

    public function connection(): object
    {
        $servername = $_ENV['DATABSE_HOST'];
        $username = $_ENV['DATABASE_USER'];
        $password = $_ENV['DATABASE_PASSWORD'];
        $database = $_ENV['DATABASE_NAME'];

        try {
            return new mysqli($servername, $username, $password, $database);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function selectAll($tblName): array
    {
        $query = "SELECT * FROM $tblName";
        try {
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_all($result);
            }
        } catch (\Throwable $th) {
            return ["status" => "500", "msg" => $th];
        }
    }

    public function selectColumns(string $tblName, array $columns): array
    {
        $columns = implode(',', $columns);
        $query = "SELECT $columns FROM $tblName";
        try {
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_all($result);
            }
        } catch (\Throwable $th) {
            return ["status" => "500", "msg" => $th];
        }
    }

    public function fetchAccoc($result): array
    {
        $row= [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row = array_push($row);
        }
        var_dump($row);exit;
        return $row;
    }
}