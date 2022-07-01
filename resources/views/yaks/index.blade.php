@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="row justify-content-center">
            <h3 class="yak-title">All the yaks</h3>
        </div>
        <div class="row justify-content-center">
            <a href="{{ route('yaks.create') }}">Create a yak</a>
        </div>
    </div>
    @include('yaks.yak_format')
</div>

@endsection
