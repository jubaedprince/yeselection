<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Voter;
use App\Key;
use App\Vote;
use Redirect;
use DB;

class ElectionController extends Controller
{
    public function ballot(){
        $candidates = Candidate::all();
        return view('form.ballot')->with('candidates', $candidates);
    }

    public function processBallot(Request $request){

        //mark as voted.
        $key = Key::where('key', $request->input('key'))->first();
        $key->voted = true;
        $key->save();
        $selected_candidates = $request->input('candidate');

        if (sizeof($selected_candidates)!=4){
            return "Vote won't be counted. You didn't chose the right number of candidates.";
        }
        foreach ($request->input('candidate') as $id){
            Vote::create(['candidate_id' => $id]);
        }

        return "Thanks for voting.";
        //TODO::make view
    }

    public function sendAllBallot(){
        $keys = Key::all();
        foreach($keys as $key){
            echo $key->voter->email . ' ==> yeselection.dev/ballot?key=' . $key->key . '<br>';
        }
        //TODO:: send ballotlink to all the voters
    }

    public function resendBallot($id){
        $voter = Voter::find($id);
        $voter->key->delete();

        $key = Key::createKey($voter);

        //TODO:: send ballot link to user email

        return Redirect::to('/dashboard/voter')->with('message', 'Ballot was resent to '. $voter->first_name . '. Link: yeselection.dev/ballot?key=' . $key->key);

    }

    public function countVote(){
        $candidates = Candidate::all();

        foreach ($candidates as $candidate)
        {
            echo $candidate->first_name . ' ' . $candidate->getVoteCount();
            echo '<br>';
        }
        return 0;
    }
}
