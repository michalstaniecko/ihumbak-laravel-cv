@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Create Project
            <div>
                <form action="/project" method="post">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="name">Project Name</label>
                            <input class=" form-control form-control-sm" type="text" name="name" id="name" value="" />
                        </div>
                        <div class="form-group col-6">
                            <label  for="description">Description</label>
                            <input class=" form-control form-control-sm @error('description')is-invalid @enderror" type="text" name="description" id="description" value="" />
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="tools">Tools</label>
                            <input class=" form-control form-control-sm" type="text" name="tools" id="tools" value="" />
                        </div>
                        <div class="form-group col-6">
                            <label  for="repo">Repo</label>
                            <input class=" form-control form-control-sm @error('repo')is-invalid @enderror" type="text" name="repo" id="repo" value="" />
                            @error('repo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
