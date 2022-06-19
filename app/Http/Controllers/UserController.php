<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function register($step = 1){

        if ($step == 1)
            return view('register');
        else if($step == 2 && session()->has('regiserUser'))
            return view('register_confirm');
        else if($step == 3 && session()->has('regiserUser'))
            return view('register_finish');
        else
            return \redirect('/register');
    }

    public function  register_post($step, Request $request){
        if ($step == 1){
            $validated = $request->validateWithBag('registerError',[
                'name' => ['required', 'max:10'],
                'surname' => ['required', 'max:20'],
                'email' => ['required', 'max:50', 'email'],
                'password' => ['required', 'confirmed', 'min:8', 'max:50'],
                'address'=> ['required']
            ], [
                'name.required' => 'Imie jest wymagane',
                'name.max' => 'Imie nie more przekraczać 10 znaków',
                'surname.required' => 'Nazwisko jest wymagane',
                'surname.max' => 'Nazwisko nie more przekraczać 10 znaków',
                'email.required' => 'Email jest wymagany',
                'email.max' => 'Email jest za długi',
                'email.email' => 'Wprowadzono niepoprawny adres email',
                'password.required' => 'Hasło jest wymagane',
                'password.min' => 'Hasło musi mieć co najmniej 8 znaków',
                'password.max' => 'Hasło może zawierać maksymalnie 50 znaków',
                'password.confirmed' => 'Hasła nie są zgodne'
            ]);

            $validated['keyCode'] = Str::random(6);

            Mail::raw('Twój kod weryfikacyjny to: '.$validated["keyCode"], function ($message) use ($validated){
                $message->to($validated['email']);
                $message->from('projekt_twojbank@int.pl');
                $message->subject('Kod weryfikacyjny');
            });

            $request->session()->put(['regiserUser'=> $validated]);
            return \redirect('/register/2');
        }
        else if ($step == 2){
            $request->validateWithBag('registerCode',[
                'code'=> ['required',Rule::in(session()->get('regiserUser')['keyCode'])]
            ],[
                'code.required' => 'Kod weryfikacyjny jest wymagany',
                'code.in' => 'Kod weryfikacyjny jest niepoprawny'
            ]);
            $validated = session()->pull('regiserUser');

            $user = new User();
            $user->name = $validated['name'];
            $user->surname = $validated['surname'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->address = $validated['address'];
            $user->save();

            return \redirect('/register/3');
        }
        else
            return \redirect('/register');

    }

    public function login(){
        return view('login');
    }

    public function login_post(Request $request){
        $validated = $request->validateWithBag('loginError',[
            'email' => ['required', 'email'],
            'password' => 'required',
        ],[
            'email.required' => 'Email jest wymagany',
            'email.email' => 'Wprowadzono nieporawny email',
            'password.required' => 'Hasło jest wymagane'
        ]);


        $user = User::query()->where("email",'=',$request->get('email'))->first();
        if(!$user)
            return back()->withErrors(['loginFail'=>'Błedne hasło lub emial']);


        if(Hash::check($validated['password'], $user->password)){
            $request->session()->put(['user'=> $user]);
            return redirect('dashboard');
        }


        return back()->withErrors(['fail'=>'Błedne hasło lub emial']);


    }
    public function logout(Request $request){
        $request->session()->forget('user');
        return \redirect('login');
    }

    public function dashboard(){
        if(!session()->has('user'))
            return  \redirect('login');
        else{
            $credential = session()->get('user')->credential_level;
            if ($credential == 1)
                return view('admin_dashboard', ['user'=>session()->get('user')]);
            else
                return view('dashboard', ['user'=>session()->get('user')]);

        }
    }

    public function delete($user_id){
        if (session()->has('user') && session()->get('user')->credential_level == 1){
            $user = User::find($user_id);
            $user->delete();
        }
        return back();
    }

    public function edit($user_id){
        $user = User::find($user_id);
        return view('edit_user', ['edit_user'=>$user]);
    }
}
