<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    {{--BOOTSTRAP--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{--BOOTSTRAP END--}}
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">YES ALUMNI ELECTION</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    @if(!Auth::guest())
                        <li><a href="/dashboard">Home</a></li>
                        <li><a href="{{action('VoterController@create')}}">Add Voter</a></li>
                        <li><a href="{{action('VoterController@index')}}">All Voters</a></li>
                        <li><a href="{{action('CandidateController@create')}}">Add Candidate</a></li>
                        <li><a href="{{action('CandidateController@index')}}">All Candidates</a></li>
                        <li><a href="{{action('Auth\AuthController@getLogout')}}">Logout</a></li>
                    @else

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{--Nav Bar--}}
        <!-- <div class="jumbotron">
            <h1>Dashboard</h1>
        </div> -->

        {{--Message--}}
       @if(Session::get('message')!= '')
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
       @endif

        {{--Message--}}
        @if(isset($message))
            <div class="alert alert-info">
                {{$message}}
            </div>
        @endif

        {{--Errors--}}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{--End Nav Bar--}}

        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>