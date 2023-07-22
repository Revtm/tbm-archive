<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Auth;

class ArchiveCaption extends Component
{
    public $archive;

    public function render(){
        return view('livewire.archive-caption');
    }

    /**
     * @return void
     */
    public function incrementReaction($archiveId){
      if(Auth::check()){
        $this->archive->likes= ArchiveController::countReaction($archiveId);
      }
    }
}
