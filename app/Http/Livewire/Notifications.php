<?php

namespace App\Http\Livewire;

use App\Models\Yak;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications = [];

    public function render()
    {
        return view('livewire.notifications');
    }
}
