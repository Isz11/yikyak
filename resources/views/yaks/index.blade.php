@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <p>{{ session('mssg') }}</p>
        <h4 class="yak-title">All the yaks</h4><br>

        @foreach($yaks as $yak)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="row">
                                <div class="card-body col-xs-4">
                                    <h6>Posted by {{ $yak->user->name }}</h6>
                                    <h3><a href="/yaks/{{ $yak->id }}">{{ $yak->yak }}</a></h3>

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

                                    <br>
                                </div>
                                <div id="app" class="col-xs-4">
                                    @auth
                                        <!-- <p>The logged in user is {{ auth()->user()->id }} and this yak is id:{{ $yak->id }}</p> -->
                                        <vote-system yak-id="{{ $yak->id }}" yak-score="{{ $yak->score }}" user-id="{{ auth()->user()->id }}"></vote-system>
                                    @endauth
                                    @guest
                                        <p>Please login to vote on a yak</p>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
        @endforeach

    </div>

</div>
<a href="/yaks/newyak">Create a yak</a>


@endsection
