@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
        <h2>{{ $yak->yak }}</h2>
            <p>{{ get_time_ago($yak->created_at) }}</p>
            <a href="/yaks">Back to all yaks</a>
            @auth
                @if( Auth::user()->id == $yak->user )
                    <form class="" action="{{ route('yaks.destroy', $yak->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>A delete button</button>
                    </form>
                @endif
            @endauth
            <br><br><br>
            @foreach($replies as $reply)
                <div class="">
                    <div class="">
                        {{ $reply->reply }}
                    </div>
                    <div class="">
                        {{ get_time_ago($reply->created_at) }}
                        <br>
                    </div>
                </div>

                <br><br>
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
