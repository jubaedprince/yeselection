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
            [   'first_name'    => 'MD. ABDULLAH-AL-FARUQUE RATUL',
                'middle_name'   => '',
                'last_name'     => 'YES 07',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '1',
                'image_res'     =>  'abdullah.jpg',
            ],
            [   'first_name'    => 'GULSHAN JUBAED PRINCE',
                'middle_name'   => '',
                'last_name'     => 'YES 08',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '2',
                'image_res'     =>  'gulshan.jpg',
            ],
            [   'first_name'    => 'MOBASHIR MONIM',
                'middle_name'   => '',
                'last_name'     => 'YES 10',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '3',
                'image_res'     =>  'mobashir.jpg',
            ],
            [   'first_name'    => 'MARYAN KARMOKER',
                'middle_name'   => '',
                'last_name'     => 'YES 10',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '4',
                'image_res'     =>  'maryan.jpg',
            ],
            [   'first_name'    => 'TAHSEEN LUBABA',
                'middle_name'   => '',
                'last_name'     => 'YES 11',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '5',
                'image_res'     =>  'tahseen.jpg',
            ],
            [   'first_name'    => 'MAESHA ISLAM SHUDHA',
                'middle_name'   => '',
                'last_name'     => 'YES 11',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '6',
                'image_res'     =>  'maesha.jpg',
            ],
            [   'first_name'    => 'TASNEEM KIBRIA ORPA',
                'middle_name'   => '',
                'last_name'     => 'YES 11',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '7',
                'image_res'     =>  'tasneem.jpg',
            ],
            [   'first_name'    => 'RADEEYAH ZAMAN KHAN',
                'middle_name'   => '',
                'last_name'     => 'YES 11',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '8',
                'image_res'     =>  'raadeeyah.jpg',
            ],
            [   'first_name'    => 'SUMAIYA KHAN DISHA',
                'middle_name'   => '',
                'last_name'     => 'YES 12',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '9',
                'image_res'     =>  'sumaiya.jpg',
            ],
            [   'first_name'    => 'IFREET TAHEEA',
                'middle_name'   => '',
                'last_name'     => 'YES 12',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '10',
                'image_res'     =>  'ifreet.jpg',
            ]
        ];

        foreach ($candidates as $candidate){
            Candidate::create($candidate);
        }
    }
}
