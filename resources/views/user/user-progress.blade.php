@extends('layouts.layout')
@section('title')
Show User
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .section-header
    {
        padding: 30px;
        box-shadow: rgba(50, 50, 93, 0.164) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;    }
</style>
@endsection


@section('content')

@section('head-title')
Show <span class="font-weight-bolder text-capitalize
@if ($user->is_subscribed == 1) text-warning @endif">
{{ $user->name }}
@if ($user->is_subscribed == 1) <i class="fas fa-crown text-warning"></i> @endif


</span> Reports
@endsection


{{-- Profile Info --}}
    <div class="row m-auto">
        <div class="col-md-6 col-xs-12 m-auto">
            <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}} </span> Profile Details:
        </div>
        <div class="col-md-2 col-xs-12 m-auto">
            <a class="btn btn-dark  my-1 float-lg-right" href="{{ url('user/'.$user->id, []) }}">Back</a>
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
                                <th scope="row">Exercise Days</th>
                                <td>{{ $user->exercise_days }}</td>
                            </tr>

                        </tbody>
                    </table>

        </div>
    </div>
{{-- Profile Info --}}






{{-- User Stats  Row--}}

<div class="row my-2">

    {{-- Header --}}
    <div class="col-md-10 col-xs-12 m-auto mb-5">
        <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}}'s </span> Statistics
    </div>

    {{-- Header --}}

    {{-- Filterts --}}
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
    {{-- Filterts --}}


    {{-- Chart  --}}
    <div class="col-lg-10 col-md-12 animated--grow-in m-auto" id="chart-row" style="display: none">
        <div class="row animated--grow-in" id="charts-row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Activity of Week <span id="week-chart-no">(week number)</span>.</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Activity of Day <span id="day-chart-no" class="text-success" style="font-size: 25px">(day number)</span> </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Chart  --}}

    {{-- OlD DATA --}}
    <div class="col-md-8 col-xs-12 m-auto">
        <section class="container old_day_data mt-2 " id="old_exe_section">
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
{{-- User Stats  Row--}}




