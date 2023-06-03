<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignUpController extends Controller
{
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
