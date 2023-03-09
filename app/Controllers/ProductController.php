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
        session_start();
        $data[][] = [];
        $i = 0;
        $deleteBtn = "";
        $response = $this->connection->fetchAccoc('products');
        $canDelete = '';
        $editBtn = '';
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "Super Admin")
            $canDelete = true;
        foreach ($response as $key => $value) {
            $category = $this->connection->selectColumnsWithWhereClause('categories', ['name'], "id=$value[category_id]");
            $subCategory = $this->connection->selectColumnsWithWhereClause('sub_categories', ['sub_category_name'], "id=$value[category_id]");
            $editBtn = "<button><i class='icon-md icon-trash' data-id='$value[id]' data-name='$value[name]' data-item_code='$value[item_code]' data-price='$value[price]' data-quantity='$value[quantity]' data-category_id='$value[category_id]' data-sub_category_id='$value[sub_category_id]' data-remarks='$value[remarks]' data-description='$value[description]' onClick='edit(this)'>Edit</i></button>";
            if ($canDelete) {
                $deleteBtn = "<button><i class='icon-md icon-trash' onClick='deleteItem($value[id])' >Delete</i></button>";
            }
            $data[$i] = [
                $value['id'],
                $value['name'],
                $value['item_code'],
                "Rs. " . $value['price'],
                $value['quantity'],
                $category['name'],
                $subCategory ? $subCategory['sub_category_id'] : '',
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

    /**
     * 
     */
    public function getCategories(): array
    {
        $response = $this->connection->fetchAccoc('categories');
        return $response;
    }

    /**
     * 
     */
    public function getSubCategories(): array
    {
        $response = $this->connection->fetchAccoc('sub_categories');
        return $response;
    }
}
