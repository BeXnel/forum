@extends('layouts.app')

@section('show-category')

<div class="container w-75">
    @if ($posts_count == 0)
        <h1 class="text-center text-light">Brak postów w danej kategorii</h1>
    @else
    @foreach ($posts as $post)
        <div class="container mt-1 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="d-flex flex-column col-md-8">
                    <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-light border-bottom px-4 rounded-top">
                        <div class="profile-image">
                            <img class="rounded-circle" src="{{ asset('images/avatar.png') }} " width="70">
                        </div>
                        <div class="d-flex flex-column ml-3">
                            <div class="d-flex flex-row post-title">
                                <h2>{{ $post->topic }}</h2><h5 class="ml-2 text-secondary mt-2">{{ $post->user }}</h5>
                            </div>
                            <div class="d-flex flex-row align-items-center align-content-center post-title">
                                <span class="mr-1 text-uppercase text-primary" data-text="">{{ $post->category }}</span>
                                <span class="mr-2 dot"></span><span>{{ \Illuminate\Support\Str::limit($post->created_at, 16, '') }}</span>
                            </div>
                        </div>
                    </div>
        
                    <div class="coment-bottom bg-light p-2 px-4 rounded-bottom">
                        <h5>{{ \Illuminate\Support\Str::limit($post->content, 40, '') }}...</h5>
                        <form action="{{ $post->category }}/{{ $post->id }}" method="post">
                            @csrf
                            <input class="btn text-info float-right" type="submit" value="Zobacz więcej">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
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