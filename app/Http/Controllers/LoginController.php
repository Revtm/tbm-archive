<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(){
    if(Auth::check()){
      $user = Auth::user();
      return redirect()->route('user', ['username' => $user->name]);
    }
    return view('login.login');
  }

  /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function authenticate(Request $request){
      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          $user = Auth::user();

          return redirect()->route('user', ['username' => $user->name]);
      }

      return back()->with('failed', 'Email atau kata sandi kamu salah nih :(');
  }

  public function logout(Request $request){
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/');
  }
}
