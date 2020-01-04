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
                            <input class=" form-control form-control-sm @error('name')is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="position">Position</label>
                            <input class=" form-control form-control-sm @error('position')is-invalid @enderror"
                                   type="text" name="position" id="position" value="{{ old('position') }}"/>
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
                                   name="start" id="start" value="{{ old('start') }}"/>
                            @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="end_date">End Date</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   class=" form-control form-control-sm @error('end')is-invalid @enderror" type="text"
                                   name="end" id="end" value="{{ old('end') }}"/>
                            @error('end')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="projects">Projects</label>
                            <select multiple class=" custom-select custom-select-sm" name="projects[]" id="projects">
                                @forelse($projects as $key=>$project)
                                    <option {{ !empty(old('projects')) &&  in_array($project->id, old('projects')) ? 'selected' : '' }} value="{{ $project->id }}">
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
