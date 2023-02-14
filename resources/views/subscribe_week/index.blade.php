@extends('layouts.layout')
@section('title')
    Subscribed Weeks
@endsection
@section('css')
    <style>
        html,
        body {
            transition: 0.11s ease-in-out;
            scroll-behavior: smooth;

        }

        @media(max-width:34em) {
            .main {
                min-width: 150px;
                width: auto;
            }
        }

        #customer_select {
            display: none !important;
        }

        .dropdown-select,
        #cat_select,
        #subcats_select,.select-box {
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40FFFFFF', endColorstr='#00FFFFFF', GradientType=0);
            background-color: #fff;
            border-radius: 6px;
            border: solid 1px #eee;
            box-shadow: 0px 2px 5px 0px rgba(155, 155, 155, 0.5);
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            float: left;
            font-size: 14px;
            font-weight: normal;
            height: 42px;
            line-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 30px;
            position: relative;
            text-align: left !important;
            transition: all 0.2s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            width: auto;

        }

        .dropdown-select:focus,
        #cat_select:focus,
        #subcats_select:focus,.select-box:focus {
            background-color: #fff;
        }

        .dropdown-select:hover,
        #cat_select:hover,
        #subcats_select:hover,.select-box:hover {
            background-color: #fff;
        }

        .dropdown-select:active,
        .dropdown-select.open {
            background-color: #fff !important;
            border-color: #bbb;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05) inset;
        }

        .dropdown-select:after,
        #cat_select:after,
        #subcats_select:after,.select-box:after {
            height: 0;
            width: 0;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 4px solid #777;
            -webkit-transform: origin(50% 20%);
            transform: origin(50% 20%);
            transition: all 0.125s ease-in-out;
            content: '';
            display: block;
            margin-top: -2px;
            pointer-events: none;
            position: absolute;
            right: 10px;
            top: 50%;
        }

        .dropdown-select.open:after {
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }

        .dropdown-select.open .list {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }

        .dropdown-select.open .option {
            cursor: pointer;
        }

        .dropdown-select.wide,
        #cat_select,
        #subcats_select ,
        .select-box {
            width: 100%;
        }

        .dropdown-select.wide .list {
            left: 0 !important;
            right: 0 !important;
        }

        .dropdown-select .list {
            box-sizing: border-box;
            transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
            -webkit-transform: scale(0.75);
            transform: scale(0.75);
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09);
            background-color: #fff;
            border-radius: 6px;
            margin-top: 4px;
            padding: 3px 0;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 999;
            max-height: 250px;
            overflow: auto;
            border: 1px solid #ddd;
        }

        .dropdown-select .list:hover .option:not(:hover) {
            background-color: transparent !important;
        }

        .dropdown-select .dd-search {
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0.5rem;
        }

        .dropdown-select .dd-searchbox {
            width: 90%;
            padding: 0.5rem;
            border: 1px solid #999;
            border-color: #999;
            border-radius: 4px;
            outline: none;
        }

        .dropdown-select .dd-searchbox:focus {
            border-color: #0038a1;
        }

        .dropdown-select .list ul {
            padding: 0;
        }

        .dropdown-select .option {
            cursor: default;
            font-weight: 400;
            line-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 29px;
            text-align: left;
            transition: all 0.2s;
            list-style: none;
        }

        .dropdown-select .option:hover,
        .dropdown-select .option:focus {
            background-color: #f6f6f6 !important;
        }

        .dropdown-select .option.selected {
            font-weight: 600;
            color: #0038a1;
        }

        .dropdown-select .option.selected:focus {
            background: #f6f6f6;
        }

        .dropdown-select a {
            color: #aaa;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        .dropdown-select a:hover {
            color: #666;
        }
    </style>

    {{-- Weeks Buttons Style --}}
    <style>
        .form-check-input {
        display: none;
        }
        .btn-group-container {
        border-radius: 6px;
        background: #f5fdff6e;
        box-shadow: inset 5px 5px 10px #c9c9c9, inset -5px -5px 10px #ffffff;
        }
        .btn-primary {
        background-color: rgba(0, 0, 0, 0);
        color: black;
        border: none;
        font-family: "Montserrat", sans-serif;
        padding: 10px 40px 10px 40px;
        }
        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show > .btn-primary.dropdown-toggle {
        border-radius: 6px;
        /* background: linear-gradient(30deg, #b0dfff, #ffffff62); */
        /* background: linear-gradient(30deg, #b0dfff, #ffffff62); */
        box-shadow: 5px 5px 10px #c9c9c9, -5px -5px 10px #ffffff;
        color: white;
        }

        .btn-primary:hover {
        border-radius: 6px;
        background: linear-gradient(90deg, #f2f2f2, #ededed);
        box-shadow: 5px 5px 10px #c9c9c9, -5px -5px 10px #ffffff;
        color: black;
        }

    </style>

    <style>

    </style>
    <!-- Custom styles for this page -->
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')
@section('head-title')
    Subscribed Weeks Control Panel
@endsection

<section class="filters my-3">

    <div class="row">

        <div class="col-lg-4 col-md-12" id="cat">
            <div class="form-group">
                <label>Category </label>
                <br>
                <select name="parent_id" id="cat_select" class="form-control select-box">
                    <option value="">Please Select Category</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 " id="training-section">
            <div class="form-group">
                <label>Training Sections </label>
                <br>
                <select name="parent_id" id="section_select" class="form-control select-box">
                    <option value="">Please Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-12" style="display: none;" id="subcat">
            <div class="form-group ">
                <label class="form-label">Sub Category</label>
                <br>
                <select name="category" id="subcats_select" class="form-control">

                </select>

            </div>
        </div>


        <div class="col-lg-4 col-md-12" id="customers">
            <div class="form-group">
                <label>Premium Customers </label>
                <select name="customer_id" id="customer_select" class="form-control">
                    <option value="">Please Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}
                            |
                            @if ($customer->subscription_type == 'year')
                                Year (<span class="font-weight-bold" style="font-weight: bolder !important">48</span>
                                weeks)
                            @elseif($customer->subscription_type == 'six_months')
                                Six Months (<span class="font-weight-bold"
                                    style="font-weight: bolder !important">24</span> weeks)
                            @elseif($customer->subscription_type == 'three_months')
                                Three Months (<span class="font-weight-bold"
                                    style="font-weight: bolder !important">12</span> weeks)
                            @elseif($customer->subscription_type == 'month')
                                Month (<span class="font-weight-bold" style="font-weight: bolder !important">4</span>
                                weeks)
                            @endif
                    @endforeach
                </select>
            </div>
        </div>

    </div>

