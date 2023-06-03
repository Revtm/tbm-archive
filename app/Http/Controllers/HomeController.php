<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchiveController;

class HomeController extends Controller
{
    public function index(){
      if(Auth::check()){
        $archives = ArchiveController::getAllArchives();
        return view('home.home', [
          'user' => Auth::user(),
          'archives' => $archives,
        ]);
      }
      return view('home.home');
    }
}
