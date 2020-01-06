@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('profile.partials.basic')
        </div>
        <div class="col-md-8">
            @include('profile.partials.about')
            @include('profile.partials.experience')
            @include('profile.partials.languages')
            @include('profile.partials.additional')
        </div>
    </div>
@endsection
