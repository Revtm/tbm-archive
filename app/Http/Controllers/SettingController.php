<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AmalYaumi;
use App\Models\AmalYaumiMapping;

class SettingController extends Controller
{
    public function index(){
      $user = Auth::user();
      $amalYaumiMaster = AmalYaumi::where('user_id', Auth::id())->get();
      return view('setting.setting', [
        'user' => $user,
        'amalYaumiStatus' => $amalYaumiMaster[0]->status,
      ]);
    }

    public function saveSetting(Request $request){
      $savedAmalYaumi = AmalYaumi::where('user_id', Auth::id())
                  ->update([
                      'status' => SettingController::convertSettingStatus($request->join_amal_yaumi),
                  ]);

      $amalYaumiRecent = AmalYaumiMapping::where('user_id', Auth::id())
                          ->where('do_date', '=', date("Y-m-d"))
                          ->get();

      if(count($amalYaumiRecent) == 0){
        $createAmalYaumiMapping = AmalYaumiMapping::create([
          'user_id' => Auth::id(),
          'do_date' => date("Y-m-d")
        ]);
      }

      return redirect()->route('setting')
            ->with("success", "Your setting was updated successfully, Alhamdulillah");
    }

    private function convertSettingStatus($status){
      if(!$status){
        return '0';
      }else if($status === "on"){
        return '1';
      }else{
        return '0';
      }
    }
}
