<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flag;
use App\Candidate;
use App\Voter;
use App\Key;
use App\Vote;
use Redirect;
use DB;

class ElectionController extends Controller
{
    public function ballot(){

        $flag = Flag::get()->first();
        if($flag->run_election == true){
            $candidates = Candidate::all();
            return view('form.ballot')->with('candidates', $candidates);
        }elseif ($flag->end_election == true){
            return view('form.success')->with('message', "The Election has ended.");
        }else{
            return view('form.success')->with('message', "The Election hasn't started yet. Please Wait..");
        }
    }

    public function processBallot(Request $request){

        //mark as voted.
        $key = Key::where('key', $request->input('key'))->first();
        $key->voted = true;
        $key->save();
        $selected_candidates = $request->input('candidate');

        if (sizeof($selected_candidates)!=4){
            $message="Vote won't be counted. You didn't chose the right number of candidates.";
            return view('form.success')->with('message', $message);
        }
        foreach ($request->input('candidate') as $id){
            Vote::create(['candidate_id' => $id]);
        }

        $message="Thanks for voting.";
        return view('form.success')->with('message', $message);
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
        if ($voter->voted == true){
            return Redirect::to('/dashboard/voter')->with('message', 'User already voted. Cannot resend ballot');
        }
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

    public function startElection(){
        $flag = Flag::find(1);
        if($flag->run_election == true){
            return view('dashboard.home')->with('message', 'Election has already started');
        }else{
            $flag->run_election = true;
            $flag->end_election = false;
            $flag->save();
            return view('dashboard.home')->with('message', 'Election started');
        }
    }

    public function stopElection(){
        $flag = Flag::find(1);
        if($flag->run_election == false){
            return view('dashboard.home')->with('message', 'Election has already ended');
        }else{
            $flag->run_election = false;
            $flag->end_election = true;
            $flag->save();
            return view('dashboard.home')->with('message', 'Election ended');
        }
    }
}
