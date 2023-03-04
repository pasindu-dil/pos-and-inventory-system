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
            $values = $this->connection->selectColumnsWithWhereClause('users', ['email', 'password', 'id'], "email='$request[email]'");
            if ($values && $values['email'] === $request['email'] && $values['password'] === $request['password']) {
                $_SESSION['user_id'] = $values['id'];
                return ['success' => true, 'msg' => 'User successfully logedin!'];
            }
        } catch (DataDoesNotExistException $exception) {
            return ['success' => false, 'msg' => $exception->getMessage()];
        }
    }
}