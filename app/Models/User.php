<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property string $password
 * @property string $email
 * @property string $surname
 * @property string $name
 * @property string $address
 * @property string $login
 */
class User extends Model
{
    public function accounts(){
        return $this->hasMany(Account::class);
    }

    public function  send_transactions(){
        return $this->hasManyThrough(Transaction::class, Account::class, 'id', 'from_account_number', 'id', 'number');
    }

    public function  received_transactions(){
        return $this->hasManyThrough(Transaction::class, Account::class, 'id', 'to_account_number', 'id', 'number');
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

}
