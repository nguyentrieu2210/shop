<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        return view("backend/users/listuser");
    }
    public function create() {
        return view("backend/users/adduser");
    }
    public function edit() {
        return view("backend/users/edituser");
    }
    public function delete() {
        return "delete User";
    }
    public function update() {
        return view("backend/users/listuser");
    }
}
