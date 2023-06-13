<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getLogin() {
        return view("backend/login");
    }
    public function postLogin(Request $request) {
        $rules = [
            "email" => "required|email",
            "password" => "required|max:6|min:3"
        ];
        $messages = [
            "email.required" => "Email không được để trống",
            "email.email" => "Định dạng Email không đúng",
            "password.required" => "Mật khẩu không được để trống",
            "password.max" => "Mật khẩu tối đa 6 ký tự",
            "password.min" => "Mật khẩu tối thiểu 3 kí tự"
        ];
        $request->validate($rules, $messages);
        if($request->email=="vietpro.edu.vn@gmail.com" && $request->password=="123456") {
            $request->session()->put("email", $request->email);
            return redirect("/admin");
        }else{
            return redirect()->back()->withErrors("Taì khoản không hợp lệ!");
        }
    }
}
