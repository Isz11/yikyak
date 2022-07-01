@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <div class="row"><h4>{{ $user->username }}</h4></div>
                        <div class="row">{{ $yakarma }} yakarma</div>
                    </div>
                </div>
                <div class="card-body">
                    Possible bio here
                </div> 
                @if(count($yaks))
                    <div class="card-body">
                        <h5>All of {{ $user->username }}'s yaks</h5>
                    </div>
                    @foreach($yaks as $yak)
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
                                        <h4><a href="/yaks/{{ $yak->id }}" style="color: gray">{{ $yak->yak }}</a></h4>
                                    </div>
                                    <div class="row">
                                        {{ get_time_ago($yak->created_at) }} &bull; 

                                        Nearby &bull; 
                                        
                                        @php $count = 0 @endphp
                                        @foreach($replies as $reply)
                                            @if ($reply->yak_id == $yak->id)
                                                @php $count++ @endphp
                                            @endif
                                        @endforeach

                                        @if ($count == 1)
                                            {{ $count }} reply
                                        @else
                                            {{ $count }} replies
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 align-self-center">
                                    @auth
                                    <div class="nav-item dropdown">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="color: gray">
                                            ...
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a class="dropdown-item" href="#">
                                                Delete
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Report
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Option 3
                                            </a>
                                        </div>
                                    </div>
                                    @endauth
                                </div>
                            <div class="col">
                                Leave a reply
                            </div>
                            <div class="col">
                                Share
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        This user has no yaks
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
