<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\dbConnection as Connection;
use Exception;

class categoryController extends Controller
{
    public Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    /**
     * 
     */
    public function store($request)
    {
        try {
            $name = $request['name'];
            $response = $this->connection->create(
                'categories',
                [
                    'name',
                ],
                [
                    $name,
                ]
            );
            return ['success' => true, 'msg' => 'Customer successfully created!', 'data' => $response];
        } catch (Exception $e) {
            return ['success' => false, 'msg' => $e->getMessage()];
        }
    }

    /**
     * 
     */
    public function update($request)
    {
        try {
            $id = $request['id'];
            $name = $request['name'];
            $response = $this->connection->updateWithId('categories', "name = '$name'", $id);
            return ['success' => true, 'msg' => 'Category successfully updated!', 'data' => $response];
        } catch (Exception $e) {
            return ['success' => false, 'msg' => $e->getMessage()];
        }
    }

    /**
     * 
     */
    public function delete($request)
    {
        try {
            $response = $this->connection->deleteById('categories', $request['id']);
            return ['success' => true, 'msg' => 'Category successfully deleted!', 'data' => $response];
        } catch (\Exception $e) {
            return ['success' => false, 'msg' => $e->getMessage()];
        }
    }

    /**
     * 
     */
    public function dataTable()
    {
        $data[][] = [];
        $i = 0;
        $deleteBtn = "";
        $response = $this->connection->fetchAccoc('categories');
        $canDelete = '';
        $editBtn = '';
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "Super Admin")
            $canDelete = true;
        foreach ($response as $key => $value) {
            $editBtn = "<span role='button'><i class='fas fa-edit' data-id='$value[id]', data-name='$value[name]' onClick='edit(this)'></i></span>";
            // if ($canDelete) {
                $deleteBtn = "<span role='button'><i class='fas fa-trash mx-2' onClick='deleteItem($value[id])' ></i></span>";
            // }
            $data[$i] = [
                $value['id'],
                $value['name'],
                $editBtn . $deleteBtn
            ];
            $i++;
        }
        return [
            'data' => $data
        ];
    }
}