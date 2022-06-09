<?php

namespace App\Http\Livewire;

use App\Models\Yak;
use App\Models\Vote;
use Livewire\Component;

class Votes extends Component
{

    public $yak;
    public $totalScore;

    public function mount($yak)
    {
        $this->yak = $yak;
        $this->totalScore = $yak->score;
    }

    public function render()
    {
        return view('livewire.votes');
    }

    public function vote($vote)
    {
        if (Vote::where('yak_id', $this->yak->id)
            ->where('user_id', auth()->id())
            ->where('vote', $vote)
            ->count()) {
            $this->totalScore += $vote;
        } else {
            $this->totalScore += $vote;
            Vote::create([
                'yak_id' => $this->yak->id,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);
        }
    }
}
