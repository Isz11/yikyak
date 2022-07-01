@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <div class="row"><h4>{{ $user->username }}</h4></div>
                        <div class="row">{{ $yakarma }} yakarma</div>
                    </div>
                </div>
                <div class="card-body">
                    Possible home community here. Ability to select it. <br>
                    Possible bio here. Ability to edit it. <br>
                </div> 
                @if(count($yaks))
                    <div class="card-body">
                        <h5>All of {{ $user->username }}'s yaks</h5>
                    </div>
                    @include('yaks.yak_format')
                @else
                    This user has no yaks
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
