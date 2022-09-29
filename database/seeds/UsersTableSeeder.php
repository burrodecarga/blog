<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'Edwin Henriquez',
            'email' => 'ed@gmail.com',
            'email_verified_at' => now(),
            'address'=>'Calle 181, casa 106-19, Valle Verde, Naguanagua',
            'phone'=>'021456788',
            'card_id'=>'4999400',
            'role'=>'admin',
            'password'=>bcrypt('123'), // password
            'remember_token' => Str::random(10),
            ]);

            $user=User::create([
                'name' => 'Doctor Dulitu',
                'email' => 'medico@gmail.com',
                'email_verified_at' => now(),
                'address'=>'Calle 181, casa 106-19, Valle Verde, Naguanagua',
                'phone'=>'021456788',
                'card_id'=>'4999400',
                'role'=>'medico',
                'password'=>bcrypt('123'), // password
                'remember_token' => Str::random(10),
                ]);

                $user=User::create([
                    'name' => 'Paciente Juan',
                    'email' => 'paciente@gmail.com',
                    'email_verified_at' => now(),
                    'address'=>'Calle 181, casa 106-19, Valle Verde, Naguanagua',
                    'phone'=>'021456788',
                    'card_id'=>'4999400',
                    'role'=>'paciente',
                    'password'=>bcrypt('123'), // password
                    'remember_token' => Str::random(10),
                    ]);

                    
        factory(App\User::class,80)->create();
    }
}
