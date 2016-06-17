
@extends('layouts.master')

@section('title', 'Dashboard: Candidate')

@section('content')
    <div class="col-md-12 lato">
    @if(isset($candidate) && count($candidate) > 0)
        <div class="col-md-6 col-md-offset-3 span4 text-left">
            <div class="panel panel-info">
              <div class="panel-heading">Candidate</div>
                <div class="panel-body">
                    <h4>Full Name: <small>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}</small></h4>
                    <h4>Email: <small> {{$candidate->email}}</small></h4>
                    <h4>Candidate ID: <small> {{$candidate->candidate_id}}</small></h4>
                
                    <div>
                        <br>
                    </div>

                    <form action="{{$candidate->id}}" method="POST">
                        <button class="btn btn-danger">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
    @else
            <h1>Candidate does not exist.</h1>
    @endif
        </div>
    </div>

@endsection
