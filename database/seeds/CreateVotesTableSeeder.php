<?php

use Illuminate\Database\Seeder;
use App\Vote;

class CreateVotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('votes')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        for ($i = 0; $i < 10000; $i++){
            Vote::create(['candidate_id' => rand(78,82)]);
        }

    }
}
