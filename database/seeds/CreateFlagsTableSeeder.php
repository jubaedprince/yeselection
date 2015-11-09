<?php

use Illuminate\Database\Seeder;
use App\Flag;
class CreateFlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flag::create(['run_election'=>true]);
    }
}
