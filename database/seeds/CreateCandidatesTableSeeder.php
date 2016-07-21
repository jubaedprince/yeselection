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
                'last_name'     => '[YES 07 – (2009-2010)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '1',
            ],
            [   'first_name'    => 'GULSHAN JUBAED PRINCE',
                'middle_name'   => '',
                'last_name'     => '[YES 08 – (2010-2011)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '2',
            ],
            [   'first_name'    => 'MOBASHIR MONIM',
                'middle_name'   => '',
                'last_name'     => '[YES 10 – (2012-2013)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '3',
            ],
            [   'first_name'    => 'MARYAN KARMOKER',
                'middle_name'   => '',
                'last_name'     => '[YES 10 – (2012-2013)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '4',
            ],
            [   'first_name'    => 'TAHSEEN LUBABA',
                'middle_name'   => '',
                'last_name'     => '[YES 11 – (2013-2014)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '5',
            ],
            [   'first_name'    => 'MAESHA ISLAM SHUDHA',
                'middle_name'   => '',
                'last_name'     => '[YES 11 – (2013-2014)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '6',
            ],
            [   'first_name'    => 'TASNEEM KIBRIA ORPA',
                'middle_name'   => '',
                'last_name'     => '[YES 11 – (2013-2014)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '7',
            ],
            [   'first_name'    => 'RADEEYAH ZAMAN KHAN',
                'middle_name'   => '',
                'last_name'     => '[YES 11 – (2013-2014)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '8',
            ],
            [   'first_name'    => 'SUMAIYA KHAN DISHA',
                'middle_name'   => '',
                'last_name'     => '[YES 12 – (2014-2015)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '9',
            ],
            [   'first_name'    => 'IFREET TAHEEA',
                'middle_name'   => '',
                'last_name'     => '[YES 12 – (2014-2015)]',
                'email'         =>  'no@yeselection.org',
                'candidate_id'  =>  '10',
            ]
        ];

        foreach ($candidates as $candidate){
            Candidate::create($candidate);
        }
    }
}
