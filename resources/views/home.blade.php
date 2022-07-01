@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <div class="row">Welcome {{ Auth::user()->username }}</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-outline-secondary btn-block" href="{{ route('yaks.index') }}">Yaks</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline-secondary btn-block" href="{{ route('profile.show',Auth::user()->username) }}">Your profile</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline-secondary btn-block" href="{{ route('communities.index') }}">Communities</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
