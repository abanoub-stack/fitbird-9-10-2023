<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResourse;
use App\Http\Resources\SetsCategoryResource;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\ExerciseSet;
use Illuminate\Http\Request;

class ExerciseSetController extends Controller
{
    public function get_exercise(Request $request)
    {
        if ($request->has('set_id')) {
            $set = ExerciseSet::find($request->set_id);
            if (!$set) {
                return response()->json([
                    'success' => '1',
                    'exercise' => [],
                ]);
            } else {
                // $exercise = Exercise::where('id', '=', $set->exercise_id)->first();
                return response()->json([
                    'success' => '1',
                    'exercise' => [
                        new ExerciseResourse($set->Exercise),
                    ],
                ]);
            }

        } else {
            $exxs = Exercise::all();
            return response()->json([
                'success' => '1',
                'exercise' => ExerciseResourse::collection($exxs),
            ]);
        }
    }

    public function get_set_by_category(Request $request)
    {

        $cats = Category::all();
        return response()->json([
            'success' => '1',
            'exercise' => SetsCategoryResource::collection($cats),
        ]);
        // id
        // name
        // image
        // total_exercise
        // time
        // calories
        // level
        // description
    }

}
