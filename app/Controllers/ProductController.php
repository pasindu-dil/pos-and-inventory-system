<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Exception;
use mysqli_sql_exception;

class ProductController extends Controller
{
    /**
     * 
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
                    'cub_category_id',
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
     * 
     */
    public function dataTable(array $request): array
    {
        $data[][] = [];
        $i = 0;
        $deleteBtn = "<i class='icon-md icon-trash'>Delete</i>";
        $response = $this->connection->fetchAccoc('products');
        $canDelete = '';
        foreach ($response as $key => $value) {
            $data[$i] = [
                $value['name'],
                $value['item_code'],
                "Rs. " . $value['price'],
                $value['quantity'],
                $value['remarks'],
                $value['description'],
                $deleteBtn
            ];
            $i++;
        }
        return [
            'data' => $data
        ];
    }
}
