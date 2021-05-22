@extends('layouts.panel')

@section('panel')

    <table class="border border-dark bg-light align-center container mt-5 rounded">
        <tr class="border border-dark">
            <td class="border border-dark text-center font-weight-bold">ID</td>
            <td class="border border-dark text-center font-weight-bold">Status</td>
            <td class="border border-dark text-center font-weight-bold">Użytkownik</td>
            <td class="border border-dark text-center font-weight-bold">Email</td>
            <td class="border border-dark text-center font-weight-bold">Treść</td>
            <td class="border border-dark text-center font-weight-bold">Data dodania</td>
            <td class="border border-dark text-center font-weight-bold">Data modyfikacji</td>
            <td class="text-center font-weight-bold" colspan="3">Zarządzaj postem</td>
            </tr>
        @foreach ($posts as $post)
            <tr class="border border-dark">
                <td class="border border-dark text-center">{{ $post->id}}</td>
                <td class="border border-dark text-center">{{ $post->status }}</td>
                <td class="border border-dark text-center">{{ $post->user }}</td>
                <td class="border border-dark text-center">{{ $post->email }}</td>
                <td class="border border-dark text-center">{{ $post->comment }}</td>
                <td class="border border-dark text-center">{{ $post->created_at }}</td>
                <td class="border border-dark text-center">{{ $post->updated_at }}</td>
                <td class=" text-center">
                @if ($post->status == 'published')
                <form action="/posty/cofnij_publikacje" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="submit" class="btn btn-secondary" value="Cofnij">
                </form>
                @else
                    <form action="/posty/opublikuj" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary" value="Opublikuj">
                    </form>
                @endif
                </td>
                <td class=" text-center">
                    <form action="/posty/edycja" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary" value="Edytuj">
                    </form>
                </td>
                <td class=" text-center">
                    <form action="/posty/usun" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-secondary" value="Usuń">
                    </form>
            </tr>
        @endforeach
    </table>
@endsection