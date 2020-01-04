@extends('layouts.app')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Edit Jobs
            <div>
                <form action="/job/{{ $job->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="name">Job Name</label>
                            <input class=" form-control form-control-sm" type="text" name="name" id="name"
                                   value="{{ $job->name }}"/>
                        </div>
                        <div class="form-group col-6">
                            <label for="position">Position</label>
                            <input class=" form-control form-control-sm @error('position')is-invalid @enderror"
                                   type="text" name="position" id="position" value="{{ $job->position }}"/>
                            @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="start_date">Start Date</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   class=" form-control form-control-sm @error('start')is-invalid @enderror" type="text"
                                   name="start" id="start" value="{{ $job->start }}"/>
                            @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="end_date">End Date</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   class=" form-control form-control-sm @error('end')is-invalid @enderror" type="text"
                                   name="end" id="end" value="{{ $job->end }}"/>
                            @error('end')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="projects">Projects</label>
                            <select multiple class=" custom-select custom-select-sm" name="projects[]" id="projects">
                                @forelse($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>
                                @empty

                                    <option value="0">
                                        No available projects
                                    </option>

                                @endforelse
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>

            <div>
                <ul>
                    @forelse($job->projects as $project)
                        <li>
                            {{ $project->name }}
                            <form method="post" action="/project/{{ $project->id }}/disconnect">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="job_id" value="" />
                                <button type="submit" class="btn btn-sm btn-danger">Disconnect</button>
                            </form>
                        </li>

                    @empty
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
@endsection
