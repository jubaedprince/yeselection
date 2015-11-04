@extends('layouts.master')

@section('title', 'Ballot')

@section('content')
Please chose 4 candidates. Else, your vote won't be counted.
    <form action="/ballot?key={{ app('request')->input('key') }}" method="POST">
        {!! csrf_field() !!}

        {{--@foreach ($candidates as $candidate)--}}
            {{--<div class="checkbox">--}}
                {{--<input type="checkbox" name="candidate" value="{{$candidate->id}}"> {{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}--}}
            {{--</div>--}}
        {{--@endforeach--}}

        @foreach ($candidates as $candidate)
            <div class="checkbox">
                <input tabindex="1" type="checkbox" name="candidate[]" value={{$candidate->id}}>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}
            </div>
        @endforeach

        <br>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection
