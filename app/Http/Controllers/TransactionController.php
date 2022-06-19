<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function new_transaction(){
        if(!session()->has('user'))
            return  \redirect('login');
        return view('new_transaction');
    }

    public  function transaction_finish(){
//        if(!session()->has('user'))
            return  view('transaction_finish');
//        return view('new_transaction');
    }

    public  function  new_transaction_post(Request $request){
        $validated = $request->validateWithBag('transactionError',[
            'transaction_value' => ['required'],
            'from_account' => ['required'],
            'to_account' => ['required','digits:26'],
            'title' => ['required']
        ],[
            'transaction_value.required' => 'Kwota przelewu jest wymagana',
            'title.required' => 'Tytuł przelewu jest wymagany',
            'to_account.required' => 'Nr konta jest wymagany',
            'to_account.digits' => 'Nr konta powinien zawierać 26 cyfr'
        ]);

        Transaction::create([
            'title' => $validated['title'],
            'to_account_number' => $validated['to_account'],
            'from_account_number' => $validated['from_account'],
            'value' => $validated['transaction_value'],
        ]);

        return redirect('/transaction_finish');
    }
}
