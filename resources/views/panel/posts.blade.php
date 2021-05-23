@extends('layouts.panel')

@section('admin_panel')
    <table class="table table-user-information bg-light align-middle m-auto align-center">
        <tr class="border ">
            <td class="border text-center font-weight-bold p-1">ID</td>
            <td class="border text-center font-weight-bold p-1">Status</td>
            <td class="border text-center font-weight-bold p-1">Użytkownik</td>
            <td class="border text-center font-weight-bold p-1">Email</td>
            <td class="border text-center font-weight-bold p-1">Treść</td>
            <td class="border text-center font-weight-bold p-1">Data dodania</td>
            <td class="border text-center font-weight-bold p-1">Data modyfikacji</td>
            <td class="text-center font-weight-bold p-1" colspan="3">Zarządzaj postem</td>
            </tr>
        @foreach ($posts as $post)
            <tr class="border">
                <td class=" text-center align-middle">{{ $post->id}}</td>
                @if ($post->status == "published")
                    <td class="border text-success text-center text-uppercase justify-content-center align-middle">{{ $post->status }}</td>
                @else
                    <td class="border text-center text-info text-uppercase align-middle">{{ $post->status }}</td>
                @endif
                <td class="border text-center align-middle">{{ $post->user }}</td>
                <td class="border text-center align-middle">{{ $post->email }}</td>
                <td class="border text-center align-middle">{{ $post->comment }}</td>
                <td class="border text-center align-middle">{{ $post->created_at }}</td>
                <td class="border text-center align-middle">{{ $post->updated_at }}</td>
                <td class="text-center p-1 align-middle">
                @if ($post->status == 'published')
                <form action="/posty/cofnij_publikacje" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Cofnij">
                </form>
                @else
                    <form action="/posty/opublikuj" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Opublikuj">
                    </form>
                @endif
                </td>
                <td class="text-center p-1 align-middle">
                    <form action="/posty/edycja" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Edytuj">
                    </form>
                </td>
                <td class="text-center p-1 align-middle">
                    <form action="/posty/usun" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Usuń">
                    </form>
            </tr>
        @endforeach
    </table>
@endsection

@section('user_panel')
<table class="table table-user-information bg-light align-middle m-auto align-center">
    <tr class="border ">
        <td class="border text-center font-weight-bold p-1">ID</td>
        <td class="border text-center font-weight-bold p-1">Status</td>
        <td class="border text-center font-weight-bold p-1">Użytkownik</td>
        <td class="border text-center font-weight-bold p-1">Email</td>
        <td class="border text-center font-weight-bold p-1">Treść</td>
        <td class="border text-center font-weight-bold p-1">Data dodania</td>
        <td class="border text-center font-weight-bold p-1">Data modyfikacji</td>
        <td class="text-center font-weight-bold p-1" colspan="3">Zarządzaj postem</td>
        </tr>
    @foreach ($posts as $post)
        @if ($post->user == Auth::user()->name)
        <tr class="border">
            <td class=" text-center align-middle">{{ $post->id}}</td>
            @if ($post->status == "published")
                <td class="border text-success text-center text-uppercase justify-content-center align-middle">{{ $post->status }}</td>
            @else
                <td class="border text-center text-info text-uppercase align-middle">{{ $post->status }}</td>
            @endif
            <td class="border text-center align-middle">{{ $post->user }}</td>
            <td class="border text-center align-middle">{{ $post->email }}</td>
            <td class="border text-center align-middle">{{ $post->comment }}</td>
            <td class="border text-center align-middle">{{ $post->created_at }}</td>
            <td class="border text-center align-middle">{{ $post->updated_at }}</td>
            <td class="text-center p-1 align-middle">
                <form action="/posty/edycja" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Edytuj">
                </form>
            </td>
                <td class="text-center p-1 align-middle">
                    <form action="/posty/usun" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Usuń">
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
        
            
@endsection