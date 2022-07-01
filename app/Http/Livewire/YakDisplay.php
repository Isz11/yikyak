<?php

namespace App\Http\Livewire;

use Livewire\Component;

class YakDisplay extends Component
{
    public $yaks;

    public function sort()
    {
        
    }

    public function render()
    {
        return view('livewire.yak-display');
    }
}
