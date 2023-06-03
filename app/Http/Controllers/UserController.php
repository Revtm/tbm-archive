<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index($username){
    $user = Auth::user();
    if($username == $user->name){
      return view('user.user', ['user' => $user]);
    }
    return view('home.home', ['user' => $user]);
  }


}
