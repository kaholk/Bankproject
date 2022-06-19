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

    public function edit($account_id){
        $account = Account::find($account_id);

        return view('edit_account',['account'=>$account]);
    }

    public function edit_post($account_id, Request $request){
        $validated = $request->validateWithBag('editError',[
            'account_number' => ['required'],
            'account_title' => ['required'],
            'currency' => ['required'],
        ]);

        $account = Account::find($account_id);
        $account->number = $validated['account_number'];
        $account->title = $validated['account_title'];
        $account->currency = $validated['currency'];
        $account->save();

        $user_id = $account->user->id;
        return redirect('/user_edit/'.$user_id);
    }
}
