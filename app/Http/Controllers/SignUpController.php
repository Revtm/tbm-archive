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
          'username' => 'required|max:15|min:5',
          'email' => 'required|email:rfc,dns,spoof',
          'password' => 'required',
      ]);

      if($validation->fails()){
        return back()->with('failed', $validation->errors());
      }

      $savedUser = User::create([
        'name' => preg_replace('/\s+/', '_', $request->username),
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);

      return redirect()->route('login')->with('success', 'Your account has been successfully registered');
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
