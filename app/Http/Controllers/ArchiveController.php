<?php

namespace App\Http\Controllers;
use App\Models\UserArchive;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ArchiveController extends Controller{

  public function getOwnArchives($id){
    $archives = UserArchive::where('user_id', '=', $id)
            ->orderByDesc('created_at')
            ->simplePaginate(15);
    return $archives;
  }

  public function archivePost(Request $request){
    $youtubeVideoId = "";

    $request->validate([
        'archive_type' => ['required'],
        'archive_source' => ['required'],
    ]);

    if($request->archive_type == 1){ //yt
      $request->validate([
          'archive_yt_url' => ['required'],
      ]);

      $expoldedYoutubeUrl = explode("?v=", $request->archive_yt_url);
      if(count($expoldedYoutubeUrl) == 2){
        $youtubeVideoId = $expoldedYoutubeUrl[1];
      }else{
        $expoldedYoutubeShortUrl = explode("shorts/", $request->archive_yt_url);
        if(count($expoldedYoutubeShortUrl) == 2){
          $youtubeVideoId = $expoldedYoutubeShortUrl[1];
        }else{
          $expoldedYoutubeSimpleUrl = explode(".be/", $request->archive_yt_url);
          if(count($expoldedYoutubeSimpleUrl) == 2){
            $youtubeVideoId = $expoldedYoutubeSimpleUrl[1];
          }else{
            return back()->withInput()->with("failed", "Invalid youtube url, please input valid url");
          }
        }
      }

      $savedUserArchive = UserArchive::create([
        'user_id' => Auth::id(),
        'archive_type'=> $request->archive_type,
        'source'=> $request->archive_source,
        'archive_origin' => $youtubeVideoId,
        'captions'=> $request->archive_caption,
        'likes' => 0,
      ]);

    }else if($request->archive_type == 2){ //img
      $request->validate([
          'archive_image' => ['required'],
      ]);
    }

    return redirect()->route('user', ['username' => Auth::user()->name])->with("success", "Archive success, Alhamdulillah");
  }
}
