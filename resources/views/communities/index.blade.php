@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Find and visit a University community</div>

                <div class="card-body">
                @foreach($communities as $community)
                    <a href="{{ route('communities.show', $community) }}">{{ $community->name }}</a><br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
