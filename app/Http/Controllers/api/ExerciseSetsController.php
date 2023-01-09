<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseSetResource;
use App\Models\Customer;
use App\Models\CustomerNotification;
use App\Models\ExerciseSet;
use Illuminate\Http\Request;

class ExerciseSetsController extends Controller
{
    public function allSets(Request $request)
    {
        $sets = ExerciseSet::orderBy('id', 'desc')->get();
        CustomerNotification::create([
            'user' => Customer::where('access_token', '=', $request->header('access_token'))->first()->email,
            'message' => __('visited exercises sets'),
        ]);
        return response()->json([
            'exercise_sets' => ExerciseSetResource::collection($sets),
        ]);
    }
}
