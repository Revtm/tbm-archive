<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArchiveController;

class UserController extends Controller{

  public function index($username){
    $user = Auth::user();
    if($username == $user->name){
      $archives = ArchiveController::getOwnArchives(Auth::id());
      $archivesCount = ArchiveController::getOwnArchivesCount(Auth::id());

      return view('user.user', [
        'user' => $user,
        'ownArchives' => $archives,
        'ownArchivesCount' => $archivesCount,
      ]);
    }
    return redirect()->route('home')->with('failed', 'profil '.$username.' privat');
  }

  public function editArchive($userName, $archiveId){
    if(Auth::check()){
      $user = Auth::user();
      $archive = ArchiveController::getOneOwnArchive(Auth::id(), $archiveId);
      if($archive == null){
        return redirect()->route('user', ['username' => Auth::user()->name])
        ->with("failed", "Gagal menemukan arsipmu, sepertinya sudah kamu hapus");
      }
      return view('archive.editarchive', [
        'user' => $user,
        'archive' => $archive,
      ]);
    }
    return view('home.home');
  }
}
