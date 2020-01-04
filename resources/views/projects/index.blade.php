@extends('layouts.app')


@section('content')
    @include('profile.partials.experience', ['projects'=>$projects])
    <div class="row justify-content-center">
        <div class="col-8">


                <ul class="list-unstyled">

                    @forelse($projects as $project)
                    <li>
                        <div>

                            <strong>Agencja John Pitcher</strong> - od lutego 2017 roku
                        </div>
                        <div><small><strong>Stanowisko:</strong> Front-End Developer</small></div>
                        <ul class="">
                            <li>
                                <div>

                                    <strong>efl.pl</strong> - wdrożenie nowego designu (motywu WordPress) w oparciu o projekty PSD oraz rozwój serwisu.
                                </div>
                                <div><small>WordPress, SCSS, JavaScript, jQuery, HMTL, PHP, git, node.js, grunt</small></div>
                            </li>

                        </ul>
                    </li>
                    @empty

                        brak
                    @endforelse
                </ul>


        </div>
    </div>
@endsection
