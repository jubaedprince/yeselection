
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-sm-3">
        <h3>Add Voter</h3>
        <a href="{{action('VoterController@create')}}">Add Voter</a>
    </div>

    <div class="col-sm-3">
        <h3>All Voters</h3>
        <a href="{{action('VoterController@index')}}">All Voters</a>
    </div>

    <div class="col-sm-3">
        <h3>Add Candidate</h3>
        <a href="{{action('CandidateController@create')}}">Add Candidate</a>
    </div>

    <div class="col-sm-3">
        <h3>All Candidates</h3>
        <a href="{{action('CandidateController@index')}}">All Candidates</a>
    </div>

    <div class="col-sm-3">
        <h3>Start Vote</h3>
        <a href="{{action('ElectionController@sendAllBallot')}}">Send Ballot</a>
    </div>
    <div class="col-sm-3">
        <h3>Stop Vote</h3>
        <form method="GET" action="settings">
            <button type="submit" name="edit" value="hello" class="btn btn-primary">Stop Vote</button>
        </form>
    </div>
</div>
@endsection
