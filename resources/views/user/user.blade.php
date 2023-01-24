@extends('layouts.layout')
@section('title')
Show User
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Show <span class="font-weight-bolder text-capitalize">{{ $user->name }}</span> informations
@endsection


{{-- Profile Info --}}
    <div class="row m-auto">
        <div class="col-md-6 col-xs-12 m-auto">
            <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}} </span> Profile Details:
        </div>
        <div class="col-md-2 col-xs-12 m-auto">
            <a class="btn btn-dark  my-1 float-lg-right" href="{{ url('users', []) }}">Back</a>
        </div>
        <div class="col-md-10 col-xs-12 m-auto">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Workout Intensity</th>
                                <td>{{ $user->workout_intensity }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Age</th>
                                <td>{{ $user->age }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Height</th>
                                <td>{{ $user->height }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Exercise Days</th>
                                <td>{{ $user->exercise_days }}</td>
                            </tr>

                        </tbody>
                    </table>

        </div>
    </div>
{{-- Profile Info --}}



{{-- Chart  --}}
    <div class="row my-5">
        <div class="col-md-10 col-xs-12 m-auto">
            <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}}'s </span> Statistics
        </div>
        <div class="col-xl-10 col-lg-7 m-auto">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Activity This Week.</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    {{$user->name}}'s Activity This Week.
                    {{-- <code>/js/demo/chart-area-demo.js</code> file. --}}
                </div>
            </div>
        </div>

    </div>
{{-- Chart  --}}


{{-- Answers Table --}}
    <div class="row my-5">

        <div class="col-md-10 col-xs-12 m-auto">
            <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}}'s </span> Answers
        </div>

        <div class="col-md-10 col-xs-12 m-auto">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            {{-- <th scope="col">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody id="tableData">
                        {{-- Start Fetch Data --}}
                        @if ($user->answers->count() == 0)
                            <tr>
                                <th colspan="3">
                                    <div class="text-danger text-center font-weight-normal">
                                        No answers yet.
                                    </div>
                                </th>
                            </tr>
                        @else
                            @foreach ($user->answers as $answer)
                            {{-- {{dd($question->admin)}} --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $answer->question->title }}</td>

                                <td>
                                    @foreach (json_decode($answer->body) as $item)
                                        {{$item}}

                                            @if($loop->iteration != count(json_decode($answer->body) ))
                                                @if($answer->question->type == "multiple") , @endif
                                            @endif

                                    @endforeach

                                </td>

                            </tr>
                            @endforeach
                        @endif
                        {{-- End Fetch Data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{-- Answers Table --}}

<!-- Page level plugins -->
<script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>
<script>

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var lables = {{ Js::from($keys) }};
var values = {{ Js::from($values) }};
var description = {{ Js::from($description) }};
function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    labels: lables,
    datasets: [{
      label: "Losted Calories",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
    //   data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
      data: values,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 5,
        right: 20,
        top: 20,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'calory'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 5
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 7,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  number_format(value) + " cals";
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " " +   number_format(tooltipItem.yLabel) + " cals";
        }
      }
    }
  }
});




</script>
@endsection
