@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nowy przelew</div>
                    <div class="card-body">
                        <h4 class="card-title">Gratulacje</h4>
                        <p class="card-text">Twój przelew został wysłany</p>
                        <a href="{{url('/dashboard') }}" class="btn btn-primary">Powrót do konta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
