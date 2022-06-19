<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function delete($account_id){
        if (session()->has('user') && session()->get('user')->credential_level == 1){
            $account = Account::find($account_id);
            $account->delete();
        }
        return back();
    }
}
