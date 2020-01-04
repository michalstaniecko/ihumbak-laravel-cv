@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-2">

            <div>
                <a href="/job/create" class="btn btn-sm btn-dark">Create Job</a>
            </div>
        </div>
        <div class="col-8">

            <ul class="list-unstyled">

                @forelse($jobs as $job)
                    <li>
                        <div class="d-flex justify-content-between align-items-start">
                            <div>

                                <div>

                                    <strong>{{ $job->name }}</strong> -
                                    od {{ date('F d, Y', strtotime($job->start)) }}
                                    @if($job->end)
                                        do {{  date('F d, Y', strtotime($job->end))  }}
                                    @endif
                                </div>
                                <div><small><strong>Stanowisko:</strong> Front-End Developer</small></div>
                            </div>
                            <div class="d-flex">
                                <a href="/job/{{ $job->id }}/edit" class="btn btn-sm btn-outline-dark">Edit Job</a>
                                <form action="/job" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="jobs[]" value="{{ $job->id }}"/>
                                    <button type="submit" class="btn btn-sm btn-danger ml-2">Delete</button>
                                </form>
                            </div>
                        </div>
                        <ul class="">
                            @forelse($job->projects as $project)
                                <li>
                                    <div>

                                        <strong>{{ $project->name }}</strong> - {{ $project->description }}
                                    </div>
                                    <div><small>{{ $project->tools }}</small></div>

                                </li>
                            @empty
                                Brak projektów
                            @endforelse

                        </ul>
                    </li>
                @empty

                    brak
                @endforelse
            </ul>


        </div>
    </div>
@endsection
