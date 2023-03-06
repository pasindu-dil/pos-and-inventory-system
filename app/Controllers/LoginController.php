<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Exceptions\DataDoesNotExistException;
use Exception;

class LoginController extends Controller
{
    public function login($request)
    {
        try {
            $values = $this->connection->selectColumnsWithWhereClause('users', ['email', 'password', 'id', 'role_id'], "email='$request[email]'");
            if ($values && $values['email'] === $request['email'] && $values['password'] === $request['password']) {
                $_SESSION['user_id'] = $values['id'];
                $role = $this->connection->selectColumnsWithWhereClause('roles', ['role_name'], "id=$values[role_id]");
                $_SESSION['role'] = $role['role_name'];
                return ['success' => true, 'msg' => 'User successfully logged!'];
            }
        } catch (DataDoesNotExistException $exception) {
            return ['success' => false, 'msg' => $exception->getMessage()];
        }
    }
}