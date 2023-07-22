<?php

namespace App\Http\Livewire;

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
    public function incrementReaction($archiveId){
      if(Auth::check()){
        $this->archive->likes= ArchiveController::countReaction($archiveId);
      }
    }
}
