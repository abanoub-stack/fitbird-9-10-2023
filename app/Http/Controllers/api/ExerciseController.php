<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResourse;
use App\Models\Customer;
use App\Models\CustomerNotification;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function allExercises(Request $request)
    {
        $exercises = Exercise::orderBy('id', 'desc')->get();
        CustomerNotification::create([
            'user' => Customer::where('access_token', '=', $request->header('access_token'))->first()->email,
            'message' => __('visited exercises'),
        ]);
        return response()->json([
            'exercises' => ExerciseResourse::collection($exercises),
        ]);
    }
}
