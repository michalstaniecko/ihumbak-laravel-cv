@extends('layouts.app')

@section('content')
    <div class="container">
        @include('profile.partials.basic')
        @include('profile.partials.experience')
        @include('profile.partials.languages')
        @include('profile.partials.additional')
    </div>
@endsection
