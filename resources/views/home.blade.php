@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tablica statystyk') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <h5 class="text-center">{{ __('Liczba wszystkich postów: ') }}</h5>
                            <h3 class="text-center">{{ $count }}</h3>
                        </div>
                        <div class="col">
                            <h5 class="text-center">{{ __('Łączna liczba wyświetleń postów: ') }}</h5>
                            <h3 class="text-center">{{ $views }}</h3>
                        </div>
                        <div class="col">
                            <h5 class="text-center">{{ __('Najwyższa liczba wyświetleń: ') }}</h5>
                            <h3 class="text-center">{{ $max }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('comment')
<div class="container mt-5 mb-3">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <h1 class="bg-white p-2 rounded text-center text-uppercase">Dodaj post</h1>
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4 rounded-top">
                <div class="profile-image">
                    <img class="rounded-circle" src="{{ asset('images/avatar.png') }} " width="70">
                </div>
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h5 id="js-text-block" data-text=""></h5><span class="ml-2">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="d-flex flex-row align-items-center align-content-center post-title">
                        <span class="bdge mr-1" id="js-text-block-category" data-text="">Kategoria</span>
                    </div>
                </div>
            </div>

            <div class="coment-bottom bg-white p-2 px-4 rounded-bottom">
                <form action="/home" method="post">
                    @csrf
                    <input name="topic" type="text" class="form-control mr-3"  placeholder="Temat postu... (MAX 120 znaków)" id="js-text-value">
                    <!--Tu wstaw while lub foreach w przyszłości-->
                    <select name="category" class="form-control text-uppercase mt-3" id="js-text-value-category">
                        <option value="">Wybierz kategorię</option>
                        <option value="fotografia">Fotografia</option>
                        <option value="film">Film</option>
                        <option value="muzyka">Muzyka</option>
                        <option value="informatyka">Informatyka</option>
                    </select>
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <input name="user" type="hidden" value="{{ Auth::user()->name }}">
                        <input name="email" type="hidden" value="{{ Auth::user()->email }}">
                        <textarea name="content" type="text" class="form-control mr-3" placeholder="Dodaj wpis..."></textarea>
                        <input class="btn btn-primary hei" type="submit" value="Dodaj">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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




