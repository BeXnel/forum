@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Liczba wszystkich postów: ') }}
                    {{ $count }}
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
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="profile-image">
                    <img class="rounded-circle" src="{{ asset('images/avatar.png') }} " width="70">
                </div>
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h5>Temat posta</h5><span class="ml-2">(autor)</span>
                    </div>
                    <div class="d-flex flex-row align-items-center align-content-center post-title">
                        <span class="bdge mr-1">kategoria</span>
                        <span class="mr-2 dot"></span><span>6 hours ago</span>
                    </div>
                </div>
            </div>
            <div class="coment-bottom bg-white p-2 px-4">
                <form action="/home" method="post">
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <img class="img-fluid img-responsive rounded-circle mr-2" src="{{ asset('images/avatar.png') }}" width="38">
                        @csrf
                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="text" class="form-control mr-3" name="comment" placeholder="Dodaj komentarz...">
                        <input class="btn btn-primary" type="submit" value="Skomentuj">
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

@section('temp')
    @foreach ($posts as $post)
        @if ($post->status == "published")
        <div class="commented-section mt-2 bg-light p-2 rounded">
            <div class="d-flex flex-row align-items-center commented-user">
                <h5 class="mr-2">{{ $post->user }}</h5>
                <span class="dot mb-1"></span>
                <span class="mb-1 ml-2">{{ $post->created_at }}</span>
            </div>
            <div class="comment-text-sm">
                <span>{{ $post->comment }}</span>
            </div>
            <div class="reply-section">
            </div>
        </div>
        @endif    
    @endforeach
@endsection

@section('commentery')
<div class="container mt-3 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <div class="coment-bottom p-2 px-4 mt-0">
                @yield('temp')
            </div>
        </div>
    </div>
</div>
@endsection


