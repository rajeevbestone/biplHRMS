<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showLoginForm() {
        // $pass = bcrypt("Bestone@2911");
        // echo $pass;
       
        $data = [];

        return view("auth.login", $data);
    }

    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(), [
            "userInput" => "required",
            "password" => "required"
        ], [
            "userInput.required" => "Email / Emp Code is required",
            "password.required" => "Password is required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            // check for userInput field
            $userCheck = DB::table("employee_master")
                ->select("id", "employee_code", "role_id", "first_name", "middle_name", "last_name", "official_email_id", "password")
                ->where("employee_code", $request->input("userInput"))
                ->orWhere("official_email_id", $request->input("userInput"))
                ->first();

            if ($userCheck) {
                die("456");
            } else {
                die("123");
            }

        }

    }

}
