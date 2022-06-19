@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nowy przelew</div>
                    <div class="card-body">
                        <form method="POST" action="/new_transaction_post">
                            @csrf


                            <div class="row mb-3">
                                <label for="from_account" class="col-md-4 col-form-label text-md-end">Z konta</label>

                                <div class="col-md-6">

                                    <select id="from_account" name="from_account" class="form-select @error('from_account','transactionError') is-invalid @enderror">
                                        @foreach(session()->get('user')->accounts()->select('number')->get() as $number)
                                            <option value="{{$number->number}}">{{$number->number}}</option>
                                        @endforeach
                                    </select>

                                    @error('from_account','transactionError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="to_account" class="col-md-4 col-form-label text-md-end">Nr konta</label>

                                <div class="col-md-6">
                                    <input id="to_account" type="text" class="form-control @error('to_account','transactionError') is-invalid @enderror" name="to_account" value="{{ old('to_account') }}"  autofocus>

                                    @error('to_account','transactionError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="transaction_value" class="col-md-4 col-form-label text-md-end">Kwota</label>
                                <div class="col-md-6">
                                    <input id="transaction_value" type="text" class="form-control @error('transaction_value','transactionError') is-invalid @enderror" name="transaction_value" value="{{ old('transaction_value') }}">

                                    @error('transaction_value','transactionError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Tytuł przelewu</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title','transactionError') is-invalid @enderror" name="title" value="{{ old('title') }}">

                                    @error('title','transactionError')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Wykonaj przelew
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
