@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rejestracja</div>
                    <div class="card-body">
                        <h4 class="card-title">Gratulacje</h4>
                        <p class="card-text">Twoje konto zostało utworzone.</p>
                        <a href="{{url('/login') }}" class="btn btn-primary">Zaloguj się</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
