@extends('layouts.layout')

@section('title')
    Progress Reports
@endsection

@section('css')
    {{-- Custom Style of This Page --}}
@endsection

@section('content')
@section('head-title')
    Progress Reports
@endsection

{{-- Start Of Conetent --}}



<div class="row">
    <div class="col-md-10 offset-md-1">

        {{-- Filters --}}
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12">
                <h5 class="text-muted">
                    Filters
                </h5>
                <form action="{{ url('progress-reports') }}" method="POST">
                    @csrf
                    <input type="hidden" name="has_filter" value=1>

                    <div class="row">

                        {{-- Daily filter --}}
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="daily">Daily</label>
                                <input type="number" class="form-control"
                                    @if (isset($day))
                                    value="{{$day}}"
                                    @else
                                    value=""
                                    @endif
                                    name="day"
                                    min="1" max="31" step="1" placeholder="Day Number (1:31)" />
                            </div>
                        </div>


                        {{-- Monthly filter --}}
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="monthly">Monthly</label>
                                <select class="form-control" name="month">
                                    <option value=''>--Select Month--</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 1)
                                            selected
                                        @endif
                                        @endif
                                    value='1'>Janaury</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 2)
                                            selected
                                        @endif
                                        @endif
                                    value='2'>February</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 3)
                                            selected
                                        @endif
                                        @endif
                                    value='3'>March</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 4)
                                            selected
                                        @endif
                                        @endif
                                    value='4'>April</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 5)
                                            selected
                                        @endif
                                        @endif
                                    value='5'>May</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 6)
                                            selected
                                        @endif
                                        @endif
                                    value='6'>June</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 7)
                                            selected
                                        @endif
                                        @endif
                                    value='7'>July</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 8)
                                            selected
                                        @endif
                                        @endif
                                    value='8'>August</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 9)
                                            selected
                                        @endif
                                        @endif
                                    value='9'>September</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 10)
                                            selected
                                        @endif
                                        @endif
                                    value='10'>October</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 11)
                                            selected
                                        @endif
                                        @endif
                                    value='11'>November</option>
                                    <option
                                        @if(isset($month))
                                        @if ($month == 12)
                                            selected
                                        @endif
                                        @endif
                                    value='12'>December</option>
                                </select>
                            </div>
                        </div>


                        {{-- Cal filter --}}
                        <div class="col-lg-2 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="calories">Calories</label>
                                <input type="number" class="form-control"
                                @if(isset($calories))
                                    @if ($calories != 0)
                                    value="{{$calories}}"
                                    @else
                                    value=""
                                    @endif
                                @endif
                                    name="cal"
                                    min="1"   placeholder="Enter Calories" />
                            </div>
                        </div>



                        {{-- Apply filter --}}
                        <div class="col-lg-2 col-sm-6 col-xs-12 mt-4">
                            <div class="form-group float-lg-right">
                                <input class="btn btn-outline-primary opacity-50" value="Apply Filters" type="submit">
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
        {{-- Filters --}}








        {{-- Chart  --}}
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                {{-- <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                <hr>
                                Styling for the area chart can be found in the
                                <code>/js/demo/chart-area-demo.js</code> file.
                            </div>
                        </div> --}}

                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <h6>{!! $description !!}</h6>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                        {!! $description !!}
                        {{-- <code>/js/demo/chart-bar-demo.js</code> file. --}}
                    </div>
                </div>

            </div>

            <!-- Donut Chart -->
            {{-- <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <hr>
                                Styling for the donut chart can be found in the
                                <code>/js/demo/chart-pie-demo.js</code> file.
                            </div>
                        </div>
                    </div> --}}
        </div>
        {{-- Chart  --}}




        {{-- Search Input --}}
        <div class="row my-2 justify-content-end ">
            <div class="col-lg-12 col-md-12">
                <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
            </div>

        </div>
        {{-- Search Input --}}


        {{-- Data Table --}}
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Calories</th>
                                <th scope="col">WorkOut</th>
                                <th scope="col">Minutes</th>
                                {{-- <th scope="col">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            @foreach ($reports as $report)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $report->progress_date->format('M/d') }}</td>
                                    <td>
                                        <a href="{{ url('user', [$report->customer_id]) }}">
                                            {{ $report->user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $report->calories }}</td>
                                    <td>{{ $report->workouts }}</td>
                                    <td>{{ $report->getMinutes() }}</td>
                                    {{-- <td>
                                        <a href="{{ route('question.edit', $report->id) }}" class="btn-lg text-dark">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <a href="{{ route('question.delete', $report->id) }}"
                                            class="btn-lg text-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ route('question.show', $report->id) }}"
                                            class="btn-lg text-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Data Table --}}


    </div>
</div>


<!-- Page level plugins -->
<script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>
{{-- <script src="{{asset('dashboard/js/demo/chart-bar-demo.js')}}"></script> --}}



<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
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
    var lables = {{ Js::from($keys) }};
    var values = {{ Js::from($values) }};
    var description = {{ Js::from($description) }};


    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lables,
            datasets: [{
                label: "Burn Calories",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: values,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'calory'
                    },
                    gridLines: {
                        display: true,
                        drawBorder: true
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 20,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10000,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value) + ' calories';
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
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + " cal";
                    }
                }
            },
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableData tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@endsection
