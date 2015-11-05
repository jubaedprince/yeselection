
@extends('layouts.master')

@section('title', 'Dashboard: Voters')

@section('content')
<div class="col-md-12 lato">
    @if(isset($voter) && count($voter) > 0)
        <div class="col-md-6 col-md-offset-3 span4 text-left">
            <div class="panel panel-info">
              <div class="panel-heading">Voter</div>
                <div class="panel-body">
                    <h4>Full Name: <small>{{$voter->first_name}} {{$voter->middle_name}} {{$voter->last_name}}</small></h4>
                    <h4>Email: <small> {{$voter->email}}</small></h4>
                    <h4>Contact Number: <small>{{$voter->contact_number}}</small></h4>
                    <h4>Batch Number: <small> {{$voter->batch_number}}</small></h4>
                
                    <div>
                        <br>
                    </div>

                    <form action="{{$voter->id}}" method="POST">
                        <button class="btn btn-danger">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
    @else
        <h1>Voter does not exist.</h1>
    @endif
    </div>
</div>

@endsection
