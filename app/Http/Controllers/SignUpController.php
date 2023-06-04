<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function index(){
      return view('signup.signup');
    }

    public function signUpWeb(Request $request){
      $validation = Validator::make($request->all(),[
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',
      ]);

      if($validation->fails()){
        return back()->with('failed', 'Please fill the empty form');
      }

      $savedUser = User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);

      return redirect()->route('login');
    }

    public function signUp(Request $request){
      $token = $request->header('X-Auth-Token');
      if($token == 'S74AHGJD5454'){
        $validate = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $savedUser = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);

        return $savedUser;
      }

      return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
