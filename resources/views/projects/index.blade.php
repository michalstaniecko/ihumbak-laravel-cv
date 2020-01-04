@extends('layouts.app')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row ">

        <div class="col-2">

            <div>
                <a href="/project/create" class="btn btn-sm btn-dark">Create Project</a>
            </div>
        </div>
        <div class="col-8">


            <ul class="list-unstyled">

                @forelse($projects as $project)


                    <li >
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">

                                <div class="pr-3">
                            <span
                                class="badge badge-primary {{ $project->commercial ? 'badge-primary' : 'badge-success' }}">{{ $project->commercial ? 'C'  : 'P' }}</span>
                                </div>
                                <div>

                                    <div>

                                        <strong>{{ $project->name }}</strong> - {{ $project->description }}
                                    </div>
                                    <div><small>{{ $project->tools }}</small></div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="/project/{{ $project->id }}/edit" class="btn btn-sm btn-outline-dark">Edit</a>
                                <form action="/project" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="projects[]" value="{{ $project->id }}" />
                                    <button type="submit" class="ml-2 btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>

                @empty

                    brak
                @endforelse
            </ul>


        </div>
    </div>
@endsection
