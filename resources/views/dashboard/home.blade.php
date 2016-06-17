
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-12 text-center lato">
    <h3 class="lato" style="font-size: 50px;font-weight:300">Dashboard</h3>

    @if(isset($flag))
        @if ($flag->run_election == "1")
            <p style="color:#337ab7">Election is now going on</p>
        @else
            <p style="color:red">Election is not going on.</p>
        @endif
    @endif

    <div>
        <br>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class = "panel panel-primary">
                       <div class = "panel-heading">
                          <h3 class = "panel-title">Candidate Manager</h3>
                       </div>
                       
                       <div class = "panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('CandidateController@create')}}">Add Candidate</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('CandidateController@index')}}">All Candidates</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class = "panel panel-primary">
                       <div class = "panel-heading">
                          <h3 class = "panel-title">Election Manager</h3>
                       </div>
                       
                       <div class = "panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('ElectionController@sendAllBallot')}}">Send Ballot</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('ElectionController@startElection')}}">Start Vote</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('ElectionController@stopElection')}}">End Vote</a>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class = "panel panel-primary">
                       <div class = "panel-heading">
                          <h3 class = "panel-title">Voter Manager</h3>
                       </div>
                       
                       <div class = "panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('VoterController@create')}}">Add Voter</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 span6">
                                    <a class="btn btn-info btn-block"  href="{{action('VoterController@index')}}">All Voters</a>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
