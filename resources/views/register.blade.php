@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rejestracja</div>
                    <div class="card-body">
                        <form method="POST" action="/register_post/1">
                            @csrf


                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Imie</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name','registerError') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                                    @error('name', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Nazwisko</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('name','registerError') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autofocus>
                                    @error('surname', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email','registerError') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Has??o</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password','registerError') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                    @error('password', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Powt??rz has??o</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation','registerError') is-invalid @enderror" name="password_confirmation">
                                    @error('password_confirmation', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Adres</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address','registerError') is-invalid @enderror" name="address" value="{{ old('address') }}">
                                    @error('address', 'registerError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>







                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Zarejestruj si??</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
