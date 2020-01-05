@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Edit Interest
            <div>
                <form action="/interest/{{ $interest->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="interest">Interest</label>
                            <input class=" form-control form-control-sm @error('interest')is-invalid @enderror" type="text" name="interest" id="name" value="{{ old('interest') ?? $interest->interest }}" />
                            @error('interest')
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
