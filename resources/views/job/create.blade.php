@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Edit Jobs
            <div>
                <form action="/job" method="post">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="name">Job Name</label>
                            <input class=" form-control form-control-sm @error('job.name')is-invalid @enderror" type="text" name="job[name]" id="name" value="{{ old('job.name') }}"/>
                            @error('job.name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="position">Position</label>
                            <input class=" form-control form-control-sm @error('job.position')is-invalid @enderror"
                                   type="text" name="job[position]" id="position" value="{{ old('job.position') }}"/>
                            @error('job.position')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="start_date">Start Date</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   data-date-format="yyyy-mm-dd"
                                   class=" form-control form-control-sm @error('job.start')is-invalid @enderror" type="text"
                                   name="job[start]" id="start" value="{{ old('job.start') }}"/>
                            @error('job.start')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="end_date">End Date</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   data-date-format="yyyy-mm-dd"
                                   class=" form-control form-control-sm @error('job.end')is-invalid @enderror" type="text"
                                   name="job[end]" id="end" value="{{ old('job.end') }}"/>
                            @error('job.end')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="projects">Projects</label>
                            <select multiple class=" custom-select custom-select-sm" name="project[ids][]" id="projects">
                                @forelse($projects as $key=>$project)
                                    <option {{ !empty(old('project.ids')) &&  in_array($project->id, old('project.ids')) ? 'selected' : '' }} value="{{ $project->id }}">
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
        </div>

    </div>
@endsection