</section>


<section class="data">
    <div class="row">
        <form  id="panel_form"  method="POST">
            @csrf
            <input type="hidden" name="customer_id" id="customer_input">
            <input type="hidden" name="category_id" id="category_input">
            <input type="hidden" name="section_id" id="section_input">
            <div class="col-lg-12">
                <div class="row">
                    {{-- Weeks Start --}}
                    <div class="col-lg-7  col-md-12" style="display: none;" id="weeks_col">
                        <div class="weeks" >

                            {{-- User Info --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="card-title d-inline" id="c_name">Ahmed Hassan</h4>
                                        <p class="card-text">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h6> Exercise Days : <span class="font-weight-bold text-primary" id="c_exe_days">5</span> times in week</h6>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6> Started At  : <span class="font-weight-bold text-success" id="c_sub_weeks_start">4</span> </h6>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6> Subscription  : <span class="font-weight-bold text-primary" id="c_sub_weeks">4</span> weeks</h6>
                                                </div>

                                                <div class="col-lg-6">
                                                    <h6> End At  : <span class="font-weight-bold text-danger" id="c_sub_weeks_end">4</span> </h6>
                                                </div>

                                                <div class="col-lg-6">
                                                    <h6> Total Workouts  : <span class="font-weight-bold text-info" id="c_sub_weeks_workouts">4</span> days</h6>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Weeks --}}
                            <div class="container mt-2 pt-5" >
                                <div class="btn-group-container d-inline-flex p-3" >
                                    <div class="m-auto row" data-toggle="buttons" id="weeks_div">

                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label active">
                                                <input class="form-check-input week-ele " type="radio" name="week" id="week-1"
                                                    autocomplete="off" checked>
                                                Week 1
                                            </label>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            {{-- Days --}}
                            <div class="container mt-2 pt-5">
                                <div class="btn-group-container d-inline-flex p-3">
                                    <div class="m-auto row" data-toggle="buttons">
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label active">
                                                <input class="form-check-input" type="radio" name="day" value="1" id="day-1"
                                                    autocomplete="off" checked>
                                                Day 1
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="2" id="day-2"
                                                    autocomplete="off"> Day 2
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="3" id="day-3"
                                                    autocomplete="off"> Day 3
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="4" id="day-4"
                                                    autocomplete="off"> Day 4
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="5" id="day-5"
                                                    autocomplete="off"> Day 5
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="6" id="day-6"
                                                    autocomplete="off"> Day 6
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-xs-6">
                                            <label class="btn btn-primary form-check-label">
                                                <input class="form-check-input" type="radio" name="day" value="7" id="day-7"
                                                    autocomplete="off"> Day 7
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <section class="container old_day_data mt-5" id="old_exe_section">
                                <div class="row section-row ">
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
                                </div>
                            </section>
                            <!-- Button trigger modal -->






                        </div>
                    </div>
                    {{-- Weeks End --}}

                    {{-- Exe Start --}}
                    <div class=" col-md-12 m-auto" id="exe_col">
                        <div class="exercies">
                            <div class="form-group text-left">
                                <label>Exercises</label>

                                {{-- Serach --}}
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-10 col-md-10">
                                                <div class="input-group mb-5">
                                                    <input type="text" class="input form-control" placeholder="Search" id="search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" disabled type="button" id="button-addon2">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 d-flex justify-content-start" style="height: 100%;">
                                                <input type="submit" id="sub-form" class="btn btn-dark" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Checkboxs List --}}
                                <div class="row" id="checkboxes2">
                                    @foreach ($exes as $ex)
                                        <div class="search-col col-md-6 col-xs-12 mb-1" cat_id={{$ex->category_id}}>
                                            <input type="checkbox"  id="{{ $ex->name }}" value="{{$ex->id}}" name="exercises[]">
                                            {{ $ex->name }}
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- Exe End --}}
                </div>
            </div>

        </form>
    </div>
