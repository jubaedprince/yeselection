<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [   'name'      => 'Election Commissioner',
                'email'     => 'example@iearnbd.org',
                'password'  => Hash::make('password')
            ],

            [   'name'      => 'Wasi Mahmud Moni',
                'email'     => 'was_mahmud2000@gmail.com',
                'password'  => Hash::make('password')
            ],

            [   'name'      => 'Rajib Lochan Das',
                'email'     => 'dasrl@gmail.com',
                'password'  => Hash::make('password')
            ],

        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
