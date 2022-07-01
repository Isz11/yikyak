@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4 class="yak-title">All the yaks</h4><br>
    </div>
    @include('yaks.yak_format')
    <div class="row justify-content-center">
        <a href="/yaks/newyak">Create a yak</a>
    </div>
</div>

@endsection
