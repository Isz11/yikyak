@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
        <p>{{ session('mssg') }}</p>

        <h2>All the yaks</h2>

        @foreach($yaks as $yak)
            <div class="">
                <div class="">
                    {{ $yak->yak }}
                </div>
                <div class="">
                    User number: {{ $yak->user}} - Yak score: {{ $yak->score }} - Yak created at: {{ $yak->created_at }}
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
