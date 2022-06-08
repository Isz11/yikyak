<?php

namespace App\Http\Livewire;

use App\Models\Yak;
use Livewire\Component;

class YakScores extends Component
{

    public $yak;

    public function mount($yak)
    {
        $this->yak = $yak;
    }

    public function render()
    {
        return view('livewire.yak-scores');
    }

    public function vote($vote)
    {
        
    }
}
