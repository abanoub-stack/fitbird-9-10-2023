<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgressResource;
use App\Models\Customer;
use App\Models\Progress;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressController extends Controller
{
    //Web Functions
    public function index(Request $request)
    {
        // dd($request->all());
        if ($request->get('has_filter') == 1) {

            // if ($request->get('cal') != null)
            // {
            //     $calories = $request->cal;

            //     //Default
            //     $reports = Progress::orderBy('progress_date' , 'asc')->get();
            //     $now = Carbon::now()->setTimezone("GMT+2");
            //     $current_day =  $now->day;
            //     $current_week = $now->week;
            //     $current_month = $now->month;
            //     $current_year = $now->year;

            //     //Request Info
            //     $day = $request->day;
            //     $week = $request->week;
            //     $month = $request->month;

            //     //Without Time Filter
            //         $reports = Progress::orderBy('progress_date' , 'asc')->get();
            //         $users_array = [];
            //         $users = Progress::orderBy('workouts' , 'desc')->get();

            //         foreach($users as $user)
            //         {
            //             $user_report = Progress::where('customer_id', $user->customer_id)->sum('workouts');

            //             if($user_report >= $calories)
            //             {
            //                 $users_array[$user->user->name] = $user_report;
            //             }
            //         }


            //         arsort($users_array);
            //         $keys = array_keys($users_array);
            //         $values = array_values($users_array);

            //         $description = "Who lose more than <span class=\"font-weight-bolder text-info\">"
            //         .$calories ." </span> Calories.";




            //     //Month
            //     if ($request->month != null) {
            //         $reports = Progress::whereMonth('progress_date' , $request->month)->orderBy('progress_date' , 'asc')->get();

            //         $users_array = [];
            //         $users = Progress::orderBy('workouts' , 'desc')->
            //         whereMonth('progress_date' , $request->month)->get();
            //         // dd($users);

            //         // dd($users);
            //         foreach($users as $user)
            //         {
            //             $user_report = Progress::where('customer_id', $user->customer_id)
            //             ->whereMonth('progress_date' , $request->month)
            //             ->sum('workouts');

            //             if($user_report >= $calories)
            //             {
            //                 $users_array[$user->user->name] = $user_report;
            //             }
            //         }


            //         arsort($users_array);
            //         $keys = array_keys($users_array);
            //         $values = array_values($users_array);

            //         $monthNum  = $request->month;
            //         $dateObj   = DateTime::createFromFormat('!m', $monthNum);
            //         $monthName = $dateObj->format('F'); // Full Name

            //         $description = "Who lose more than <span class=\"font-weight-bolder text-info\">"
            //         .$calories
            //         ." </span> Calories in <span class=\"font-weight-bolder text-info\">"
            //         .$monthName
            //         ."</span>";
            //     }


            //     //Day
            //     if ($request->day != null) {

            //         $filter_string = "$request->day/$current_month/$current_year";
            //         $filter_date = Carbon::createFromFormat('d/m/Y', $filter_string)->format('Y-m-d');
            //         $reports = Progress::whereDate('progress_date' , $filter_date)->get();


            //         $users_array = [];
            //         $users = Progress::orderBy('workouts' , 'desc')->
            //         whereDate('progress_date' , $filter_date)->get();

            //         // dd($users);
            //         foreach($users as $user)
            //         {
            //             $user_report = Progress::where('customer_id', $user->customer_id)
            //             ->whereDate('progress_date' , $filter_date)
            //             ->sum('workouts');

            //             if($user_report >= $calories)
            //             {
            //                 $users_array[$user->user->name] = $user_report;
            //             }
            //         }


            //         arsort($users_array);
            //         $keys = array_keys($users_array);
            //         $values = array_values($users_array);

            //         $description = "Who lose more than <span class=\"font-weight-bolder text-info\">"
            //                         .$calories
            //                         ." </span> Calories in <span class=\"font-weight-bolder text-info\">"
            //                         .$filter_string
            //                         ."</span>";



            //     }
            // }

            // else
            // {

                
                //Default
                $reports = Progress::orderBy('progress_date' , 'asc')->get();
                $now = Carbon::now()->setTimezone("GMT+2");
                $current_day =  $now->day;
                $current_week = $now->week;
                $current_month = $now->month;
                $current_year = $now->year;

                //Request Info
                $day = $request->day;
                $week = $request->week;
                $month = $request->month;

                //Month
                if ($request->month != null) {
                    $reports = Progress::whereMonth('progress_date' , $request->month)->orderBy('progress_date' , 'asc')->get();

                    $users_array = [];
                    $users = Progress::orderBy('workouts' , 'desc')->
                    whereMonth('progress_date' , $request->month)->get();

                    foreach($users as $user)
                    {
                        $user_report = Progress::where('customer_id', $user->customer_id)
                        ->whereMonth('progress_date' , $request->month)
                        ->sum('workouts');

                            $users_array[$user->user->name] = $user_report;
                    }


                    arsort($users_array);
                    $keys = array_keys($users_array);
                    $values = array_values($users_array);

                    $monthNum  = $request->month;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // Full Name
                    $description = "Who do workouts in <span class=\"font-weight-bolder text-info\">" . $monthName ."</span>";
                }


                //Day
                if ($request->day != null) {

                    $filter_string = "$request->day/$current_month/$current_year";
                    $filter_date = Carbon::createFromFormat('d/m/Y', $filter_string)->format('Y-m-d');
                    $reports = Progress::whereDate('progress_date' , $filter_date)->get();


                    $users_array = [];
                    $users = Progress::orderBy('workouts' , 'desc')->
                    whereDate('progress_date' , $filter_date)->get();

                    foreach($users as $user)
                    {
                        $user_report = Progress::where('customer_id', $user->customer_id)
                        ->whereDate('progress_date' , $filter_date)
                        ->sum('workouts');


                            $users_array[$user->user->name] = $user_report;
                    }


                    arsort($users_array);
                    $keys = array_keys($users_array);
                    $values = array_values($users_array);

                    $description = "Who do workouts in <span class=\"font-weight-bolder text-info\">" . $filter_string  ."</span>";



                }
            // }

            // if($request->cal == null) $calories = 0;
            if($request->cal == null && $request->day == null && $request->month == null)
                return back();

            return view('progress.index', compact('reports','day','month' , 'keys' , 'values'  , 'description'))->with(['success' => 'Filter Applied']);

        }


        //Current Week
        $now = Carbon::now()->setTimezone('GMT+2');
        $users_array = [];
        $users = Progress::orderBy('workouts' , 'desc')
                ->whereBetween('progress_date',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                )->get();
        foreach($users as $user)
        {
            $user_report = Progress::where('customer_id', $user->customer_id)->sum('workouts');
            if($user_report > 20)
            {
                $users_array[$user->user->name] = $user_report;
            }
        }
        //Sort Array
        arsort($users_array);
        $keys = array_keys($users_array);
        $values = array_values($users_array);
        $description = "Who do more than 20 workout in current week " ;



        $reports = Progress::orderBy('progress_date' , 'asc')->get();
        return view('progress.index', compact('reports' , 'keys' , 'values' , 'description'));
    }





    //API Functions
    public function save(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $validator = Validator::make($request->all(),
        [
            // 'customer_id' => 'required|exists:customers,id',
            'workouts' => 'required|integer',
            'seconds' => 'required|integer',
            'workouts' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()],400);
        }


        // if($user->id != $request->customer_id )
        //     return response()->json(['success' => false, 'message' =>"this users can not add or edit this records"],401);




        //Create Progress
        $input = $request->all();
        $input['progress_date'] = now();
        $input['customer_id'] = $user->id;


        //Check Old Recoreds
        $old_progress = Progress::whereDate('progress_date' , Carbon::today())->where('customer_id' , $user->id)->first();

        // dd($old_progress);


        if ($old_progress) {
            //Update progress
            $old_progress->update($input);
            return response()->json(['success' => true, 'message' => "Progress Updated"],200);
        }


        $progress =  Progress::create($input);



        return response()->json(
            [
                'success' => true,
                'message' => "Progress Submitted",
                'prgoress' => $progress
            ] , 200);



    }


    public function getByDate(Request $request)
    {

        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $validator = Validator::make($request->all(),
        [
            'day' => 'required|integer|min:1|max:31',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()],400);
        }

        $now = Carbon::now();
        $required_day = $request->day;
        $current_month = $now->month;
        $current_year = $now->year;
        $progress_string = "$required_day/$current_month/$current_year";
        $progress_date = Carbon::createFromFormat('d/m/Y', $progress_string)->format('Y-m-d');

        //Get Old Recoreds
        $old_progress = Progress::whereDate('progress_date' , $progress_date)->where('customer_id' , $user->id)->first();

        $response = new  ProgressResource($old_progress);

        // dd($old_progress);


        if ($old_progress) {
            //Update progress
            return response()->json(['success' => true, 'data' =>$response  , 'message' => "Progress Sent"  ],200);
        }



        return response()->json(['success' => true , 'message' => "No Progress Found"  ],404);



    }



    public function getByFullDate(Request $request)
    {

        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $validator = Validator::make($request->all(),
        [
            'day' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1900|max:2100',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()],400);
        }

        $now = Carbon::now();
        $required_day = $request->day;
        $required_month = $request->month;
        $required_year = $request->year;
        $progress_string = "$required_day/$required_month/$required_year";
        $progress_date = Carbon::createFromFormat('d/m/Y', $progress_string)->format('Y-m-d');

        //Get Old Recoreds
        $old_progress = Progress::whereDate('progress_date' , $progress_date)->where('customer_id' , $user->id)->first();

        $response = new  ProgressResource($old_progress);

        // dd($old_progress);


        if ($old_progress) {
            //Update progress
            return response()->json(['success' => true, 'data' =>$response  , 'message' => "Progress Sent"  ],200);
        }



        return response()->json(['success' => true , 'message' => "No Progress Found"  ],404);



    }



}
