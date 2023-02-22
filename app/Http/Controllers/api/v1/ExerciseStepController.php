<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseStepResource;
use App\Models\Exercise;
use App\Models\ExerciseStep;
use App\Models\FreeExercise;
use App\Models\FreeExerciseStep;
use Illuminate\Http\Request;

class ExerciseStepController extends Controller
{
    public function get_exercise_step_list(Request $request)
    {
        if ($request->has('ex_id')) {
            $exercise = Exercise::find($request->ex_id);
            if (!$exercise) {
                return response()->json([
                    'success' => '0',
                    'error' => __('Step Not Found'),
                    'exercise' => [],
                ]);
            } else {
                $steps = ExerciseStep::where('exercise_id', '=', $request->ex_id)->get();
                return response()->json([
                    'success' => '1',
                    'exercise' => [
                        'url' => $exercise->url,
                        'step' => ExerciseStepResource::collection($steps),
                    ],
                ]);
            }
        } else {
            return response()->json([
                'success' => '0',
                'exercise' => 'enter your data perfectly',
            ]);

        }
    }

    public function get_free_exercise_step_list(Request $request)
    {
        if ($request->has('ex_id')) {
            $exercise = FreeExercise::find($request->ex_id);
            if (!$exercise) {
                return response()->json([
                    'success' => '0',
                    'error' => __('Step Not Found'),
                    'exercise' => [],
                ]);
            } else {
                $steps = FreeExerciseStep::where('free_exercise_id', '=', $request->ex_id)->get();
                return response()->json([
                    'success' => '1',
                    'exercise' => [
                        'url' => $exercise->url,
                        'step' => ExerciseStepResource::collection($steps),
                    ],
                ]);
            }
        } else {
            return response()->json([
                'success' => '0',
                'exercise' => 'enter your data perfectly',
            ]);

        }
    }
}
