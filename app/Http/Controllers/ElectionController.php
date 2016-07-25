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
        header("Content-Type: text/html");
        while (@ob_end_flush());
        echo "sending email...";
        echo "<br><br>\n";
        $keys = Key::all();
        $c = 0;
        foreach($keys as $key){
            $voter = Voter::find($key->voter_id);
            //$email_sent = $this->sendEmail($voter->email ,"Hello, ".$voter->first_name. ' http://election.yesalumnibd.org/ballot?key='.$key->key);
            $email_sent = $this->sendEmail($voter->email,"Dear YES Alumni,

                \nHope you are well. This is your official email for voting. The link below has been uniquely generated in your name; so you can only vote once. Click on the URL, and you will be directed to the ballot page where you can cast your vote.
                \nPlease note that the voting system will ONLY be active from 12:00AM to 11:59PM of Tuesday, 26 July, 2016. You must cast your vote within this time window.
                \nAfter you have submitted your votes, you will be lead to an end page - that is the confirmation of your vote. If you face any problems during voting, please contact me at the given information below; the necessary actions will be taken.
                \nThe results will be published after 5:00PM on Wednesday, 27 July, 2016.\n\n". 'The ballot link: http://election.yesalumnibd.org/ballot?key='.$key->key."\n
                \nThis event marks a great significance in the practice of democracy for the YES Alumni association in Bangladesh. Wishing you and the association all the very best!

                \nBest regards,

                \nMuhammad Maruf Ibne Wali
                \nElection Commissioner
                \nYES Alumni EC Elections 2016
                \nPhone: 01716788220
                \nemail: marufwali@yahoo.com");

            echo $email_sent.' to '.$voter->first_name.' ('.$voter->email.')';
            echo  "<br><br>\n";
            $c++;
        }
        echo 'Total email sent: '. $c;
        echo "<br><br>\n";
        flush();
        sleep(1);
    }

    public function resendBallot($id){
        $voter = Voter::find($id);
        if ($voter->voted == true){
            return Redirect::to('/dashboard/voter')->with('message', 'User already voted. Cannot resend ballot');
        }
        $voter->key->delete();
        $key = Key::createKey($voter);
        //$this->sendEmail($voter->email,"Hello, ".$voter->first_name. ', http://election.yesalumnibd.org/ballot?key='.$key->key);
        $this->sendEmail($voter->email,"Dear YES Alumni,

        \nHope you are well. This is your official email for voting. The link below has been uniquely generated in your name; so you can only vote once. Click on the URL, and you will be directed to the ballot page where you can cast your vote.
        \nPlease note that the voting system will ONLY be active from 12:00AM to 11:59PM of Tuesday, 26 July, 2016. You must cast your vote within this time window.
        \nAfter you have submitted your votes, you will be lead to an end page - that is the confirmation of your vote. If you face any problems during voting, please contact me at the given information below; the necessary actions will be taken.
        \nThe results will be published after 5:00PM on Wednesday, 27 July, 2016.\n\n". 'The ballot link: http://election.yesalumnibd.org/ballot?key='.$key->key."\n
        \nThis event marks a great significance in the practice of democracy for the YES Alumni association in Bangladesh. Wishing you and the association all the very best!

        \nBest regards,

        \nMuhammad Maruf Ibne Wali
        \nElection Commissioner
        \nYES Alumni EC Elections 2016
        \nPhone: 01716788220
        \nemail: marufwali@yahoo.com");
        return Redirect::to('/dashboard/voter')->with('message', 'Ballot was resent to '. $voter->first_name . '. Link: election.yesalumnibd.org/ballot?key=' . $key->key);

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