{{-- Hidden Data --}}
    <form action="">
        <input type="hidden" value="{{$user->id}}" id="user_id">
        <input type="hidden" value="{{url('/weeks/by-week-day-reports' , [])}}" id="url">
        <input type="hidden" value="{{url('/weeks/by-week-day-charts' , [])}}" id="charts-url">

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
            var charts_url = $("#charts-url").val();

            if (this.value != '')
            {
                //1- Get Exe Data
                $.ajax
                ({
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
                                    console.log(result);
                                    $("#old_exe_section").empty();

                                    // Add Category Selected of this day
                                    if(result.category != null)
                                    {
                                        colors = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                        const random = Math.floor(Math.random() * colors.length);
                                        color  =  colors[random];
                                        cat =
                                        `
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
                                        </div>
                                        `;

                                        if (result.is_completed) {
                                            status = "Completed";
                                            status_color = "success";

                                        } else {
                                            status = "Not Completed";
                                            status_color = "danger";
                                        }
                                        day_status =
                                        `
                                            <div class="col-lg-4 col-md-12 m-auto mb-5" >
                                                <div class=" animated--fade-in card text-center border-left-${status_color}" >
                                                    <div class="animated--fade-in card-title">
                                                        <h5 class=" animated--fade-in card-title my-3 text-capitalize text-${status_color}">Day ${status}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        const section_header = `<div class="row mb-3 section-header"> ${day_status} ${cat} </div>`;
                                        $("#old_exe_section").append(section_header);
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
                                            if(result.exersices[index]['exe_list'][i]['is_completed'])
                                            {
                                                str  += '<div class="col-lg-3 col-xs-6 my-1 "   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center "><span class="m-2 badge badge-pill badge-success">Completed</span><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                            }
                                            else
                                            {
                                                str  += '<div class="col-lg-3 col-xs-6 my-1 "   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center "><span class="m-2 badge badge-pill badge-warning">Waiting</span><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                            }
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

                //2- Generate The Charts
                $('#day-chart-no').text(day);
                $('#week-chart-no').text(week);
                    $.ajax
                    ({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type : 'POST',
                        url : charts_url ,
                        data :
                            {
                                'customer_id' : customer_id,
                                'day' : day,
                                'week' : week,
                            },
                        success: function(result) {
                            if (result.success == true)
                                {
                                    pie_lables = result.pie_lables;
                                    pie_values = result.pie_values;
                                    area_lables = result.area_lables;
                                    area_values = result.area_values;

                                    //PIE JS
                                    $('#chart-row').css('display', 'block');
                                    var ctx = document.getElementById("myPieChart");
                                    var myPieChart = new Chart(ctx,
                                        {
                                            type: 'doughnut',
                                            data: {
                                                labels: pie_lables,
                                                datasets: [{
                                                data: pie_values,
                                                backgroundColor: ['#0a7f2d', '#920c0c'],
                                                hoverBackgroundColor: ['#054218', '#420505'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                                }],
                                            },
                                            options: {
                                                maintainAspectRatio: false,
                                                tooltips: {
                                                backgroundColor: "rgb(255,255,255)",
                                                bodyFontColor: "#858796",
                                                borderColor: '#dddfeb',
                                                borderWidth: 1,
                                                xPadding: 15,
                                                yPadding: 15,
                                                displayColors: false,
                                                caretPadding: 10,
                                                },
                                                legend: {
                                                display: false
                                                },
                                                cutoutPercentage: 80,
                                            },
                                        });


                                    //Area JS
                                    var ctx2 = document.getElementById("myAreaChart");
                                    var myLineChart = new Chart(ctx2,
                                        {
                                            type: 'line',
                                            data: {
                                                labels: area_lables,
                                                datasets: [{
                                                label: "Finished Exercises : ",
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
                                                data: area_values,
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
                                                    unit: 'exercises'
                                                    },
                                                    gridLines: {
                                                    display: false,
                                                    drawBorder: false
                                                    },
                                                    ticks: {
                                                    maxTicksLimit: 7
                                                    }
                                                }],
                                                yAxes: [{
                                                    ticks: {
                                                    maxTicksLimit: 10,
                                                    padding: 2,
                                                    // Include a dollar sign in the ticks
                                                    callback: function(value, index, area_values) {
                                                        return  value + " exercise";
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
                                                titleFontSize: 16,
                                                borderColor: '#dddfeb',
                                                borderWidth: 2,
                                                xPadding: 10,
                                                yPadding: 10,
                                                displayColors: true,
                                                intersect: false,
                                                mode: 'index',
                                                caretPadding: 10,
                                                callbacks: {
                                                    label: function(tooltipItem, chart) {
                                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                    return datasetLabel + " " +   number_format(tooltipItem.yLabel) + " exercises";
                                                    }
                                                }
                                                }
                                            }
                                        });

                                }
                                else
                                {
                                    $('#chart-row').css('display', 'none');
                                }

                        }
                    });

            }

        });

        //On Change of Day Select
        $('#day_select').on('change', function() {
            var day = this.value;
            var week = $('#week_select').find(":selected").val();
            var customer_id = $("#user_id").val();
            var url = $("#url").val();
            var charts_url = $("#charts-url").val();


            if (this.value != '')
            {
                //1- Get Exe Data
                    $.ajax
                    ({
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
                                        // console.log(result);
                                        $("#old_exe_section").empty();

                                        // Add Category Selected of this day
                                        if(result.category != null)
                                        {
                                            colors = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                            const random = Math.floor(Math.random() * colors.length);
                                            color  =  colors[random];
                                            cat =
                                            `
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
                                            </div>
                                            `;

                                            if (result.is_completed) {
                                                status = "Completed";
                                                status_color = "success";

                                            } else {
                                                status = "Not Completed";
                                                status_color = "danger";
                                            }
                                            day_status =
                                            `
                                                <div class="col-lg-4 col-md-12 m-auto mb-5" >
                                                    <div class=" animated--fade-in card text-center border-left-${status_color}" >
                                                        <div class="animated--fade-in card-title">
                                                            <h5 class=" animated--fade-in card-title my-3 text-capitalize text-${status_color}">Day ${status}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            `;
                                            const section_header = `<div class="row mb-3 section-header"> ${day_status} ${cat} </div>`;
                                            $("#old_exe_section").append(section_header);
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
                                                if(result.exersices[index]['exe_list'][i]['is_completed'])
                                                {
                                                    str  += '<div class="col-lg-3 col-xs-6 my-1 "   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center "><span class="m-2 badge badge-pill badge-success">Completed</span><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                                }
                                                else
                                                {
                                                    str  += '<div class="col-lg-3 col-xs-6 my-1 "   id="exe-ele-'+result.exersices[index]['exe_list'][i]['id']+'" ele-id="'+result.exersices[index]['exe_list'][i]['id']+'"><div class=" animated--fade-in card text-center "><span class="m-2 badge badge-pill badge-warning">Waiting</span><img class=" animated--fade-in card-img-top m-auto" src="https://fitbird.stackdeans.xyz/public/uploads/'+result.exersices[index]['exe_list'][i]['image'] +'" style="height: 100px; object-fit: contain" alt=""><div class=" animated--fade-in card-body"><h6 class=" animated--fade-in card-title my-3" >'+result.exersices[index]['exe_list'][i]['name']+'</h6></div></div></div>';
                                                }
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

                //2- Generate The Charts
                $('#day-chart-no').text(day);
                $('#week-chart-no').text(week);

                    $.ajax
                    ({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type : 'POST',
                        url : charts_url ,
                        data :
                            {
                                'customer_id' : customer_id,
                                'day' : day,
                                'week' : week,
                            },
                        success: function(result) {
                            if (result.success == true)
                                {
                                    pie_lables = result.pie_lables;
                                    pie_values = result.pie_values;
                                    area_lables = result.area_lables;
                                    area_values = result.area_values;

                                    $('#chart-row').css('display', 'block');


                                    //PIE JS
                                    var ctx = document.getElementById("myPieChart");
                                    var myPieChart = new Chart(ctx,
                                        {
                                            type: 'doughnut',
                                            data: {
                                                labels: pie_lables,
                                                datasets: [{
                                                data: pie_values,
                                                backgroundColor: ['#0a7f2d', '#920c0c'],
                                                hoverBackgroundColor: ['#054218', '#420505'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                                }],
                                            },
                                            options: {
                                                maintainAspectRatio: false,
                                                tooltips: {
                                                backgroundColor: "rgb(255,255,255)",
                                                bodyFontColor: "#858796",
                                                borderColor: '#dddfeb',
                                                borderWidth: 1,
                                                xPadding: 15,
                                                yPadding: 15,
                                                displayColors: false,
                                                caretPadding: 10,
                                                },
                                                legend: {
                                                display: false
                                                },
                                                cutoutPercentage: 80,
                                            },
                                        });


                                    //Area JS
                                    var ctx2 = document.getElementById("myAreaChart");
                                    var myLineChart = new Chart(ctx2,
                                        {
                                            type: 'line',
                                            data: {
                                                labels: area_lables,
                                                datasets: [{
                                                label: "Finished Exercises : ",
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
                                                data: area_values,
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
                                                    unit: 'exercises'
                                                    },
                                                    gridLines: {
                                                    display: false,
                                                    drawBorder: false
                                                    },
                                                    ticks: {
                                                    maxTicksLimit: 7
                                                    }
                                                }],
                                                yAxes: [{
                                                    ticks: {
                                                    maxTicksLimit: 3,
                                                    padding: 2,
                                                    // Include a dollar sign in the ticks
                                                    callback: function(value, index, area_values) {
                                                        return  value + " exercise";
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
                                                titleFontSize: 16,
                                                borderColor: '#dddfeb',
                                                borderWidth: 2,
                                                xPadding: 10,
                                                yPadding: 10,
                                                displayColors: true,
                                                intersect: false,
                                                mode: 'index',
                                                caretPadding: 10,
                                                callbacks: {
                                                    label: function(tooltipItem, chart) {
                                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                                    return datasetLabel + " " +   number_format(tooltipItem.yLabel) + " exercises";
                                                    }
                                                }
                                                }
                                            }
                                        });

                                }
                            else
                            {
                                $('#chart-row').css('display', 'none');
                            }
                        }
                    });
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
</script>


<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


</script>
@endsection
