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
                            <label for="name">Name</label>
                            <input class=" form-control form-control-sm @error('profile.name')is-invalid @enderror"
                                   type="text" name="profile[name]" id="name"
                                   value="{{ old('profile.name') ?? $profile->name }}"/>
                            @error('profile.name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="lastname">Last Name</label>
                            <input class=" form-control form-control-sm @error('profile.lastname')is-invalid @enderror"
                                   type="text" name="profile[lastname]" id="lastname"
                                   value="{{ old('profile.lastname') ?? $profile->lastname }}"/>
                            @error('profile.lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="date_of_birth">Date Of Birth</label>
                            <input data-provide="datepicker" autocomplete="off"
                                   class=" form-control form-control-sm @error('profile.date_of_birth')is-invalid @enderror"
                                   type="text" name="proile[date_of_birth]" id="date_of_birth"
                                   value="{{ old('profile.date_of_birth') ?? $profile->date_of_birth }}"/>
                            @error('profile.date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="url">WWW</label>
                            <input class=" form-control form-control-sm  @error('profile.url')is-invalid @enderror"
                                   type="text"
                                   name="profile[url]" id="url" value="{{ old('profile.url') ?? $profile->url }}"/>
                            @error('profile.url')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <textarea class="form-control form-control-sm" name="profile[description]"
                                      id="description">{{ old('profile.description') ?? $profile->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="language">Languages</label>
                            <select name="language[id]" class="custom-select-sm custom-select">
                                @forelse($availableLanguages as $language)

                                    <option value="{{ $language->id }}">{{ $language->name }}</option>

                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="level">Level</label>
                            <input type="text" name="language[level]" class="form-control-sm form-control"/>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="list-unstyled">
                @forelse($profile->languages as $language)
                    <li>
                        {{ $language->name }}
                        <form action="/language/{{ $language->id }}/unassign" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
@endsection
