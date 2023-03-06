<?php

namespace App\Controllers;

class LoyaltyCustomerController extends Controller
{
    /**
     * @return array[]
     */
    public function index(): array
    {
        $data[][] = [];
        $i = 0;
        $deleteBtn = "";
        $response = $this->connection->fetchAccoc('loyalty_customers');
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
                $value['gender'],
                $value['mobile_number'],
                $value['nic'],
                $value['email'],
                $deleteBtn . $editBtn
            ];
            $i++;
        }
        return [
            'data' => $data
        ];
    }
}