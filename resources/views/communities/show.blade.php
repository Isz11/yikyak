@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <h2>{{ $community->name }}</h2>
                        Recent yaks from {{ $community->name }}
                    </div>
                    <div>
                        Will sort this out later on... or will I
                    </div>
                </div>
                <a href="/communities">Back to all communities</a>
            </div>  
        </div>
    </div>
</div>
@endsection
