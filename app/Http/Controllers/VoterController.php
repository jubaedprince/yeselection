<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Voter;
use Redirect;
use View;
use App\Key;

class VoterController extends Controller
{

    public function index()
    {
        $voters = Voter::all();
        return view('dashboard.allVoters')->with('voters', $voters);
    }


    public function create()
    {
        return view('form.createVoter');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    =>  'required|max:30|alpha',
            'middle_name'   =>  'max:30|alpha',
            'last_name'     =>  'required|max:30|alpha',
            'email'         =>  'required|email|unique:voters',
            'contact_number'=>  'max:99999999999999999999|numeric',
            'batch_number'  =>  'required|min:1|max:12'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            $voter = Voter::create($request->all());



            return view('dashboard.home')->with('message', 'Voter added Successfully.');
        }


    }

    public function show($id)
    {
        $voter = Voter::find($id);
        return view('dashboard.voter')->with('voter', $voter);
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
        $voter = Voter::find($id);
        $voter->delete();
        return Redirect::to('/dashboard/voter')->with('message', 'Voter deleted Successfully.');
    }
}
