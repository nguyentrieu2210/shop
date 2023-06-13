<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function test1(Request $request) {
        return view("test1");
    }
    public function test2(Request $request) {
        // dd("ok");
        // $email=$request->email;
        // $password=$request->password;
        // dd($email."-".$password);
        // dd($request->all());
        $rules = [
            "email" => "required|email",
            "password" => "required|max:6|min:3"
        ];
        $message =[
            "email.email" => "Email phai la email",
            "email.required" => "Email khong duoc de trong",
            "password.required" => "password khong duoc de trong",
            "password.min" => "password toi thieu 3 ki tu",
            "password.max" => "password toi da 6 ki tu"
        ];
        $request->validate($rules, $message);
        if($request->email == "vietpro.edu.vn@gmail.com" && $request->password == "123456"){
            return redirect("/admin");
        }
        else{
            dd("fail");
        }
    }
}
