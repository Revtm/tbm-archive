<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchiveController;

class UserController extends Controller
{
  public function index($username){
    $user = Auth::user();
    if($username == $user->name){
      $archives = ArchiveController::getOwnArchives(Auth::id());
      return view('user.user', [
        'user' => $user,
        'ownArchives' => $archives,
      ]);
    }
    return view('home.home', ['user' => $user]);
  }
}
