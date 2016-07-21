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
use Illuminate\Support\Facades\Mail;
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

        if (sizeof($selected_candidates)!=9){
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
        header("Content-Type: text/html"); // Set Content-Type
        while (@ob_end_flush()); // Flush and disable output buffers
        echo "sending email...";
        $c = 1;
        foreach($keys as $key){
            $voter = Voter::find($key->voter_id);
            $email_sent = $this->sendEmail($voter->email ,$voter->first_name. 'http://election.yesalumnibd.org/ballot?key='.$key->key);
            echo $email_sent.' to '.$voter->first_name.' ('.$voter->email.')';
            echo  "<br><br>\n";
            $c++;
        }
        echo 'Total email sent: '.$c-1;
        echo "<br><br>\n";
        flush(); // Flush output
        sleep(1);
        //TODO:: send ballotlink to all the voters
    }

    public function resendBallot($id){
        $voter = Voter::find($id);
        if ($voter->voted == true){
            return Redirect::to('/dashboard/voter')->with('message', 'User already voted. Cannot resend ballot');
        }
        $voter->key->delete();

        $key = Key::createKey($voter);

        $this->sendEmail($voter->email,"Hello, ".$voter->first_name. ',http://election.yesalumnibd.org/ballot?key='.$key->key);
        //TODO:: Change sendTo $voter->email

        return Redirect::to('/dashboard/voter')->with('message', 'Ballot was resent to '. $voter->first_name . '. Link: yeselection.dev/ballot?key=' . $key->key);

    }

    public function count(){
        return view('dashboard.result');
    }

    public function countVote(){
        $candidates = Candidate::all();

        $labels = array();
        $viewDataset = array();
        foreach ($candidates as $candidate) {

            array_push($labels, $candidate->first_name." ".$candidate->last_name." (".$candidate->getVoteCount().") ");
            array_push($viewDataset, $candidate->getVoteCount());
        }

        $viewData = array('labels'=>$labels, 'datasets'=> array (
            array('label'           => "# of votes",
                'fillColor'         => "rgba(255, 206, 86, 0.2)",
                'strokeColor'       => "rgba(255, 206, 86, 0.2)",
                'highlightFill'     => "rgba(255, 206, 86, 0.2)",
                'highlightStroke'   => "rgba(220,220,220,1)",
                'backgroundColor'   => "rgba(75, 192, 192, 0.2)",
                'borderColor'       => "rgba(75, 192, 192, 1)",
                'borderWidth'       => "1",
                'data'              =>$viewDataset),
        ));
        return (json_encode($viewData));
    }

    public function startElection(){
        $flag = Flag::find(1);
        if($flag->run_election == true){
            return view('dashboard.home')->with('message', 'Election has already started')->with("flag",$flag);
        }else{
            $flag->run_election = true;
            $flag->end_election = false;
            $flag->save();
            return view('dashboard.home')->with('message', 'Election started')->with("flag",$flag);
        }
    }

    public function stopElection(){
        $flag = Flag::find(1);
        if($flag->run_election == false){
            return view('dashboard.home')->with('message', 'Election has already ended')->with("flag",$flag);
        }else{
            $flag->run_election = false;
            $flag->end_election = true;
            $flag->save();
            return view('dashboard.home')->with('message', 'Election ended')->with("flag",$flag);
        }
    }

    public function sendEmail($sendTo,$body){
        Mail::send([], [], function ($message) use ($sendTo,$body) {
            $message->to($sendTo)
            ->subject('YES ALUMNI ELECTION 2016')
            ->setBody($body);
        });

        return 'Email Sent.';
    }
}
