<?php

use Illuminate\Database\Seeder;
use App\Candidate;

class CreateCandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidates')->delete();

        $candidates = [
            [   'first_name'    => 'Gulshan',
                'middle_name'   => '',
                'last_name'     => 'Prince',
                'email'         =>  'jubaedprince@hotmail.com',
                'candidate_id'  =>  '123',
            ],
            [   'first_name'    => 'Sakib',
                'middle_name'   => '',
                'last_name'     => 'Hasan',
                'email'         =>  'sakibhasan@gmail.com',
                'candidate_id'  =>  '124',
            ],
            [   'first_name'    => 'Shehabul',
                'middle_name'   => 'Hossain',
                'last_name'     => 'SunNy',
                'email'         =>  'rudrozzal@gmail.com',
                'candidate_id'  =>  '',
            ],
            [   'first_name'    => 'Tahsin',
                'middle_name'   => '',
                'last_name'     => 'Tamim',
                'email'         =>  'tamim@gmail.com',
                'candidate_id'  =>  '',
            ],
            [   'first_name'    => 'Meshkat',
                'middle_name'   => 'Mahfuz',
                'last_name'     => 'Siam',
                'email'         =>  'meshu@gmail.com',
                'candidate_id'  =>  '125',
            ]
        ];

        foreach ($candidates as $candidate){
            Candidate::create($candidate);
        }
    }
}
