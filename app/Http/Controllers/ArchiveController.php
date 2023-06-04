<?php

namespace App\Http\Controllers;
use App\Models\UserArchive;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ArchiveController extends Controller{

  public function getOwnArchives($id){
    $archives = UserArchive::where('user_id', '=', $id)
            ->orderByDesc('created_at')
            ->simplePaginate(15);
    return $archives;
  }

  public function getAllArchives(){
    $archives = UserArchive::orderByDesc('created_at')->simplePaginate(15);
    return $archives;
  }

  public function getOwnArchivesCount($id){
    $archivesCount = UserArchive::where('user_id', '=', $id)->count();
    return $archivesCount;
  }

  public function archivePost(Request $request){
    $youtubeVideoId = "";

    $firstValidation = Validator::make($request->all(),[
        'archive_type' => 'required',
        'archive_source' => 'required',
    ]);

    if($firstValidation->fails()){
      return back()->with("failed", "Please fill the blank form")->withInput();
    }

    if($request->archive_type == 1){ //yt
      $secondValidation = Validator::make($request->all(), [
          'archive_yt_url' => 'required',
      ]);

      if($secondValidation->fails()){
        return back()->with("failed", "Please fill the blank form")->withInput();
      }

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

      $explodedYoutubeVideoId = explode("&", $youtubeVideoId);
      if(count($explodedYoutubeVideoId) > 1){
        $youtubeVideoId = $explodedYoutubeVideoId[0];
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
      $secondValidation = Validator::make($request->all(),[
          'archive_image' => ['required'],
      ]);

      return back()->with("info", "Sorry, this feature has not been implemented yet");
    }

    return redirect()->route('user', ['username' => Auth::user()->name])->with("success", "Successfully archived, Alhamdulillah");
  }
}
