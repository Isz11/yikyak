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

    public function mount($yak)
    {
        $this->yak = $yak;
        $this->total_score = $yak->score;

        if (Vote::where('yak_id', $this->yak->id)
            ->where('user_id', auth()->id())
            ->where('vote', 1)
            ->first() != null) {
            $this->arrow_up = 'limegreen';
        }

        if (Vote::where('yak_id', $this->yak->id)
            ->where('user_id', auth()->id())
            ->where('vote', -1)
            ->first() != null) {
            $this->arrow_down = 'red';
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

    public function vote($vote) //need to sort the readability of this function out
    {
        $existing_vote = Vote::where('yak_id', $this->yak->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existing_vote == null || $existing_vote->vote == 0) {
            $this->total_score += $vote;

            if ($vote === 1) {
                $this->arrow_up = 'limegreen';
            } else {
                $this->arrow_down = 'red';
            }

            Yak::where('id', $this->yak->id)
                ->update([
                    'score' => $this->total_score
            ]);
            
            if ($existing_vote == null) {
                Vote::create([
                    'yak_id' => $this->yak->id,
                    'user_id' => auth()->id(),
                    'vote' => $vote
                ]);
            } else {
                Vote::where('id', $existing_vote->id)
                    ->update([
                        'vote' => $vote
                ]);
            }
            

        } elseif ($existing_vote->vote == $vote) {
            $this->total_score += $vote * -1;
            Vote::where('id', $existing_vote->id)
                ->update([
                    'vote' => 0
            ]);
            Yak::where('id', $this->yak->id)
                ->update([
                    'score' => $this->total_score
            ]);
            $this->arrow_up = 'lightgray';
            $this->arrow_down = 'lightgray';
        } else {
            $this->total_score += $vote - $existing_vote->vote;
            Vote::where('id', $existing_vote->id)
                ->update([
                    'vote' => $vote
            ]);
            Yak::where('id', $this->yak->id)
                ->update([
                    'score' => $this->total_score
            ]);
            if ($vote === 1) {
                $this->arrow_up = 'limegreen';
                $this->arrow_down = 'lightgray';
            } else {
                $this->arrow_up = 'lightgray';
                $this->arrow_down = 'red';
            }
        }
    }
}
