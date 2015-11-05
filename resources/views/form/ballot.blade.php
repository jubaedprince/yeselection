@extends('layouts.master')

@section('title', 'Ballot')

@section('content')
Please chose 4 candidates. Else, your vote won't be counted.
    <form name="form" action="/ballot?key={{ app('request')->input('key') }}" method="POST">
        {!! csrf_field() !!}

        <?php $index=0; ?>
        @foreach ($candidates as $candidate)
            <div class="checkbox checkbox-success" >
                <input tabindex="1" class="styled" onclick="chkcontrol({{$index}})" id="checkbox"  type="checkbox" name="candidate[]" value={{$candidate->id}}>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}
            </div>
            <?php $index++; ?>
        @endforeach

        <button type="submit" id="vote" class="btn btn-success" disabled>VOTE</button>
    </form>

    <script type="text/javascript">
        function chkcontrol(j) {
            var candidate = form.elements['candidate[]'];
            var total=0;
            for(var i=0; i < candidate.length; i++){
                if(candidate[i].checked){
                    total =total +1;}
                    if(total > 4){
                    alert("Please Select only four") 
                    candidate[j].checked = false ;
                    return false;
                }
                if(total==4){
                    document.getElementById("vote").disabled = false;
                }else{
                    document.getElementById("vote").disabled = true;
                }   
            }
        }
    </script>

@endsection
