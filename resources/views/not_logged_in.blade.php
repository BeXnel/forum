@extends('layouts.app')
@section('not_logged_in')
    <h1 class="text-light text-center">
        <a class="nav-link text-light" href="{{ route('login') }}">Zaloguj się aby zobaczyć stronę</a>
    </h1>
@endsection

@section('error')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection