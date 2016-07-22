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
                'email'     => 'ec@yesalumnibd.org',
                'password'  => Hash::make('p@ssword')
            ],

            [   'name'      => 'Shehabul Hossain',
                'email'     => 'hello@sunny.im',
                'password'  => Hash::make('p@ssword')
            ],

        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
