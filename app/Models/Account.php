<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function send_transactions(){
        return $this->hasMany(Transaction::class, 'from_account_number', 'number');
    }

    public function received_transactions(){
        return $this->hasMany(Transaction::class, 'to_account_number', 'number');
    }

    public function transactions()
    {
        $sended_transactions = $this->send_transactions()->get();
        foreach ($sended_transactions as &$transaction){
            $transaction->value *= -1;
            $transaction->sended = 1;
        }

        $received_transactions =  $this->received_transactions()->get();
        foreach ($received_transactions as &$transaction)
            $transaction->sended = 0;


        return $sended_transactions->merge($received_transactions)->sortByDesc('created_at');
    }

    public  function getBalanceAttribute(){
        $balance = 0;
        $sended_transactions = $this->send_transactions()->get();
        foreach ($sended_transactions as $transaction){
            $balance -= $transaction->value;
        }

        $received_transactions =  $this->received_transactions()->get();
        foreach ($received_transactions as &$transaction){
            $balance += $transaction->value;
        }

        return $balance;
    }
}
