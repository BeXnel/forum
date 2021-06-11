@extends('layouts.app')

@section('show-category')

<div class="container w-75">
    @if ($posts_count == 0)
        <h1 class="text-center text-light">Brak postów w danej kategorii</h1>
    @else
    @foreach ($posts as $post)
        <div class="container mt-1 mb-2">
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
                                <span class="bdge mr-1" data-text="">{{ $post->category }}</span>
                                <span class="mr-2 dot"></span><span>{{ \Illuminate\Support\Str::limit($post->created_at, 16, '') }}</span>
                            </div>
                        </div>
                    </div>
        
                    <div class="coment-bottom bg-light p-2 px-4 rounded-bottom">
                        <h5>{{$post->content}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-1 mb-2">
            <div class="d-flex justify-content-center row">
                <div class="d-flex flex-column col-md-8">
                    <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-light border-bottom px-4 rounded-top">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row post-title mt-2">
                                <h2>Dodaj komentarz</h5>
                            </div>
                        </div>
                    </div>

                    <form action="/posty/kategoria/{{ $post->category }}/" method="post" id="comment">
                        @csrf
                    <div class="bg-light p-2 px-4 rounded-bottom">
                        <div class="input-group p-1">
                                <input type="text">
                                <input type="text" class="form-control" placeholder="Dodaj komentarz..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary btn-dark text-light" type="submit" form="comment">Skomentuj</button>
                            </div>
                          </div>
                    </div>
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