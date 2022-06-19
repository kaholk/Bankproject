@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rejestracja</div>
                    <div class="card-body">
                        <p>Na podany adres email został wysłany kod weryfikacyjny</p>
                        <form method="POST" action="/register_post/2">
                            @csrf

                            <div class="row mb-3">
                                <label for="code" class="col-md-4 col-form-label text-md-end">Kod weryfikacyjny</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control @error('code','registerCode') is-invalid @enderror" name="code" value="{{ old('code') }}" autofocus>
                                    @error('code', 'registerCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Zatwierdź</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
