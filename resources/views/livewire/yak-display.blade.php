<div>
@foreach($yaks as $yak)
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
                            <h4><a href="/yaks/{{ $yak->id }}" style="text-decoration: none; color: gray">{{ $yak->yak }}</a></h4>
                        </div>
                        <div class="row">
                            {{ get_time_ago($yak->created_at) }} &bull; 

                            Nearby &bull; 
                            
                            @if($yak->reply->where('yak_id', $yak->id)->count() === 1)
                                {{ $yak->reply->where('yak_id', $yak->id)->count() }} reply
                            @else
                                {{ $yak->reply->where('yak_id', $yak->id)->count() }} replies
                            @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
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
                </div> -->
            </div>
        </div>
    </div>
@endforeach
</div>