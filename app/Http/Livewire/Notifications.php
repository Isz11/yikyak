<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Yak;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function markAsRead($notification_id, $url)
    {
        auth()->user()->unreadNotifications->where('id', $notification_id)->markAsRead();
        return redirect()->to($url);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect(request()->header('Referer'));
        //$this->emit('refreshComponent');
        //$this->emit('render');
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
