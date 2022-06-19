@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dane użytkownika</div>
                    <div class="card-body">
                        <form method="POST" action="/edit_user_post/{{$edit_user->id}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Imie</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name','editError') is-invalid @enderror" name="name" value="{{ $edit_user->name }}">

                                    @error('name','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Nazwisko</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname','editError') is-invalid @enderror" name="surname" value="{{ $edit_user->surname }}">
                                    @error('surname','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email','editError') is-invalid @enderror"
                                           name="email" value="{{ $edit_user->email }}">
                                    @error('email','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Adres</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('address','editError') is-invalid @enderror"
                                           name="address" value="{{ $edit_user->address }}">
                                    @error('address','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="credential_level" class="col-md-4 col-form-label text-md-end">Poziom
                                    uprawnień</label>
                                <div class="col-md-6">
                                    <input id="credential_level" type="text"
                                           class="form-control @error('credential_level','editError') is-invalid @enderror"
                                           name="credential_level" value="{{ $edit_user->credential_level }}">
                                    @error('credential_level','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zapisz zmiany
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Konta użytkownika</div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                            <tr >
                                <th>Numer konta</th>
                                <th>Tytuł</th>
                                <th>Waluta</th>
                                <th>Saldo</th>
                                <th>Edytuj</th>
                                <th>Usuń</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($edit_user->accounts as $account)
                                <tr>
                                    <td>{{$account->number}}</td>
                                    <td>{{$account->title}}</td>
                                    <td>{{$account->currency}}</td>
                                    <td>{{$account->balance}}</td>
                                    <td><a href="/account_edit/{{$account->id}}">Edytuj</a></td>
                                    <td><a href="/account_delete/{{$account->id}}">Usuń</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
