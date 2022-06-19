<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        $user = new User();
//        $user->name =  'Seweryn';
//        $user->surname = 'Kwiatkowski';
//        $user->email = 'u1@gmail.com';
//        $user->password = Hash::make('qaz123QAZ!@#');
//        $user->address = "ul. Grafitowa 5 35-322 Rzeszów";
//        $user->credential_level = 0;
//        $user->save();
        $user = User::create([
            'name' => 'Seweryn',
            'surname' => 'Kwiatkowski',
            'email' => 'u1@gmail.com',
            'password' => Hash::make('qaz123QAZ!@#'),
            'address' => 'ul. Grafitowa 5 35-322 Rzeszów',
            'credential_level' => 0
        ]);

        $accounts = $user->accounts()->createMany([
            [
                'number' => '11122233311122232300000002',
                'title' => 'Konto jakie chce',
                'currency'=> 'PLN',
            ],
            [
                'number' => '368426584',
                'title' => 'konto oszczędnościowe',
                'currency'=> 'PLN',
            ]
        ]);

        $accounts[0]->send_transactions()->create([
            'title' => 'Przelew 1',
            'value' => 25,
            'to_account_number' => '11122233311122232300000003'
        ]);

        $accounts[0]->received_transactions()->create([
            'title' => 'Przelew 123456',
            'value' => 130,
            'from_account_number' => '6498641856519'
        ]);

        User::create([
            'name' => 'Bożena ',
            'surname' => 'Wojciechowska',
            'email' => 'u2@gmail.com',
            'password' => Hash::make('qaz123QAZ!@#'),
            'address' => 'ul. Rymarska 7 43-190 Mikołów',
            'credential_level' => 1
        ]);

    }
}
