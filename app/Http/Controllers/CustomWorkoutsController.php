<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomWorkoutsCollection;
use App\Http\Resources\CustomWorkoutsResource;
use App\Models\Customer;
use App\Models\CustomWorkouts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomWorkoutsController extends Controller
{
    public function save(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'name' => 'required|string',
            'interval_time' => 'required|integer',
            'repeat_count' => 'required|integer',
            'exercises' => 'required|json',
            'exercises.*' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ] , 400);
        }

        $customer = Customer::where('access_token' , $request->header('access-token'))->first();

        try
        {
            $custom_workout = CustomWorkouts::create([
                'user_id' => $customer->id,
                'name' => $request->name,
                'interval_time' => $request->interval_time,
                'repeat_count' => $request->repeat_count,
                'exercises' => $request->exercises,
            ]);

            return response()->json(
                [
                'success' => true ,
                'message' => "Custome Workout Created Successfully." ,
                'custom_workout' => $custom_workout ,
                ]);
        }
        catch(Exception $e)
        {
            return response()->json(
            [
                'success' => false,
                'message' => $e->getMessage(),
            ] , 500);
        }
    }


    public function getCustomWorkouts(Request $request)
    {
        $customer = Customer::where('access_token' , $request->header('access-token'))->first();
        $custom_workouts= $customer->customeWorkouts()->get();
        $custom_workouts = new CustomWorkoutsCollection($custom_workouts);
        return response()->json([
            'success' => true ,
            'message' => "Workouts Sent Successfully." ,
            'data' => $custom_workouts ,
        ]);
    }

    public function getCustomWorkoutsDetails(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'id' => 'required|exists:custom_workouts,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ] , 400);
        }

        $custom_workout =  CustomWorkouts::find($request->id);

        $customer = Customer::where('access_token' , $request->header('access-token'))->first(); //Auth One
        $workout_owner = Customer::find($custom_workout->user_id);
        if ($customer->id != $workout_owner->id) {
            return response()->json([
                'success' => false ,
                'message' => "unAuthorized Data Request." ,
            ] , 401);
        }

        $custom_workout = new CustomWorkoutsResource($custom_workout);
        return response()->json([
            'success' => true ,
            'message' => "Workout Sent Successfully." ,
            'data' => $custom_workout ,
        ]);
    }

    public function deleteCustomWorkoutsDetails(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'id' => 'required|exists:custom_workouts,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ] , 400);
        }

        $custom_workout =  CustomWorkouts::find($request->id);

        $customer = Customer::where('access_token' , $request->header('access-token'))->first(); //Auth One
        $workout_owner = Customer::find($custom_workout->user_id);
        if ($customer->id != $workout_owner->id) {
            return response()->json([
                'success' => false ,
                'message' => "unAuthorized Data Request." ,
            ] , 401);
        }

        $custom_workout->delete();

        return response()->json([
            'success' => true ,
            'message' => "Workout Deleted Successfully." ,
        ]);
    }

}
