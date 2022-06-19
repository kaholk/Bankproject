@extends('base')

@section('content')
    <div class="container">
        <h2>Witaj {{$user->name}} {{$user->surname}}</h2>
        <br>
        <br>

        <div>
            <h3>Twoje konta</h3>
            @if($user->accounts()->get()->count() == 0)
                <div class="alert alert-primary" role="alert">
                    <h3>Wygląda na to że nie masz jeszcze zadnego konta bankowego, skontaktuj się z naszym działem i razem założymy nowe konto dla ciebie</h3>
                </div>
            @endif
            <div class="card-group">
                @foreach($user->accounts()->get() as $account)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$account->title}}</h4>
                            @if( $account->balance <0)
                                <p class="card-text text-danger" >Stan: {{$account->balance}} {{$account->currency}}</p>
                            @else
                                <p class="card-text text-success">Stan: {{$account->balance}} {{$account->currency}}</p>
                            @endif
                            <a href="/account_details/{{$account->id}}" class="btn btn-primary">Wyświetl szczegóły</a>
{{--                            <a href="{{url('/') }}" class="btn btn-primary">Wyświetl szczegóły</a>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br>
        <div>
            <h3>Historia tansakcji:</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr >
                    <th>Tytuł</th>
                    <th>Wartość</th>
                    <th>Data przelewu</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->transactions() as $transaction)
                    <tr>
                        <td>{{$transaction->title}}</td>
                        @if($transaction->sended == 1)
                            <td class="text-danger">{{$transaction->value}}</td>
                        @else
                            <td class="text-success">{{$transaction->value}}</td>
                        @endif
                        <td>{{$transaction->created_at}}{{$transaction->sended}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
