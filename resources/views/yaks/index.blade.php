@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p>{{ session('mssg') }}</p>
        <div class="row">
            <h4 class="yak-title">All the yaks</h4><br>
        </div>
    <div>
        @foreach($yaks as $yak)
            
            <div class="col-md-20">
                <div class="card">
                    <div class="row">
                        <div class="row justify-content-start">
                            <h6>Posted by {{ $yak->user->username }}</h6>
                        </div>

                        <div class="row">
                            @livewire('yak-scores', ['yak' => $yak])
                        </div>
                        <div>
                            <div class="col align-self-end">
                                <h4><a href="/yaks/{{ $yak->id }}">{{ $yak->yak }}</a></h4>
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            {{ get_time_ago($yak->created_at) }} ---

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
            </div>
        @endforeach
        </div>
        <div>
            <a href="/yaks/newyak">Create a yak</a>
        </div>
    </div>
</div>



@endsection
