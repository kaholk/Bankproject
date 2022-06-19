@extends('base')

@section('content')
    <div class="container">
        <h2>Witaj {{$user->name}} {{$user->surname}} jestes zalogowany jako administrator</h2>
        <br>
        <br>
        <div>
            <h3>Zarządzaj użytkownikami</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr >
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Poziom uprawnień</th>
                    <th>Edytuj</th>
                    <th>Usuń</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\User::all() as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->credential_level}}</td>
                        <td><a href="/user_edit/{{$user->id}}">Edytuj</a></td>
                        <td><a href="/user_delete/{{$user->id}}">Usuń</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
