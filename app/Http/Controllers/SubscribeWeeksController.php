<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ExerciseResourse;
use App\Models\Category;
use App\Models\Customer;
use App\Models\DayLayout;
use App\Models\Exercise;
use App\Models\TrainingSection;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr;

class SubscribeWeeksController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('name' , 'asc')->get();
        $customers = Customer::select('id' , 'name'  , 'email', 'subscription_type')->where('is_subscribed' , 1)->orderBy('name' , 'asc')->get();
        $exes = Exercise::orderBy('name' , 'asc')->with('Category')->get();
        $sections = TrainingSection::orderBy('name' , 'asc')->get();
        $layouts = DayLayout::orderBy('name' , 'asc')->get();
        return view('subscribe_week.index' , compact('cats' , 'customers' , 'exes' , 'sections' , 'layouts'));
    }

    public function save(Request $request)
    {
        if($request->ajax())
        {
            // dd($request->all());
            $validator = Validator::make($request->all(),
                [
                    'customer_id' => 'required|numeric|exists:customers,id',
                    'category_id' => 'required|numeric|exists:categories,id',
                    'section_id' => 'required|numeric|exists:training_sections,id',
                    'week' => 'required|numeric|min:1|max:48',
                    'day' => 'required|numeric|min:1|max:7',
                    "exercises"    => "required|array",
                    "exercises.*"  => "required|exists:exercises,id",
                ] ,
                [
                    'customer_id' => "Please Select Customer ",
                    'category_id' => "Please Select Category ",
                    'section_id' => "Please Select Traing Section ",
                    'week' => "Please Select Week",
                    'day' => "Please Select Day",
                    "exercises"    => "Please Select Some exercises",
                ]
        );

            if ($validator->fails())
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()->first(),
                    ]);
            }

            $week = $request->week;
            $day = $request->day;
            $exercises = $request->exercises;
            $customer = Customer::find($request->customer_id);
            $category = Category::find($request->category_id);
            $section = TrainingSection::find($request->section_id);

            $data = $customer->subscribeWeeks()->first();

            if($data != null)
            {
                $weeks = json_decode($data->data , true); //Total Old Data


                // Update Category_id
                $weeks[$week][$day]['category_id'] = $category->id;



            //Section Exist before
            if(isset($weeks[$week][$day]['exe_array'][$section->id]))
                {
                    $old_exe = array_keys($weeks[$week][$day]['exe_array'][$section->id]); //Old Exe IDS
                    //Check Identical

                    for($i=0 ; $i< count($exercises) ; $i++)
                    {
                        if(!in_array($exercises[$i], $old_exe))
                        {
                            // $ex = Exercise::find($exercises[$i]);
                            $weeks[$week][$day]['exe_array'][$section->id][$exercises[$i]] =  false;
                        }
                    }


                }
            //New Section
            else
                {
                    //Set Complete False
                    $weeks[$week][$day]['is_completed']=false;
                    //Create array of new exe
                    $new_array = [];
                    for($i=0 ; $i< count($exercises) ; $i++)
                    {
                        $new_array[$exercises[$i]] = false;
                    }

                    //Update
                    $weeks[$week][$day]['exe_array'][$section->id] = $new_array;

                }


                $customer->subscribeWeeks()->update(['data' => json_encode($weeks)]);



                return response()->json(
                    [
                        'success' => true,
                        'message' => "Exercises Assigned Successfully."
                    ]);
            }
        }
    }

    public function getExeByCategory($id , Request $request)
    {
        if($request->ajax())
        {
            $exes = Exercise::select('id' , 'name')->where('category_id', $id)->get();

            if($exes->count() > 0)
            {
                return
                [
                    'success' =>true,
                    'data' =>$exes
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }


    public function getCustomerInfo($id , Request $request)
    {
        if($request->ajax())
        {
            $customer = Customer::
                        select('id' , 'name' , 'exercise_days' , 'subscription_type' , 'subscription_started_at' , 'subscription_finished_at')
                        ->where('id', $id)
                        ->with('subscribeWeeks')
                        ->first();


            //Handle Dates
            $s_date = explode( '-' ,$customer->subscription_started_at);
            $s_date[2] = explode( " " ,$s_date[2])[0];

            $f_date = explode( '-' ,$customer->subscription_finished_at);
            $f_date[2] = explode( " " ,$s_date[2])[0];

            $subscription_started_at = Carbon::createFromFormat('Y/m/d', $s_date[0]."/".$s_date[1]."/".$s_date[2])->format('Y d M');
            $subscription_finished_at = Carbon::createFromFormat('Y/m/d', $f_date[0]."/".$f_date[1]."/".$f_date[2])->format('Y d M');
            $customer->subscription_started_at = $subscription_started_at;
            $customer->subscription_finished_at = $subscription_finished_at;
            //Handle Dates

            //Add Customer Workouts (number of weeks * exedays)

            if($customer != null)
            {
                return
                [
                    'success' =>true,
                    'data' =>$customer
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }


    public function getEXEInfo($id , Request $request)
    {
        if($request->ajax())
        {

            $exe= Exercise::find($id);
            if($exe != null)
            {
                return
                [
                    'success' =>true,
                    'data' =>$exe
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }

    public function deleteEXEbyDay(Request $request)
    {

        $validator = Validator::make($request->all(),
            [

                'customer_id' => 'required|numeric|exists:customers,id',
                'section_id' => 'required|numeric|exists:training_sections,id',
                'week' => 'required|numeric|min:1|max:48',
                'day' => 'required|numeric|min:1|max:7',
                "exercise_id"    => "required",

            ] ,
            [
                'customer_id' => "Please Select Customer ",
                'section_id' => "Please Select Traing Section ",
                'week' => "Please Select Week",
                'day' => "Please Select Day",
                "exercise_id"    => "Please Select exercise",
            ]

        );


         if($validator->fails())
         {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
         }


         $week = $request->week;
         $day = $request->day;
         $section_id = $request->section_id;
         $exercise_id = $request->exercise_id;
         $customer = Customer::find($request->customer_id);
         $weeks = $customer->subscribeWeeks()->first();
         $data = json_decode($weeks->data , true);

         //Start The Functionality
         try
         {
            $exe_arr = $data[$week][$day]['exe_array'][$section_id];
            foreach ($exe_arr as $exe_id => $is_completed) {
                   if($exe_id == $exercise_id)
                   {
                       unset($exe_arr[$exe_id]);
                   }
            }


            $new_data = $data; //intailize with old data


            //If the exe array has been empty, then delete the exe_section from the array
            if(count($exe_arr) == 0)
                {
                    $sections = $data[$week][$day]['exe_array'];
                    // dd($sections);
                    foreach ($sections as $sec_id => $exe_arrays) {
                           if($sec_id == $section_id)
                           {
                               unset($sections[$section_id]);
                           }
                    }

                    $new_data[$week][$day]['exe_array'] = $sections;

                }
            else
                {

                    $new_data[$week][$day]['exe_array'][$section_id] = $exe_arr;
                }



            //Do Update on DB
            $update = $customer->subscribeWeeks()->update(['data' =>json_encode($new_data)]);
                if($update)
                    {
                        return response()->json([
                            'success' =>true,
                            'message' =>"Delete Done",
                        ] , 200);
                    }
                else
                    {
                        return response()->json([
                            'success' =>false,
                            'message' =>"Delete Failed",
                        ] , 500);
                    }
         }
         catch(Exception $e)
         {
            return response()->json([
                'success' =>false,
                'message' =>"Delete fails " . $e->getMessage(),
            ] , 500);
         }




    }


    public function saveLayout(Request $request)
    {

        $validator = Validator::make($request->all(),
            [

                'customer_id' => 'required|numeric|exists:customers,id',
                'week' => 'required|numeric|min:1|max:48',
                'day' => 'required|numeric|min:1|max:7',
                'name' => 'required|string',
            ] ,
            [
                'customer_id' => "Please Select Customer ",
                'week' => "Please Select Week",
                'day' => "Please Select Day",
            ]

        );


         if($validator->fails())
         {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
         }


         $week = $request->week;
         $day = $request->day;
         $customer = Customer::find($request->customer_id);
         $weeks = $customer->subscribeWeeks()->first();
         $data = json_decode($weeks->data , true);

         //Start The Functionality
         try
         {
            $layout_data = $data[$week][$day];

            //Return Completed Data to Fasle Before Save The Layout
                $layout_data['is_completed'] = false;
                $exe_array = $layout_data['exe_array'];
                foreach($exe_array as $section_id => $section_data_array)
                {
                    foreach($section_data_array as $exe_id => $value)
                    {
                        $exe_array[$section_id][$exe_id] = false;
                    }
                }
                $layout_data['is_completed'] = false;
                $layout_data['exe_array'] = $exe_array;
            //Return Completed Data to Fasle Before Save The Layout

            //Create Layout
            $layout = DayLayout::create([
                'name' => $request->name . ' - '. now()->format('Y-m-d'),
                'data' => json_encode($layout_data),
            ]);

            if($layout)
            {
                return response()->json(
                    [
                        'success' => true,
                        'message' => "Layout Created Successfully",
                        'layout' =>
                            [
                                'name' => $layout->name,
                                'data' => json_decode($layout->data),
                            ]
                    ]);
            }

         }
         catch(Exception $e)
         {
            return response()->json([
                'success' =>false,
                'message' =>"Save fails " . $e->getMessage(),
            ] , 500);
         }




    }


    public function saveLayoutForCustomer(Request $request)
    {
        if($request->ajax())
        {
            $validator = Validator::make($request->all(),
                [
                    'customer_id' => 'required|numeric|exists:customers,id',
                    'layout_id' => 'required|numeric|exists:day_layouts,id',
                    'week' => 'required|numeric|min:1|max:48',
                    'day' => 'required|numeric|min:1|max:7',
                ] ,
                [
                    'customer_id' => "Please Select Customer ",
                    'layout_id' => "Please Select Traing Layout ",
                    'week' => "Please Select Week",
                    'day' => "Please Select Day",
                ]
        );

            if ($validator->fails())
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()->first(),
                    ]);
            }

            $week = $request->week;
            $day = $request->day;
            $customer = Customer::find($request->customer_id);
            $layout   = DayLayout::find($request->layout_id);
            $layout_data = json_decode($layout->data , true);
            $data = $customer->subscribeWeeks()->first();


            if($data != null)
            {
                $weeks = json_decode($data->data , true); //Total Old Data

                // dd($weeks[$week][$day] , $layout_data);
                // Update Category_id
                $weeks[$week][$day]['category_id'] = $layout_data['category_id'];


                //Assign Each Section with its exes
                foreach($layout_data['exe_array'] as $section_id => $section_data)
                {
                    $exercises = array_keys($section_data); //exe IDS

                    //Section Exist before
                    if(isset($weeks[$week][$day]['exe_array'][$section_id]))
                    {
                            $old_exe = array_keys($weeks[$week][$day]['exe_array'][$section_id]); //Old Exe IDS
                            //Check Identical
                            for($i=0 ; $i< count($exercises) ; $i++)
                            {
                                if(!in_array($exercises[$i], $old_exe))
                                {
                                    $weeks[$week][$day]['exe_array'][$section_id][$exercises[$i]] =  false;
                                }
                            }


                    }
                    //New Section
                    else
                    {
                        //Set Complete False
                        $weeks[$week][$day]['is_completed']=false;
                        //Create array of new exe
                        $new_array = [];
                        for($i=0 ; $i< count($exercises) ; $i++)
                        {
                            $new_array[$exercises[$i]] = false;
                        }

                        //Update
                        $weeks[$week][$day]['exe_array'][$section_id] = $new_array;
                    }
                }

                $customer->subscribeWeeks()->update(['data' => json_encode($weeks)]);
            return response()->json(
                [
                    'success' => true,
                    'message' => "Exercises Assigned Successfully."
                ]);
            }
        }
    }


    public function Dashboard_getByWeekDay(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7',
            'customer_id' => 'required|exists:customers,id',
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;
        $day = $request->day;

        $user = Customer::where('id', '=', $request->customer_id)->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_day = $weeks[$week][$day];
            $category = Category::find($requested_day['category_id']);
            $array = [];
            foreach($requested_day['exe_array'] as $key => $value )
            {
                    $section = TrainingSection::find($key);
                    $exersices = Exercise::whereIn('id' , array_keys($value) )->get();
                    $array []=
                            [
                            'section_name' => $section->name,
                            'section_id' => $section->id,
                            'exe_list' => $exersices,
                            ] ;
            }

            // $exes = Exercise::whereIn('id' , array_keys($requested_day['exe_array']))->get();
            // $exe = new ExerciseResourse($exes);

            return response()->json(
                [
                    'success' => true,
                    'category'=> isset($category)? $category : null,
                    'exersices' =>$array,
                    'is_completed' => $requested_day['is_completed'],
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }


    public function dayCharts(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7',
            'customer_id' => 'required|exists:customers,id',
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;
        $day = $request->day;

        $user = Customer::where('id', '=', $request->customer_id)->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_day = $weeks[$week][$day];
            $requested_week = $weeks[$week];

            //PIE CHART FUNCTIONALITY
            $pie_completed_counter = 0;
            $pie_not_completed_counter = 0;



            foreach($requested_day['exe_array'] as $key => $value )
            {
                foreach($value as  $exe_id => $exe_status)
                {
                    $exe_status? $pie_completed_counter++ : $pie_not_completed_counter++ ;
                }
            }

            //Area Chart Func
            $area_data = [];
            foreach($requested_week as $day => $day_array )
            {
                $area_completed_counter = 0;
                $area_not_completed_counter = 0;
                foreach($day_array['exe_array'] as $section_id => $exe_array )
                {
                    foreach($exe_array as  $exe_id => $exe_status)
                    {
                        $exe_status? $area_completed_counter++ : $area_not_completed_counter++ ;
                    }
                }
                $area_data['day ' . $day ] = $area_completed_counter;
            }
            return response()->json(
                [
                    'success' => true,
                    'pie_lables' => ['Completed' , 'Not Completed',],
                    'pie_values' => [$pie_completed_counter , $pie_not_completed_counter],
                    'area_lables' => array_keys($area_data),
                    'area_values' => array_values($area_data),

                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => false,
                    'pie_lables' => [],
                    'pie_values' => [],
                    'area_lables' => [],
                    'area_values' => [],
                ]);
        }


    }

    public function dayReport(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7',
            'customer_id' => 'required|exists:customers,id',
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;
        $day = $request->day;
        $user = Customer::where('id', '=', $request->customer_id)->first();
        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_day = $weeks[$week][$day];
            $category = Category::find($requested_day['category_id']);
            $array = [];
            foreach($requested_day['exe_array'] as $key => $value )
            {
                    $section = TrainingSection::find($key);

                    $exersices = Exercise::whereIn('id' , array_keys($value) )->get();
                    foreach($exersices as $exe)
                    {
                        $exe->is_completed = $value[$exe->id];
                    }
                    $array []=
                            [
                            'section_name' => $section->name,
                            'section_id' => $section->id,
                            'exe_list' => $exersices,
                            ] ;
            }

            // $exes = Exercise::whereIn('id' , array_keys($requested_day['exe_array']))->get();
            // $exe = new ExerciseResourse($exes);

            return response()->json(
                [
                    'success' => true,
                    'category'=> isset($category)? $category : null,
                    'exersices' =>$array,
                    'is_completed' => $requested_day['is_completed'],
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }




    public function Dashboard_getWeekData(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',

        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;

        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_week = $weeks[$week];
            $cat_array = [];

            foreach($requested_week as $key => $value)
            {


                if($value['category_id'] != null)
                    {


                        foreach ($value['exe_array'] as $section_id => $exes) {
                            $exe_ids = array_keys($exes);
                            $total_time = Exercise::whereIn('id', $exe_ids )->sum('timee');
                        }


                        $cat_array [] =
                                [
                                        'day' => $key,
                                        'category' => Category::select('id' , 'name' , 'icon')
                                            ->where('id',$value['category_id'])->first(),
                                        'time_seconds' =>  $total_time ,

                                ];
                    }

            }



            return response()->json(
                [
                    'success' => true,
                    'categories'=> $cat_array,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }

    public function Dashboard_getCustomerWorkoutsDetails(Request $request)
    {
        $customer = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $weeks_number = 0;
        if ($customer->subscription_type =="month") {
            $weeks_number = 4;
        }


        elseif ($customer->subscription_type == "three_months") {
            $weeks_number = 12;
        }


        elseif ($customer->subscription_type == "six_months") {
            $weeks_number = 24;
        }

        elseif ($customer->subscription_type == "year") {
            $weeks_number = 48;
        }
        try
        {
        $total_workouts = (int)$customer->exercise_days * $weeks_number;
        }
        catch(Exception $e)
        {
            return response()->json([
                'error' => 'error '. $e->getMessage(),
            ] , 400);
        }


        $customer_weeks = json_decode($customer->subscribeWeeks()->first()->data , true);

        $complete_counter = 0;
        foreach ($customer_weeks as $weeks => $week) {
            foreach ($week as $day => $data) {
                //If The Day is Completed then increment the complete counter
                if($data['is_completed']) $complete_counter++  ;
                // $c_array [] = $data['is_completed'];
            }
        }


        return response()->json(
            [
                'success' => true,
                'sub_type' => $customer->subscription_type,
                'sub_weeks' => $weeks_number,
                'exercise_days' => $customer->exercise_days,
                'total_workouts' => $total_workouts,
                'completed_workouts' =>$complete_counter ,
            ]
        );

    }



    //API functions
    public function getByToken(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $data = $user->subscribeWeeks()->first();
        if($data != null)
        {
            $weeks = json_decode($data->data);
            return response()->json(
                [
                    'success' => true,
                    'data' => $weeks,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }


    public function getByWeekDay(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7'
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;
        $day = $request->day;

        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_day = $weeks[$week][$day];
            $category = Category::find($requested_day['category_id']);
            $category = new CategoryResource($category);

            $array = [];
            foreach($requested_day['exe_array'] as $key => $value )
            {
                // dd($value);
                    $section = TrainingSection::find($key);
                    $exersices = Exercise::whereIn('id' , array_keys($value) )->get();
                    foreach($exersices as $ex)
                    {
                        $ex->is_completed = $value[$ex->id];
                    }
                    $array []=   [
                            'section_name' => $section->name,
                            'section_id' => $section->id,
                            'exe_list' => $exersices,
                            ] ;
            }

            // $exes = Exercise::whereIn('id' , array_keys($requested_day['exe_array']))->get();
            // $exe = new ExerciseResourse($exes);

            return response()->json(
                [
                    'success' => true,
                    // 'category'=> $category,
                    'exersices' =>$array,
                    'is_completed' => $requested_day['is_completed'],
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }


    public function getWeekData(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',

        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;

        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $requested_week = $weeks[$week];
            $cat_array = [];

            foreach($requested_week as $key => $value)
            {


                if($value['category_id'] != null)
                    {


                        foreach ($value['exe_array'] as $section_id => $exes) {
                            $exe_ids = array_keys($exes);
                            $total_time = Exercise::whereIn('id', $exe_ids )->sum('timee');
                        }


                        $cat_array [] =
                                [
                                        'day' => $key,
                                        'category' => Category::select('id' , 'name' , 'icon')
                                            ->where('id',$value['category_id'])->first(),
                                        'time_seconds' =>  $total_time ,

                                ];
                    }

            }



            return response()->json(
                [
                    'success' => true,
                    'categories'=> $cat_array,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }

    public function getCustomerWorkoutsDetails(Request $request)
    {
        $customer = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $weeks_number = 0;
        if ($customer->subscription_type =="month") {
            $weeks_number = 4;
        }


        elseif ($customer->subscription_type == "three_months") {
            $weeks_number = 12;
        }


        elseif ($customer->subscription_type == "six_months") {
            $weeks_number = 24;
        }

        elseif ($customer->subscription_type == "year") {
            $weeks_number = 48;
        }
        try
        {
        $total_workouts = (int)$customer->exercise_days * $weeks_number;
        }
        catch(Exception $e)
        {
            return response()->json([
                'error' => 'error '. $e->getMessage(),
            ] , 400);
        }


        $customer_weeks = json_decode($customer->subscribeWeeks()->first()->data , true);

        $complete_counter = 0;
        foreach ($customer_weeks as $weeks => $week) {
            foreach ($week as $day => $data) {
                //If The Day is Completed then increment the complete counter
                if($data['is_completed']) $complete_counter++  ;
                // $c_array [] = $data['is_completed'];
            }
        }


        return response()->json(
            [
                'success' => true,
                'sub_type' => $customer->subscription_type,
                'sub_weeks' => $weeks_number,
                'sub_weeks_started_at' => $customer->subscription_started_at,
                'sub_weeks_finished_at' => $customer->subscription_finished_at,
                'exercise_days' => $customer->exercise_days,
                'total_workouts' => $total_workouts,
                'completed_workouts' =>$complete_counter ,
            ]
        );




    }


    public function getNumberOfSubWeeks(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $data = $user->subscribeWeeks()->first();
        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $weeks_number = count($weeks);
            return response()->json(
                [
                    'success' => true,
                    'number_of_weeks' => $weeks_number,
                ]);
            }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }



    public function CompleteDay(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7'
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }
        $week = $request->week;
        $day = $request->day;
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $weeks[$week][$day]['is_completed'] = true;
            $user->subscribeWeeks()->update(['data' => json_encode($weeks)]);
            // dd(json_decode($user->subscribeWeeks()->first()->data));
            return response()->json(
                [
                    'success' => true,
                    'message' => "Day Updated Successfully",
                    'data' => $weeks[$week][$day],
                ]);
        }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }


    public function CompleteEXE(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'week' => 'required|numeric|min:1|max:48',
            'day' => 'required|numeric|min:1|max:7',
            'section_id' => 'required|exists:training_sections,id',
            'exe_id' => 'required|exists:exercises,id',
        ]);

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ]);
        }

        $week = $request->week;
        $day = $request->day;
        $section_id = $request->section_id;
        $exe_id = $request->exe_id;


        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $data = $user->subscribeWeeks()->first();

        if($data != null)
        {
            $weeks = json_decode($data->data , true);
            $exe_of_the_day = $weeks[$week][$day]['exe_array'];
            $sections_ids = array_keys($exe_of_the_day);

            if(!in_array($section_id , $sections_ids))
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "This Section ID dosen't exist in this day",
                    ] , 400
                );
            }

            $exe_ids = array_keys($exe_of_the_day[$section_id]);


            if(!in_array($exe_id , $exe_ids))
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "This Excersice ID dosen't exist in this section of this day",
                    ] , 400
                );
            }

            //Complete The Exe
            $exe_of_the_day[$section_id][$exe_id] = true;
            $weeks[$week][$day]['exe_array'] = $exe_of_the_day;

            //Check if all the day completed
            $flag = 0;
            foreach ($exe_of_the_day as $sec_id => $exe_arr) {
                if($flag == 1) break;
                foreach ($exe_arr as $excer_id => $status) {
                    if(!$status)
                    {
                        $weeks[$week][$day]['is_completed']=false;
                        $flag = 1;
                        break;
                    }
                    else
                    {
                        $weeks[$week][$day]['is_completed']=true;
                    }
                }
            }


            $user->subscribeWeeks()->update(['data' => json_encode($weeks)]);
            // dd(json_decode($user->subscribeWeeks()->first()->data));
            return response()->json(
                [
                    'success' => true,
                    'message' => "Day Updated Successfully",
                    'data' => $weeks[$week][$day],
                ]);
        }
        else
        {
            return response()->json(
                [
                    'success' => true,
                    'data' => "No Data for this user",
                ]);
        }


    }






}
