<?php

namespace App\Http\Livewire;

use App\Models\Yak;
use App\Models\Vote;
use Livewire\Component;

class Votes extends Component
{
    public $yak;
    public $total_score;
    public $arrow_up = 'lightgray';
    public $arrow_down = 'lightgray';
    public $vote_colour = 'gray';
    public $existing_vote;

    public function mount($yak)
    {
        $this->yak = $yak;
        $this->total_score = $yak->score;

        $this->existing_vote = Vote::where('yak_id', $this->yak->id)
            ->where('user_id', auth()->id())
            ->where('vote', '!=', 0)
            ->first();

        if ($this->existing_vote != null) {
            if ($this->existing_vote->vote === 1) {
                $this->arrow_up = 'limegreen';
            }
    
            if ($this->existing_vote->vote === -1) {
                $this->arrow_down = 'red';
            }
        }

        if ($this->total_score > 0) {
            $this->vote_colour = 'limegreen';
        } elseif ($this->total_score < 0) {
            $this->vote_colour = 'red';
        }
    }

    public function render()
    {
        return view('livewire.votes');
    }

    public function vote($vote)
    {
        if ($this->existing_vote != null) {
            if ($this->existing_vote->vote == $vote) {
                $this->total_score += $vote * -1;
                $this->arrow_up = 'lightgray';
                $this->arrow_down = 'lightgray';
                Vote::where('id', $this->existing_vote->id)
                    ->update(['vote' => 0]);
            } else {
                $this->total_score += $vote - $this->existing_vote->vote;
                if ($vote === 1) {
                    $this->arrow_up = 'limegreen';
                    $this->arrow_down = 'lightgray';
                } else {
                    $this->arrow_up = 'lightgray';
                    $this->arrow_down = 'red';
                }
                Vote::where('id', $this->existing_vote->id)
                    ->update(['vote' => $vote]);
            }

            Yak::where('id', $this->yak->id)
                ->update(['score' => $this->total_score]);
        }

        if ($this->existing_vote == null) {
            if ($vote === 1) {
                $this->arrow_up = 'limegreen';
            } else {
                $this->arrow_down = 'red';
            }

            $this->total_score += $vote;

            Yak::where('id', $this->yak->id)
                ->update(['score' => $this->total_score]);

            Vote::create([
                'yak_id' => $this->yak->id,
                'user_id' => auth()->id(),
                'vote' => $vote,
            ]);

            $this->existing_vote = Vote::where('yak_id', $this->yak->id)
                ->where('user_id', auth()->id())
                ->first();
        }
    }
}
