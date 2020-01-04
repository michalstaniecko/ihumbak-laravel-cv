@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Edit Project
            <div>
                <form action="/project/{{ $project->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="name">Project Name</label>
                            <input class=" form-control form-control-sm" type="text" name="name" id="name" value="{{ $project->name }}" />
                        </div>
                        <div class="form-group col-6">
                            <label  for="description">Description</label>
                            <input class=" form-control form-control-sm @error('description')is-invalid @enderror" type="text" name="description" id="description" value="{{ $project->description }}" />
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="tools">Tools</label>
                            <input class=" form-control form-control-sm" type="text" name="tools" id="tools" value="{{$project->tools}}" />
                        </div>
                        <div class="form-group col-6">
                            <label  for="repo">Repo</label>
                            <input class=" form-control form-control-sm @error('repo')is-invalid @enderror" type="text" name="repo" id="repo" value="{{ $project->repo }}" />
                            @error('repo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="commercial">Commercial:</label>
                            <select class="custom-select custom-select-sm @error('repo')is-invalid @enderror" name="commercial" id="commercial">
                                <option {{ $project->commercial==0 ? 'selected' : '' }} value="0">Private</option>
                                <option {{ $project->commercial==1 ? 'selected' : '' }} value="1">Commercial</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
