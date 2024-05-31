<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = [
            [
                "id" => 1,
                "rolId" => 1,
                "name" => "Admin",
                "email" => "admin@mottor.com",
                "password" => "admin",
            ]
            ];

            return view('login', [
                "users" => $users
            ]);
    }
}
