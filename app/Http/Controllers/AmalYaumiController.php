<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AmalYaumi;
use App\Models\AmalYaumiMapping;

class AmalYaumiController extends Controller
{
  public function index(){
    $doDateLast=date_create();
    date_sub($doDateLast, date_interval_create_from_date_string("7 days"));

    $amalYaumiMaster = AmalYaumi::where('user_id', Auth::id())->get();

    $amalYaumiReport = AmalYaumiMapping::where('user_id', Auth::id())
                      ->where('do_date', '>=', date_format($doDateLast,"Y-m-d"))
                      ->orderBy('do_date')
                      ->get();
                      
    $amalYaumiRecent = AmalYaumiMapping::where('user_id', Auth::id())
                      ->where('do_date', '=', date("Y-m-d"))
                      ->get();

    return view('amalyaumi.amalyaumi', [
      'amalYaumiMaster' => $amalYaumiMaster[0],
      'amalYaumiReport' => AmalYaumiController::processReport($amalYaumiReport),
      'amalYaumiRecent' => $amalYaumiRecent,
    ]);
  }

  private function processReport($amalYaumiReport){
    $reports = array();
    $report_labels = array();
    $report_counts = array();
    $report_wordings = array();

    foreach ($amalYaumiReport as $report) {
      $count = 0;
      if($report->subuh == '1'){
        $count++;
      }
      if($report->dzuhur == '1'){
        $count++;
      }
      if($report->ashar == '1'){
        $count++;
      }
      if($report->maghrib == '1'){
        $count++;
      }
      if($report->isya == '1'){
        $count++;
      }
      if($report->dhuha == '1'){
        $count++;
      }
      if($report->witir == '1'){
        $count++;
      }
      if($report->read_quran == '1'){
        $count++;
      }
      if($report->shodaqoh == '1'){
        $count++;
      }
      if($report->syukur == '1'){
        $count++;
      }
      if($report->doa_for_parent == '1'){
        $count++;
      }
      if($report->doa_for_friend == '1'){
        $count++;
      }

      array_push($report_labels, $report->do_date);
      array_push($report_counts, $count);
      array_push($report_wordings, $count . "/12");
    }

    $reports = [
      'labels' => $report_labels,
      'counts' => $report_counts,
      'wordings' => $report_wordings
    ];

    return $reports;
  }
}
