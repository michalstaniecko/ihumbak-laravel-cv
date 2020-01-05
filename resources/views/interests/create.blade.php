@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-8 pb-5">
            Create Interest
            <div>
                <form action="/interest" method="post">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label  for="interest">Interest</label>
                            <input class=" form-control form-control-sm @error('repo')is-invalid @enderror" type="text" name="interest" id="name" value="{{ old('interest') }}" />
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
