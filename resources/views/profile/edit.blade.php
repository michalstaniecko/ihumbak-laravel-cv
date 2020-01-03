@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Edit profile
            <div>
                <form action="/profile/edit" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="name">Name</label>
                            <input class=" form-control form-control-sm" type="text" name="name" id="name" value="{{ $profile->name }}" />
                        </div>
                        <div class="form-group col-6">
                            <label  for="lastname">Last Name</label>
                            <input class=" form-control form-control-sm @error('lastname')is-invalid @enderror" type="text" name="lastname" id="lastname" value="{{ $profile->lastname }}" />
                            @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="date_of_birth">Date Of Birth</label>
                            <input data-provide="datepicker" autocomplete="off"  class=" form-control form-control-sm @error('date_of_birth')is-invalid @enderror" type="text" name="date_of_birth" id="date_of_birth" value="{{ $profile->date_of_birth }}" />
                            @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label  for="url">WWW</label>
                            <input class=" form-control form-control-sm  @error('url')is-invalid @enderror" type="text" name="url" id="url" value="{{ $profile->url }}" />
                            @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <textarea class="form-control form-control-sm" name="description" id="description"  >{{ $profile->description }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
