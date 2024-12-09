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
                ->select("id", "employee_code", "role_id", "first_name", "middle_name", "last_name", "official_email_id", "password", "avatar_name")
                ->where("employee_code", $request->input("userInput"))
                ->orWhere("official_email_id", $request->input("userInput"))
                ->first();

            if ($userCheck) {
                
                if (Hash::check($request->input("password"), $userCheck->password)) {

                    // check if admin or not
                    $adminStatus = DB::table("role_master")->select("is_admin")->where("role_id", $userCheck->role_id)->first();
                    if ($adminStatus) {
                        Session::put("userID", $userCheck->id);
                        Session::put("employee_code", $userCheck->employee_code);
                        Session::put("is_admin", $adminStatus->is_admin);
                        Session::put("first_name", $userCheck->first_name);
                        Session::put("middle_name", $userCheck->middle_name);
                        Session::put("last_name", $userCheck->last_name);
                        Session::put("email_id", $userCheck->official_email_id);
                        Session::put("avatar_name", $userCheck->avatar_name);

                        return redirect()->route("dashboard")->with("success", "Logged in Successfully");

                    } else {
                        $error = new MessageBag([
                            "userInput" => "Wrong Email / Employee Code",
                            "password" => "Wrong Password"
                        ]);

                        return back()->withErrors($error)->withInput();
                    }

                } else {
                    $error = new MessageBag([
                        "password" => "Wrong Password"
                    ]);

                    return back()->withErrors($error)->withInput();
                }

            } else {
                $error = new MessageBag([
                    "userInput" => 'Wrong Email / Employee Code'
                ]);

                return back()->withErrors($error)->withInput();
            }

        }

    }

}
