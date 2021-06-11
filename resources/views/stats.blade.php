@extends('layouts.app')

@section('stats')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-uppercase" style="font-size: 24px">Statystyki kategorii {{ $category }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-center">Liczba wszystkich opublikowanych postów </h5>
                            <h5 class="text-center row">
                                <h3 class="text-center">{{ $count }}</h3>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Liczba wyświetleń postów</h5>
                            <h5 class="text-center row">
                                <h3 class="text-center">{{ $views }}</h3>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Liczba opublikowanych postów </h5>
                            <h5 class="text-center row">
                                <h3 class="text-center">{{ $published }}</h3>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Liczba nieopublikowanych postów </h5>
                            <h5 class="text-center row">
                                <h3 class="text-center">{{ $unpublished }}</h3>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection