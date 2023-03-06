<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Exception;
use mysqli_sql_exception;

class ProductController extends Controller
{
    /**
     * @param array $request
     * @return array
     */
    public function store(array $request): array
    {
        try {
            $name = $request['name'];
            $itemCode = $request['itemCode'];
            $sellingPrice = $request['sellingPrice'];
            $quantity = $request['quantity'];
            $categoryId = $request['category'];
            $subCategoryId = $request['subCategory'];
            $remarks = $request['remarks'];
            $description = $request['description'];
            $response = $this->connection->create(
                'products',
                [
                    'name',
                    'item_code',
                    'price',
                    'quantity',
                    'category_id',
                    'sub_category_id',
                    'remarks',
                    'description',
                ],
                [
                    $name,
                    $itemCode,
                    $sellingPrice,
                    $quantity,
                    $categoryId,
                    $subCategoryId,
                    $remarks,
                    $description
                ]
            );
            return ['success' => true, 'msg' => 'Product successfully created!'];
        } catch (mysqli_sql_exception $th) {
            var_dump($th->getMessage());
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * @return array[]
     */
    public function dataTable(): array
    {
        $data[][] = [];
        $i = 0;
        $deleteBtn = "";
        $response = $this->connection->fetchAccoc('products');
        $canDelete = '';
        $editBtn = '';
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "Super Admin")
            $canDelete = true;
        foreach ($response as $key => $value) {
            $editBtn = "<i class='icon-md icon-trash'>Edit</i>";
            if ($canDelete) {
                $deleteBtn = "<i class='icon-md icon-trash'>Delete</i>";
            }
            $data[$i] = [
                $value['id'],
                $value['name'],
                $value['item_code'],
                "Rs. " . $value['price'],
                $value['quantity'],
                $value['category_id'],
                $value['sub_category_id'],
                $value['remarks'],
                $value['description'],
                $deleteBtn . $editBtn
            ];
            $i++;
        }
        return [
            'data' => $data
        ];
    }

    /**
     * @param array $request
     * @return array
     */
    public function addBulk(array $request): array
    {
        move_uploaded_file($request['bulk_file'], '../storage');
        return [];
    }
}
