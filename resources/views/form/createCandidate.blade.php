
@extends('layouts.master')

@section('title', 'Add Candidate')

@section('content')
<div class="lato">
    <h3 class="text-center">Add a candidate</h3>
    <form action="/dashboard/candidate" method="POST">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="first_name">First Name*</label>
            <input type="text" class="form-control" value="{{ Input::old('first_name')}}" name="first_name" placeholder="First Name">
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" class="form-control" value="{{ Input::old('middle_name')}}" name="middle_name" placeholder="Middle Name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name*</label>
            <input type="text" class="form-control" value="{{ Input::old('last_name')}}" name="last_name" placeholder="Last Name">
        </div>

        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" class="form-control" value="{{ Input::old('email')}}" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="candidate_id">Candidate ID*</label>
            <input type="number" class="form-control" value="{{ Input::old('candidate_id')}}" name="candidate_id" placeholder="Candidate ID">
        </div>


        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
