@extends('layouts.account')

@section('user_panel')
@foreach ($data as $item)
@if ($item->name == Auth::user()->name)
<div class="container bg-light w-50 mt-4 rounded p-4">
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
                      <td><a href="mailto:info@support.com">{{ $item->email }}</a></td>
                    </tr>
                      <td>Phone Number</td>
                      <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)</td> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="container row m-auto">
            <div class="col">
                <a href="{{ url('konto/edytuj') }}" class="btn btn-primary center">Edytuj dane</a>
                <a href="{{ url('konto/zmien_haslo') }}" class="btn btn-primary center">Zmień hasło</a>
            </div>
      </div>
      
    </div>
    </div>
  </div>
@endif
@endforeach
@endsection