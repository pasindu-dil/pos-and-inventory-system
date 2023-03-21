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
                    'remarks',
                    'description',
                ],
                [
                    $name,
                    $itemCode,
                    $sellingPrice,
                    $quantity,
                    $categoryId,
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
            $category = $this->connection->selectColumnsWithWhereClause('categories', ['name'], "id=$value[category_id]");
            //            $subCategory = $this->connection->selectColumnsWithWhereClause('sub_categories', ['sub_category_name'], "id=$value[category_id]");
            $editBtn = "<span role='button'><i class='fas fa-edit' data-id='$value[id]' data-name='$value[name]' data-item_code='$value[item_code]' data-price='$value[price]' data-quantity='$value[quantity]' data-category_id='$value[category_id]' data-sub_category_id='$value[sub_category_id]' data-remarks='$value[remarks]' data-description='$value[description]' onClick='edit(this)'></i></sapn>";
            if ($canDelete) {
                $deleteBtn = "<span role='button'><i class='fas fa-trash mx-2' onClick='deleteItem($value[id])' ></i></span>";
            }
            $data[$i] = [
                $value['id'],
                $value['name'],
                $value['item_code'],
                "Rs. " . $value['price'],
                ($value['quantity'] != 0) ? $value['quantity'] : "<span class='badge bg-gradient-danger'>out of stock</span>",
                $category['name'],
                //                $subCategory ? $subCategory['sub_category_id'] : '',
                $value['remarks'],
                $value['description'],
                $editBtn . $deleteBtn
            ];
            $i++;
        }
        if (empty($data[0][0])) {
            return [
                'data' => []
            ];
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
    public function update($request): array
    {
        try {
            $id = $request['id'];
            $name = $request['name'];
            $itemCode = $request['itemCode'];
            $sellingPrice = $request['sellingPrice'];
            $quantity = $request['quantity'];
            $categoryId = $request['category'];
            $remarks = $request['remarks'];
            $description = $request['description'];
            $response = $this->connection->updateWithId('products', "name = '$name', item_code = '$itemCode', price = '$sellingPrice', quantity = '$quantity', category_id = '$categoryId', remarks = '$remarks', description = '$description'", $id);
            return ['success' => true, 'msg' => 'Product successfully updated!', 'data' => $response];
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
            $response = $this->connection->deleteById('products', $request['id']);
            return ['success' => true, 'msg' => 'Product successfully deleted!', 'data' => $response];
        } catch (\Exception $e) {
            return ['success' => false, 'msg' => $e->getMessage()];
        }
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