</section>



{{-- Delete Modal --}}
    <div class="modal fade" id="deleteExeModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    Are You Sure You Want To Delete <span id="delete_exe_name"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete-modal-btn" section-id="" exe-id="">Delete</button>
            </div>
            </div>
        </div>
    </div>
{{-- Delete Modal --}}

@endsection


@section('js')
{{-- Premium Users Select Box --}}
<script>
    function create_custom_dropdowns() {
        $('#customer_select').each(function(i, select) {
            if (!$(this).next().hasClass('dropdown-select')) {
                $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') +
                    '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function(j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ?
                            'selected' : '') + '" data-value="' + $(o).val() +
                        '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });

        $('.dropdown-select ul').before(
            '<div class="dd-search"><input id="txtSearchValue" placeholder="Search" autocomplete="off" onkeyup="filter()" class="dd-searchbox form-control" type="text"></div>'
            );
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown-select', function(event) {
        if ($(event.target).hasClass('dd-searchbox')) {
            return;
        }
        $('.dropdown-select').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });

    // Close when clicking outside
    $(document).on('click', function(event) {
        if ($(event.target).closest('.dropdown-select').length === 0) {
            $('.dropdown-select').removeClass('open');
            $('.dropdown-select .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });

    function filter() {
        var valThis = $('#txtSearchValue').val();
        $('.dropdown-select ul > li').each(function() {
            var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
        });
    };
    // Search

    // Option click
    $(document).on('click', '.dropdown-select .option', function(event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown-select').find('.current').text(text);
        $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown-select', function(event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[
            0]);
        // Space or Enter
        //if (event.keyCode == 32 || event.keyCode == 13) {
        if (event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find(
                    '.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function() {
        create_custom_dropdowns();
    });
</script>




{{-- Exe Check Boxs Search --}}
<script>
    const search = document.getElementById("search");
    // console.log(search);
    const labels = document.querySelectorAll("#checkboxes2 > div.search-col");
    // console.log(labels[0].getAttribute('cat_id'));
    search.addEventListener("input", () => Array.from(labels).forEach((element) => element.style.display = element
        .childNodes[1].id.toLowerCase().includes(search.value.toLowerCase()) ? "inline" : "none"))
</script>



<script src="{{asset('dashboard/js/custom/sub-weeks.js')}}"></script>
@endsection
