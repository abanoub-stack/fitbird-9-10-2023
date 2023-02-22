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
Show <span class="font-weight-bolder text-capitalize
@if ($user->is_subscribed == 1) text-warning @endif">
{{ $user->name }}
@if ($user->is_subscribed == 1) <i class="fas fa-crown text-warning"></i> @endif


</span> informations
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
                                <th scope="row">Account Type</th>
                                @if ($user->is_subscribed == 1)
                                    <td class="font-weight-bolder text-warning">
                                        Premium
                                        <small class="text-dark">
                                            (

                                            <span class="font-weight-bolder text-dark">
                                            {{$user->getSubType()}}
                                            </span>
                                            |
                                            <span class="font-weight-bolder text-success">
                                                {{  \Carbon\Carbon::parse($user->subscription_started_at)->format('Y-m-d') }}
                                            </span>
                                                -->
                                            <span class="font-weight-bolder text-danger">
                                                {{  \Carbon\Carbon::parse($user->subscription_finished_at)->format('Y-m-d')}}
                                            </span>
                                            )
                                         </small>
                                    </td>
                                @else
                                    <td class="font-weight-bolder text-success">Free </td>
                                @endif
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
                                <th scope="row">Weight</th>
                                <td>
                                     {{ $user->weight }}

                                </td>
                            </tr>


                            <tr>
                                <th scope="row">Goals</th>
                                <td>
                                    {{-- {{dd(json_decode($user->goals , true))}} --}}
                                    @if ($user->goals != null)
                                    <ul>
                                            @foreach (json_decode($user->goals , true) as $value)
                                                <li>{{$value}}</li>
                                            @endforeach
                                    </ul>
                                    @else
                                        <p class="text-danger">Has No Goals</p>
                                    @endif
                                </td>
                            </tr>


                            <tr>
                                <th scope="row">Activity</th>
                                <td>
                                     {{-- {{ $user->activity }} --}}
                                     @if ($user->activity != null)
                                        <ul>
                                                @foreach (json_decode($user->activity , true) as $value)
                                                    <li>{{$value}}</li>
                                                @endforeach
                                        </ul>
                                    @else
                                        <p class="text-danger">Has No Activity</p>
                                    @endif

                                </td>
                            </tr>


                            <tr>
                                <th scope="row">Exercise Days</th>
                                <td>{{ $user->exercise_days }}</td>
                            </tr>

                            @if($user->is_subscribed())
                                <tr>
                                    <th scope="row">Days Remaing In Premium</th>
                                    <td>
                                        @php
                                            $percent = floor((\Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now())/$user->getSubInDays()) * 100)
                                        @endphp
                                        <div class="progress">
                                            <div class="progress-bar bg-

                                            @if($percent > 90)
                                                success
                                            @elseif($percent < 90 && $percent > 40)
                                                warning
                                            @elseif($percent < 14)
                                                danger
                                            @endif


                                                " role="progressbar"
                                                style="width:{{$percent}}%"
                                                aria-valuenow="{{ \Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now() ) }}"
                                                aria-valuemin="0"
                                                aria-valuemax="{{$user->getSubInDays()}}"
                                                >{{ \Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now()) . " days from " . $user->getSubInDays() }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Customer Progress</th>
                                    <td>
                                       <a href="{{url('user-progress/'.$user->id , [])}}" class="btn btn-success btn-sm">Get Progress</a>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

        </div>
    </div>
{{-- Profile Info --}}



{{-- Chart  --}}
    {{-- <div class="row my-5">
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
                </div>
            </div>
        </div>

    </div> --}}
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

@if ($user->is_subscribed())
    {{-- User Exercies --}}
    <div class="row my-5">

        <div class="col-md-10 col-xs-12 m-auto">
            <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}}'s </span> Exercises
        </div>

        <div class="col-md-10 col-xs-12 m-auto">
            <section class="filters my-3">

                <div class="row">

                    <div class="col-lg-4 col-md-12" id="week_col">
                        <div class="form-group">
                            <label>Week </label>
                            <br>
                            <select name="parent_id" id="week_select" class="form-control select-box">
                                <option value="">Please Select Week</option>
                                @for ($i = 1 ; $i <= $user->get_sub_weeks() ; $i++)
                                    <option value="{{$i}}">Week {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-12" id="day_col">
                        <div class="form-group">
                            <label>Day</label>
                            <br>
                            <select name="parent_id" id="day_select" class="form-control select-box">
                                <option value="">Please Select Day</option>
                                @for ($i = 1 ; $i <= 7 ; $i++)
                                    <option value="{{$i}}">Day {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>




                </div>

            </section>
        </div>

         {{-- OlD DATA --}}
        <div class="col-md-8 col-xs-12 m-auto">
            <section class="container old_day_data mt-2 bg-dark" id="old_exe_section">
                {{-- <div class="row section-row ">
                    <div class="col-12">
                        <h5 class="d-block">Section name</h5>
                    </div>
                    <div class="col-lg-3 col-xs-6 ">
                        <div class="card text-center">
                        <img class="card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/Menuitem_1554382653.png" style="width: 150px; object-fit: contain" alt="">
                        <div class="card-body">
                            <h6 class="card-title">Exe Name</h6>
                            <p class="card-text ">

                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#deleteExeModal">
                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                </button>

                            </p>
                        </div>
                        </div>
                    </div>
                </div> --}}
            </section>
        </div>

        {{-- OlD DATA --}}
    </div>
    {{-- User Exercies --}}
@endif

{{-- Hidden Data --}}
    <form action="">
        <input type="hidden" value="{{$user->id}}" id="user_id">
        <input type="hidden" value="{{url('/weeks/by-week-day' , [])}}" id="url">
    </form>
{{-- Hidden Data --}}


@section('js')
<script>
$(document).ready(function()
{
    //On Change of Week Select
    $('#week_select').on('change', function() {
        var week = this.value;
        var day = $('#day_select').find(":selected").val();
        var customer_id = $("#user_id").val();
        var url = $("#url").val();

        if (this.value != '') {
                $.ajax(
                    {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type : 'POST',
                        url : url,
                        data :
                            {
                                'customer_id' : customer_id,
                                'day' : day,
                                'week' : week,
                            },
                        success: function(result) {
                            if (result.success == true)
                                {
                                    // alert(result.message);
                                    $("#old_exe_section").empty();

                                    // Add Category Selected of this day
                                    if(result.category != null)
                                    {
                                        colors = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                        const random = Math.floor(Math.random() * colors.length);
                                        color  =  colors[random];
                                        cat = `
                                        <div class="col-lg-4 col-md-12 m-auto mb-5" >
                                            <div class=" animated--fade-in card text-center border-bottom-${color}" >
                                                <img class="animated--fade-in card-img-top m-auto"
                                                    style="style="object-fit:cover; height:100px;"
                                                    src="${location.origin}/uploads/${result.category['icon'] }"
                                                    alt="category icon">
                                                <div class="animated--fade-in card-body">
                                                    <h5 class=" animated--fade-in card-title my-3 text-capitalize">${result.category['name']}</h5>
                                                </div>
                                            </div>
                                        </div>`;
                                        $("#old_exe_section").append(cat);
                                    }
                                    // Add Category Selected of this day


                                    for (let index = 0; index < result.exersices.length; index++)
                                    {
                                        //Fetch Weeks
                                        //Clear Old Data Before Add New EXES

                                        start_str = '<div class="row my-2 section-row "><div class="col-12"><h5 class="d-block">'+result.exersices[index]['section_name'] +'</h5></div>';
                                        // console.log(start_str);
                                        str = '';
                                        for (let i = 0; i < result.exersices[index]['exe_list'].length; i++) {
                                            str  += '<div class="col-lg-3 col-xs-6 my-1"   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center"><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                        }
                                        end_str= '</div>';
                                        $("#old_exe_section").append(start_str+str+end_str);
                                    }

                                    if (result.exersices.length == 0) {
                                        empty_alert = `<p class="text-danger text-center m-auto">No exersices for this day</p>`;
                                        $("#old_exe_section").append(empty_alert);
                                    }

                                }
                            else
                                {
                                    alert(result.message);
                                }
                        }
                    });

        }
        else
        {
        }

    });

     //On Change of Day Select
     $('#day_select').on('change', function() {
        var day = this.value;
        var week = $('#week_select').find(":selected").val();
        var customer_id = $("#user_id").val();
        var url = $("#url").val();


        if (this.value != '') {
                $.ajax(
                    {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type : 'POST',
                        url : url,
                        data :
                            {
                                'customer_id' : customer_id,
                                'day' : day,
                                'week' : week,
                            },
                        success: function(result) {
                            if (result.success == true)
                                {
                                    // alert(result.message);
                                    $("#old_exe_section").empty();

                                    // Add Category Selected of this day
                                    if(result.category != null)
                                    {
                                        colors = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                        const random = Math.floor(Math.random() * colors.length);
                                        color  =  colors[random];
                                        cat = `
                                        <div class="col-lg-4 col-md-12 m-auto mb-5" >
                                            <div class=" animated--fade-in card text-center border-bottom-${color}" >
                                                <img class="animated--fade-in card-img-top m-auto"
                                                    style="style="object-fit:cover; height:100px;"
                                                    src="${location.origin}/uploads/${result.category['icon'] }"
                                                    alt="category icon">
                                                <div class="animated--fade-in card-body">
                                                    <h5 class=" animated--fade-in card-title my-3 text-capitalize">${result.category['name']}</h5>
                                                </div>
                                            </div>
                                        </div>`;
                                        $("#old_exe_section").append(cat);
                                    }
                                    // Add Category Selected of this day


                                    for (let index = 0; index < result.exersices.length; index++)
                                    {
                                        //Fetch Weeks
                                        //Clear Old Data Before Add New EXES

                                        start_str = '<div class="row my-2 section-row "><div class="col-12"><h5 class="d-block">'+result.exersices[index]['section_name'] +'</h5></div>';
                                        // console.log(start_str);
                                        str = '';
                                        for (let i = 0; i < result.exersices[index]['exe_list'].length; i++) {
                                            str  += '<div class="col-lg-3 col-xs-6 my-1"   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center"><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                        }
                                        end_str= '</div>';
                                        $("#old_exe_section").append(start_str+str+end_str);
                                    }

                                    if (result.exersices.length == 0) {
                                        empty_alert = `<p class="text-danger text-center m-auto">No exersices for this day</p>`;
                                        $("#old_exe_section").append(empty_alert);
                                    }

                                }
                            else
                                {
                                    alert(result.message);
                                }
                        }
                    });

        }
        else
        {

        }
    });

});
</script>
@endsection











<!-- Page level plugins -->
<script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>





{{-- Chart JS --}}
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
