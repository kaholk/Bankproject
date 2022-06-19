@extends('base')
<div class="container">

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Doddaj nowe konto bankowe</div>
                    <div class="card-body">
                        <form method="POST" action="/add_account_post/{{$userid}}">
                            @csrf


                            <div class="row mb-3">
                                <label for="account_number" class="col-md-4 col-form-label text-md-end">Numer konta</label>
                                <div class="col-md-6">
                                    <input id="account_number" type="text" class="form-control @error('account_number','accountError') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" autofocus>
                                    @error('account_number', 'accountError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="account_title" class="col-md-4 col-form-label text-md-end">Nazwa konta</label>
                                <div class="col-md-6">
                                    <input id="account_title" type="text" class="form-control @error('account_title','accountError') is-invalid @enderror" name="account_title" value="{{ old('account_title') }}">
                                    @error('account_title', 'accountError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="account_currency" class="col-md-4 col-form-label text-md-end">Waluta</label>
                                <div class="col-md-6">
                                    <input id="account_currency" type="text" class="form-control @error('account_currency','accountError') is-invalid @enderror" name="account_currency" value="{{ old('account_currency') }}">
                                    @error('account_currency', 'accountError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Dodaj nowe konto bankowe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
