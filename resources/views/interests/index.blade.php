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
                <a href="/interest/create" class="btn btn-sm btn-dark">Create Interest</a>
            </div>
        </div>
        <div class="col-8">


            <ul class="list-unstyled">

                @forelse($interests as $interest)


                    <li>
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <p>

                                    {{ $interest->interest }}
                                </p>
                            </div>
                            <div class="d-flex">
                                <a href="/interest/{{ $interest->id }}/edit" class="btn btn-sm btn-outline-dark">Edit</a>
                                <form action="/interest/{{ $interest->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="interest[]" value="{{ $interest->id }}"/>
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
