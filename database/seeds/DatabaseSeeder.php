<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(CreateFlagsTableSeeder::class);
        $this->call(CreateUsersTableSeeder::class);
        //$this->call(CreateCandidatesTableSeeder::class);
        //$this->call(CreateVotersTableSeeder::class);
        //$this->call(CreateVotesTableSeeder::class);
        Model::reguard();
    }
}
