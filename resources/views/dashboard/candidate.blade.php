
@extends('layouts.master')

@section('title', 'Dashboard: Candidate')

@section('content')

    @if(isset($candidate) && count($candidate) > 0)
        <h3>Full Name: <small>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}</small></h3>
        <h3>Email: <small> {{$candidate->email}}</small></h3>
        <h3>Candidate ID: <small> {{$candidate->candidate_id}}</small></h3>
        <form action="{{$candidate->id}}" method="POST">
            <button class="btn btn-danger">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                Delete
            </button>
        </form>
        <p></p>
    @else
        <h1>Candidate does not exist.</h1>
    @endif


@endsection
