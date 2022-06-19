@extends('base')

@section('content')
    <div class="container">
        <div>
            <h3>Szczegóły konta</h3>
            <p>{{$account->title}}</p>
            <p>{{$account->number}}</p>
        </div>
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
                @foreach($account->transactions() as $transaction)
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
