<?php

namespace App\Controllers;

use Exception;
use mysqli_sql_exception;

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
            $editBtn = "<span role='button'><i class='fas fa-edit' data-id='$value[id]', data-name='$value[name]', data-name='$value[name]', data-gender='$value[gender]', data-mobile='$value[mobile_number]', data-nic='$value[nic]', data-email='$value[email]', data-address='$value[address]' onClick='edit(this)'></i></span>";
            if ($canDelete) {
                $deleteBtn = "<span role='button'><i class='fas fa-trash mx-2' onClick='deleteItem($value[id])' ></i></span>";
            }
            $data[$i] = [
                $value['id'],
                $value['name'],
                $value['gender'],
                $value['mobile_number'],
                $value['nic'],
                $value['email'],
                $editBtn . $deleteBtn
            ];
            $i++;
        }
        return [
            'data' => $data
        ];
    }

    /**
     * This function use to save customer data.
     * 
     * @param array $request
     * @return array
     */
    public function store($request)
    {
        try {
            $name = $request['name'];
            $gender = $request['gender'];
            $address = $request['address'];
            $mobileNumber = $request['mobile'];
            $nic = $request['nic'];
            $email = $request['email'];
            $response = $this->connection->create(
                'loyalty_customers',
                [
                    'name',
                    'gender',
                    'address',
                    'mobile_number',
                    'nic',
                    'email',
                ],
                [
                    $name,
                    $gender,
                    $address,
                    $mobileNumber,
                    $nic,
                    $email
                ]
            );
            return ['success' => true, 'msg' => 'Customer successfully created!'];
        } catch (mysqli_sql_exception $th) {
            var_dump($th->getMessage());
        } catch (Exception $e) {
            var_dump($e->getMessage());
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
            $address = $request['address'];
            $gender = $request['gender'];
            $mobile = $request['mobile'];
            $nic = $request['nic'];
            $email = $request['email'];
            $response = $this->connection->updateWithId('loyalty_customers', "name = '$name', address = '$address', gender = '$gender', mobile_number = '$mobile', nic = '$nic', email = '$email'", $id);
            return ['success' => true, 'msg' => 'Customer successfully updated!', 'data' => $response];
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
            $response = $this->connection->deleteById('loyalty_customers', $request['id']);
            return ['success' => true, 'msg' => 'Customer successfully deleted!', 'data' => $response];
        } catch (Exception $e) {
            return ['success' => false, 'msg' => $e->getMessage()];
        }
    }
}