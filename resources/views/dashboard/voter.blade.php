
@extends('layouts.master')

@section('title', 'Dashboard: Voters')

@section('content')

    @if(isset($voter) && count($voter) > 0)
        <h3>Full Name: <small>{{$voter->first_name}} {{$voter->middle_name}} {{$voter->last_name}}</small></h3>
        <h3>Email: <small> {{$voter->email}}</small></h3>
        <h3>Contact Number:<small> {{$voter->contact_number}}</small></h3>
        <h3>Batch Number: <small> {{$voter->batch_number}}</small></h3>
        <form action="{{$voter->id}}" method="POST">
            <button class="btn btn-danger">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                Delete
            </button>
        </form>
        <p></p>
    @else
        <h1>Voter does not exist.</h1>
    @endif


@endsection
