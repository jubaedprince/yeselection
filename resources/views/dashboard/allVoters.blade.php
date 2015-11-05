
@extends('layouts.master')

@section('title', 'Dashboard: All voters')

@section('content')
<div class="col-md-12">
    <h2>Voter List</h2>
    <p></p>
    <table class="table lato">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Batch Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($voters as $voter)
        <tr>
            <td><a href="voter/{{$voter->id}}">{{$voter->first_name}} {{$voter->middle_name}} {{$voter->last_name}}</a></td>
            <td>{{$voter->email}}</td>
            <td>{{$voter->contact_number}}</td>
            <td>{{$voter->batch_number}}</td>
            <td>
                <form action=voter/{{$voter->id}} method="POST">
                    <button class="btn btn-danger">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Delete
                    </button>
                </form>
            </td>

            <td>
                <form action="voter/{{$voter->id}}/resend" method="POST">
                    <button class="btn">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Resend
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
