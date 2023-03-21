<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SalesController extends Controller
{
    public function dataTable(): array
    {
        $data[][] = [];
        $i = 0;
        $deleteBtn = "";
        $sql = "SELECT *, sales.id as sale_id FROM `sales`, `products` WHERE sales.item_id = products.id";
        $response = $this->connection->getDataByQuery($sql);
        $canDelete = '';
        $editBtn = '';
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "Super Admin")
            $canDelete = true;
        foreach ($response as $key => $value) {
            $category = $this->connection->selectColumnsWithWhereClause('categories', ['name'], "id=$value[category_id]");
            //            $subCategory = $this->connection->selectColumnsWithWhereClause('sub_categories', ['sub_category_name'], "id=$value[category_id]");
            $editBtn = "<span role='button'><i class='fas fa-edit' data-id='$value[id]' data-name='$value[name]' data-item_code='$value[item_code]' data-price='$value[price]' data-quantity='$value[quantity]' data-category_id='$value[category_id]' data-sub_category_id='$value[sub_category_id]' data-remarks='$value[remarks]' data-description='$value[description]' onClick='edit(this)'></i></sapn>";
            // if ($canDelete) {
            //     $deleteBtn = "<span role='button'><i class='fas fa-trash mx-2' onClick='deleteItem($value[id])' ></i></span>";
            // }
            $data[$i] = [
                $value['sale_id'],
                $value['item_code'],
                $value['name'],
                $value['order_quantity'],
                "Rs. " . $value['price'],
                "Rs. " . $value['total'],
                $category['name'],
                //                $subCategory ? $subCategory['sub_category_id'] : '',
                $value['remarks'],
                $value['description'],
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

    public function store($request)
    {
        var_dump($request);
    }
}