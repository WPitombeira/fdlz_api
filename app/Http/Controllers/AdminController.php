<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;

class AdminController extends Controller {
    private $model;
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    public function authenticate(Request $request){
        $this->validate($request, ['email' => 'required', 'password' => 'required']);

        $user = Admin::where('email', $request->input('email'))->first();

        if($request->input('password') == $user->password){
            $apiKey = base64_encode(Str::random(40));

            Admin::where('email', '=', $request->input('email'))->update(['token' => "$apiKey"]);

            return response()->json(['status' => 'success', 'token' => $apiKey]);
        } else {
            return response()->json(['status' => 'fail'], 401);
        }
    }
}