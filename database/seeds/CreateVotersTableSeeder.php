<?php

use Illuminate\Database\Seeder;
use App\Voter;

class CreateVotersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voters')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++){
            Voter::create(
                [   'first_name'        => $faker->firstName,
                    'middle_name'       => $faker->firstName,
                    'last_name'         => $faker->lastName,
                    'email'             => $faker->email,
                    'contact_number'    => $faker->phoneNumber,
                    'batch_number'      => rand(1,12)
                ]
            );
        }
    }
}
