
@extends('layouts.master')

@section('title', 'Add Voter')

@section('content')
<div class="lato">
    <h3 class="text-center">Add a voter</h3>
    <form action="/dashboard/voter" method="POST">
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
            <label for="contact_number">Contact Number</label>
            <input type="number" class="form-control" value="{{ Input::old('contact_number')}}" name="contact_number" placeholder="Contact Number">
        </div>

        <div class="form-group">
            <label for="batch_number">Batch Number*</label>
            <select class="form-control" name="batch_number" value="{{ Input::old('batch_number')}}">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
