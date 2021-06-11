@extends('layouts.app')

@section('user_panel')
    @foreach ($data as $item)
    @if ($item->name == Auth::user()->name)
    <div class="container col-4 bg-light mt-4 rounded p-4">
          <div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Konto</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                    <table class="table table-user-information">
                      <tbody>
                          <tr>
                          <td>Nazwa użytkownika</td>
                          <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>{{ $item->email }}</td>
                        </tr>
                          <td>Zarejestrowany od</td>
                          <td>{{ \Illuminate\Support\Str::limit($item->created_at, 10, '') }}</td> 
                        <tr>
                          <td>Liczba dodanych postów</td>
                          <td>{{ $posts }}</td>
                        </tr>
                        <tr>
                          <td>Liczba opublikowanych postów</td>
                          <td>(Tu wstaw liczbe postów)</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col text-center">
                <div class="row align-center">
                  <form action="/konto/edycja" method="post" class="col">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="submit" class="btn btn-primary center" value="Edytuj dane">
                  </form>
                  <form action="/konto/zmien_haslo" method="post" class="col">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="submit" class="btn btn-primary center " value="Zresetuj hasło">
                  </form>
                </div>
          </div>
          
        </div>
        </div>
      </div>
    @endif
    @endforeach
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