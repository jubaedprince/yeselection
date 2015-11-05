<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Candidate;
use Redirect;
use View;

class CandidateController extends Controller
{

    public function index()
    {
        $candidates = Candidate::all();
        return view('dashboard.allCandidates')->with('candidates', $candidates);
    }


    public function create()
    {
        return view('form.createCandidate');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    =>  'required|max:30|alpha',
            'middle_name'   =>  'max:30|alpha',
            'last_name'     =>  'required|max:30|alpha',
            'email'         =>  'required|email|unique:candidates',
            'candidate_id'  =>  'numeric'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            Candidate::create($request->all());

            return view('dashboard.home')->with('message', 'Candidate Added Successfully.');
        }
    }

    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view('dashboard.candidate')->with('candidate', $candidate);
    }

    public function edit($id)
    {
       //No edit.
    }

    public function update(Request $request, $id)
    {
        //No update.
    }

    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();
        return Redirect::to('/dashboard/candidate')->with('message', 'Candidate deleted Successfully.');
    }
}
