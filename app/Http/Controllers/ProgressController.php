<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgressResource;
use App\Models\Customer;
use App\Models\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressController extends Controller
{

    //API Functions
    public function save(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $validator = Validator::make($request->all(),
        [
            // 'customer_id' => 'required|exists:customers,id',
            'workouts' => 'required|integer',
            'seconds' => 'required|integer',
            'calories' => 'required|numeric',
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



}
