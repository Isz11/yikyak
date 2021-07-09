@extends('layouts.app')

@section('content')



<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
        <p>{{ session('mssg') }}</p>

        <h4>All the yaks</h4><br>

        @foreach($yaks as $yak)
            <div class="">
                <div class="">
                    <p>Posted by
                    @foreach ($users as $user)
                        @if ($user->id == $yak->user)
                            {{ $user->name }}
                            @break
                        @endif
                    @endforeach
                    </p>

                    <h3><a href="/yaks/{{ $yak->id }}">{{ $yak->yak }}</a></h3>
                </div>
                <div class="">
                    {{ get_time_ago($yak->created_at) }} ---

                    @php $count = 0 @endphp
                    @foreach($replies as $reply)
                        @if ($reply->yak == $yak->id)
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
