<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        if($request->password === $request->confirmPassword) {
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->pass_word = hash('md5' , $request->password);
            $user->save();
            $msg = "Registered Succesfully! You can now log in to your new account!";
            return redirect("/login")->with(['msg' => $msg]);
        } else {
            abort(404);
        }
    }

    public function login(Request $request) {
        $user = User::where('name', '=', $request->username)->first();

        if($user) {
            if(hash('md5' , $request->password) === $user->pass_word) {
                echo "logged in";
            } else {
                echo "wrong password";
            }
        } else {
            echo "wrong username";
        }
    }
}
