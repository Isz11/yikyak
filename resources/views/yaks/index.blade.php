@extends('layouts.app')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
        <p>{{ session('mssg') }}</p>

        <h4>All the yaks</h4><br>

        @foreach($yaks as $yak)
            <div class="">
                <div class="">
                    <h3><a href="/yaks/{{ $yak->id }}">{{ $yak->yak }}</a></h3>
                </div>
                <div class="">
                    {{ get_time_ago($yak->created_at) }} ---
                    <?php
                        $reply_count = array_count_values(array_column($replies, 'yak'))[$yak->id]; // how can I do this in blade syntax
                    ?>

                    @if ($reply_count == 1)
                        {{ $reply_count }} reply
                    @else
                        {{ $reply_count }} replies
                    @endif

                    <br>
                </div>
                <div class="">
                    Yak score: {{ $yak->score }}
                </div>
            </div>

            <br><br>
        @endforeach

    </div>

</div>
<a href="/yaks/newyak">Create a yak</a>
@endsection
