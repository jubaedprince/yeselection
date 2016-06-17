<!DOCTYPE html>
<html lang="en">
    <head>
        <title>YES Alumni Election</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,400' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <div class="text-center" style="background-color: #C0392B; padding-top:5px;padding-bottom: 5px">
            <h3 style=" font-size: 70px; font-family: 'Lato'; font-weight: 100; color: white">YES Alumni Election 2016</h3>
        </div>

        <div class="container">

            <div>
                <br>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3 id="message" style="font-family: 'Roboto' sans-serif;font-weight: 400; color: red">
                        Please select 4 candidates. Else, your vote won't be counted.
                    </h3>
                </div>
            </div>

            <div>
                <br>
            </div>

            <div class="row">
                <form name="form" action="/ballot?key={{ app('request')->input('key') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="col-md-6 col-md-offset-3 span5 text-left box">
                        <?php $index=0; ?>

                        @foreach ($candidates as $candidate)
                            <div class="checkbox" >
                                <input tabindex="1" class="styled" onclick="checkcontrol({{$index}})" id="checkbox"  type="checkbox" name="candidate[]" value={{$candidate->id}}>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}
                            </div>
                            <?php $index++; ?>
                        @endforeach
                    </div>

                    <div class="col-md-12">
                        <br>
                    </div>

                    <div class="col-md-2 col-md-offset-5 span7 text-center">
                        <button type="submit" id="vote" class="btn btn-primary btn-block" disabled>VOTE</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="footer navbar-fixed-bottom text-center">
            <p text>Created by <a href="http://www.techynaf.com" target="_blank">Techynaf</a></p>
        </div>


        <style>
            .col-centered{
                float: none;
                margin: 0 auto;
            }
            .container-fluid{
                padding: 0px;
            }
            .box{
                -webkit-box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.48);
                -moz-box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.48);
                box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.48);
                padding-left: 10% ;
                padding-right: 10%;
                background: #C0392B
            }
            .checkbox{
                font-weight: bold;
                color: white;
            }
            .footer{
                background: #F8F8F8;
                padding-top: 10px;
            }
        </style>

        <script type="text/javascript">
            function checkcontrol(j) {
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
                        document.getElementById("message").style.color = "green";
                    }else{
                        document.getElementById("vote").disabled = true;
                        document.getElementById("message").style.color = "red";
                    }
                }
            }
        </script>
    </body>
</html>
