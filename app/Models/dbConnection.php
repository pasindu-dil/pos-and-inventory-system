<?php

namespace App\Models;

use App\Exceptions\DataDoesNotExistException;
use Exception;
use mysqli;
use Symfony\Component\Dotenv\Dotenv;
use Throwable;

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
        } catch (Throwable $th) {
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
        } catch (Throwable $th) {
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
        } catch (Throwable $th) {
            return ["status" => "500", "msg" => $th];
        }
    }

    public function fetchAccoc($tblName): array
    {
        $query = "SELECT * FROM $tblName";
        try {
            $row = [];
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row_1 = mysqli_fetch_assoc($result)) {
                    array_push($row, $row_1);
                }
            }
            return $row;
        } catch (Throwable $th) {
            //throw $th;
        }
    }

    public function selectColumnsWithWhereClause(string $tblName, array $columns, string $condition): array
    {
        $columns = $this->implodeArray($columns);
        $query = "SELECT $columns FROM $tblName WHERE $condition";
        $result = mysqli_query($this->conn, $query);
        if (!mysqli_num_rows($result)) {
            return [];
        }
        return mysqli_fetch_assoc($result);
    }

    /**
     * This function insert data to database and return response array
     * @param string $tblName is table name
     * @param array $columns is column set in table
     * @return bool
     */
    public function create(string $tblName, array $columns, array $values): bool
    {
        $escapedValues = array_map(function ($values) {
            return "'" . mysqli_real_escape_string($this->conn, $values) . "'";
        }, $values);
        $columns = $this->implodeArray($columns);
        $values = $this->implodeArray($escapedValues);
        $query = "INSERT INTO $tblName ($columns) VALUE ($values)";
        $result = mysqli_query($this->conn, $query);
        if (!$result) throw new Exception("Error Processing Request", 1);
        return $result;
    }

    /**
     * This function help to implode array using comma
     * @param array $arr
     * @return string
     */
    public function implodeArray(array $arr): string
    {
        return implode(', ', $arr);
    }
}
