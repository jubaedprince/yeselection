
@extends('layouts.master')

@section('title', 'Dashboard: All Candidates')

@section('content')


    <h2>Voter List</h2>
    <p></p>
    <table class="table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Candidate ID</th>
            <th></th>
            <th>Vote Count</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($candidates as $candidate)
            <tr>
                <td><a href="candidate/{{$candidate->id}}">{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}</a></td>
                <td>{{$candidate->email}}</td>
                <td>{{$candidate->candidate_id}}</td>
                <td>
                    <form action=candidate/{{$candidate->id}} method="POST">
                        <button class="btn btn-danger">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            Delete
                        </button>
                    </form>
                </td>
                <td>{{$candidate->getVoteCount()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
