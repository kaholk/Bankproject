@extends('base')

@section('content')
    <div class="container">
        <h2>Witaj na stronie naszego banku</h2>
        <br>
        <br>
        <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/images/oprocentowanie.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/pozyczka.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/dziec.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br><br><br>
        <div>
            <h3>Sprawdź, co dla Ciebie przygotowaliśmy</h3>
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/images/konsolidacyjny.jpg') }}">
                    <div class="card-body">
                        <h4 class="card-title">Kredyt na konsolidacje</h4>
                        <p class="card-text">Zmień kilka rat w jedną RRSO 18 %</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/images/lokata5.jpg') }}">
                    <div class="card-body">
                        <h4 class="card-title">Lokata mobilna 5%</h4>
                        <p class="card-text">W skali roku na 4 miesiące</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/images/eco.jpg') }}">
                    <div class="card-body">
                        <h4 class="card-title">Eko kredyt gotówkowy</h4>
                        <p class="card-text">Zwrot prowizji i stałe oprocentowanie do 2 lat</p>
                    </div>
                </div>
            6</div>
        </div>
        <br>
        <br>
        <div>
            @if( session()->has('user') )
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Przejdz do konta</h4>
                        <p class="card-text">Nadal jesteś zalogowany, kliknij przycisk poniżej aby przejść do swojego
                            konta</p>
                        <a href="{{url('/dashboard') }}" class="btn btn-primary">Przejdz do konta</a>
                    </div>
                </div>
            @else
                <h3>Zaloguj się lub załóż konto</h3>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Zaloguj się</h4>
                            <p class="card-text">Masz już u nas konto ? Kliknij przycisk poniżej aby przejść do strony
                                logowania</p>
                            <a href="{{url('/login') }}" class="btn btn-primary">Zaloguj się</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Załóż konto</h4>
                            <p class="card-text">Nie masz jeszcze konta w naszym banku kliknij przycisk poniżej aby
                                założyć now konto w naszym bamku.</p>
                            <a href="{{url('/register') }}" class="btn btn-primary">Załóż konto</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
