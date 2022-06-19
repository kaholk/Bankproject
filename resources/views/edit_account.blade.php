@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edycja konta bankowego</div>
                    <div class="card-body">
                        <form method="POST" action="/account_edit_post/{{$account->id}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="account_number" class="col-md-4 col-form-label text-md-end">Nr konta</label>

                                <div class="col-md-6">
                                    <input id="account_number" type="text" class="form-control @error('account_number','editError') is-invalid @enderror" name="account_number" value="{{$account->number}}">

                                    @error('account_number','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="account_title" class="col-md-4 col-form-label text-md-end">Nazwa</label>
                                <div class="col-md-6">
                                    <input id="account_title" type="text" class="form-control @error('account_title','editError') is-invalid @enderror" name="account_title" value="{{$account->title}}">
                                    @error('account_title','editError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="currency" class="col-md-4 col-form-label text-md-end">Waluta</label>
                                <div class="col-md-6">
                                    <input id="currency" type="text" class="form-control @error('currency','editError') is-invalid @enderror" name="currency" value="{{$account->currency}}">
                                    @error('currency','editError')
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

            </div>
        </div>
@endsection
