<?php

namespace App\Http\Livewire;
use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserArchiveCaption extends Component
{
    public $archive;

    public function render()
    {
        return view('livewire.user-archive-caption');
    }

    /**
     * @return void
     */
    public function incrementOwnReaction($archiveId){
      if(Auth::check()){
        $this->archive->likes= ArchiveController::countReaction($archiveId);
      }
    }
}
