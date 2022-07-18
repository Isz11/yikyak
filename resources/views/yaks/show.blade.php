@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-20">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1 align-self-center">
                        @livewire('votes', ['yak' => $yak])
                    </div>
                    <div class="col" style="color: gray">
                        <div class="row">
                            <h6>Posted by <a style="text-decoration: none; color: gray;" href="{{ route('profile.show',$yak->user->username) }}">
                                {{ $yak->user->username }}</a></h6>
                        </div>
                        <div class="row">
                            <h4>{{ $yak->yak }}</h4>
                        </div>
                        <div class="row">
                            {{ get_time_ago($yak->created_at) }}
                        </div>
                        <div class="row">
                            <i class="fa fa-1x fa-map-marker" aria-hidden="true"></i>
                            <p>~ Less than a mile away</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a href="/yaks">Back to all yaks</a>
            @auth
                @if( Auth::user()->id == $yak->user_id )
                    <form class="" action="{{ route('yaks.destroy', $yak->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>A delete button</button>
                    </form>
                @endif
            @endauth
        <br><br><br>
        <h6>Replies</h6>
        @foreach($replies as $reply)
        <div class="card">
            <div class="card-body">
                <div class="col">
                    <div class="row" style="color: gray">
                        <h6>Posted by
                            <a style="text-decoration: none; color: gray;" href="{{ route('profile.show',$reply->user->username) }}">
                                {{ $reply->user->username }}</a>
                        </h6>
                    </div>
                    <div class="row" style="color: gray">
                        <h4>
                            {{ $reply->reply }}
                        </h5>
                    </div>
                    <div class="row" style="color: gray">
                        {{ get_time_ago($reply->created_at) }}
                        <br>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @auth
            <form class="" action="{{ route('replies.store', $yak->id) }}" method="post">
                @csrf
                <textarea name="reply" id="reply" rows="8" cols="80" placeholder="Enter your reply here..."></textarea><br>
                <input type="submit" name="submit" value="Submit reply">
            </form>
        @endauth

    </div>
</div>

@endsection
