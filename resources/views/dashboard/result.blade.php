
@extends('layouts.master')

@section('title', 'Results')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

    <div class="col-md-12 text-center lato">
        <canvas id="myChart" width="200" height="80"></canvas>
    </div>

    <script>


    $(document).on('ready', function() {

        $.ajax({
            url: "/dashboard/count",
            data: {_token: "{!!csrf_token()!!}"},
            dataType: 'json',
            method: "get"


        }).done(function (data) {
            var steps = 3;
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                suggestedMin: 1,
                            }
                        }],
                    },


                    title: {
                        display: true,
                        text: 'Election Result'
                    },
                }
            });
        });

    });

    </script>
@endsection
