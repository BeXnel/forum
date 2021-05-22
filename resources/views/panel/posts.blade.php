@extends('layouts.panel')

@section('admin_panel')
    <table class="border border-dark bg-light align-center container mt-5 rounded">
        <tr class="border border-dark">
            <td class="border border-dark text-center font-weight-bold p-1">ID</td>
            <td class="border border-dark text-center font-weight-bold p-1">Status</td>
            <td class="border border-dark text-center font-weight-bold p-1">Użytkownik</td>
            <td class="border border-dark text-center font-weight-bold p-1">Email</td>
            <td class="border border-dark text-center font-weight-bold p-1">Treść</td>
            <td class="border border-dark text-center font-weight-bold p-1">Data dodania</td>
            <td class="border border-dark text-center font-weight-bold p-1">Data modyfikacji</td>
            <td class="text-center font-weight-bold p-1" colspan="3">Zarządzaj postem</td>
            </tr>
        @foreach ($posts as $post)
            <tr class="border border-dark">
                <td class="border border-dark text-center">{{ $post->id}}</td>
                <td class="border border-dark text-center">{{ $post->status }}</td>
                <td class="border border-dark text-center">{{ $post->user }}</td>
                <td class="border border-dark text-center">{{ $post->email }}</td>
                <td class="border border-dark text-center">
                    {{ $post->comment }}
                </td>
                <td class="border border-dark text-center">{{ $post->created_at }}</td>
                <td class="border border-dark text-center">{{ $post->updated_at }}</td>
                <td class="text-center p-1">
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
                <td class="text-center p-1">
                    <form action="/posty/edycja" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Edytuj">
                    </form>
                </td>
                <td class="text-center p-1">
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
    <table class="border border-dark bg-light align-center container mt-5 rounded">
        <tr class="border border-dark">
            <td class="border border-dark text-center font-weight-bold p-1">ID</td>
            <td class="border border-dark text-center font-weight-bold p-1">Status</td>
            <td class="border border-dark text-center font-weight-bold p-1">Użytkownik</td>
            <td class="border border-dark text-center font-weight-bold p-1">Email</td>
            <td class="border border-dark text-center font-weight-bold p-1">Treść</td>
            <td class="border border-dark text-center font-weight-bold p-1">Data dodania</td>
            <td class="border border-dark text-center font-weight-bold p-1">Data modyfikacji</td>
            <td class="text-center font-weight-bold p-1" colspan="3">Zarządzaj postem</td>
            </tr>
        @foreach ($posts as $post)
        @if ($post->user == Auth::user()->name)
            <tr class="border border-dark">
                <td class="border border-dark text-center">{{ $post->id}}</td>
                <td class="border border-dark text-center">{{ $post->status }}</td>
                <td class="border border-dark text-center">{{ $post->user }}</td>
                <td class="border border-dark text-center">{{ $post->email }}</td>
                <td class="border border-dark text-center">
                    {{ $post->comment }}
                </td>
                <td class="border border-dark text-center">{{ $post->created_at }}</td>
                <td class="border border-dark text-center">{{ $post->updated_at }}</td>
                <td class="text-center p-1">
                </td>
                <td class="text-center p-1">
                    <form action="/posty/edycja" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Edytuj">
                    </form>
                </td>
                <td class="text-center p-1">
                    <form action="/posty/usun" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary form-control bg-secondary" value="Usuń">
                    </form>
            </tr>
            @endif
        @endforeach
    </table>
        
            
@endsection