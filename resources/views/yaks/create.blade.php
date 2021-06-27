@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

        <h4>Share your thoughts with the world, anonymously.</h4>
        <form class="" action="/yaks" method="post">
            @csrf
            <textarea name="yak" id="yak" rows="8" cols="80" placeholder="Enter your yak here..."></textarea><br>
            <input type="submit" name="submit" value="Submit yak">
        </form>

    </div>
</div>
@endsection
