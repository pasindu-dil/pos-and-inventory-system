<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Exception;

class LoginController extends Controller
{
    public function login($request)
    {
        try {
            $values = $this->connection->selectColumnsWithWhereClause('users', ['email', 'password', 'id'], "email='$request[email]'");
            if ($values && $values['email'] === $request['email'] && $values['password'] === $request['password']) {
                $_SESSION['user_id'] = $values['id'];
                return ['success' => true, 'msg' => 'User successfully logedin!'];
            } else {
                return ['success' => false, 'msg' => 'Username or password is incorrect!'];
            }
        } catch (Exception $exception) {
            return ['success' => false, 'msg' => $exception->getMessage()];
        }
    }
}