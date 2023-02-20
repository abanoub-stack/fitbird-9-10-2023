<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ExerciseResourse;
use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Resources\GetExerciseByCategoryResource;
use App\Models\FreeExercise;

class ExerciseController extends Controller
{
    public function get_all_excercise()
    {
        $data = Exercise::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => [
                'success' => '1',
                'exercise' => [
                    'create' => ExerciseResourse::collection($data),
                    'update' => [],
                    'delete' => [],
                ],
            ],
        ]);
    }

    public function get_all_free_excercise()
    {
        $data = FreeExercise::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => [
                'success' => '1',
                'exercise' => [
                    'create' => ExerciseResourse::collection($data),
                    'update' => [],
                    'delete' => [],
                ],
            ],
        ]);
    }

    public function getexercisebycategory(Request $request)
    {
        if ($request->has('cat_id')) {
            $category = Category::find($request->cat_id);
            if ($category) {
                $exercises = Exercise::where('category_id', '=', $request->cat_id)->get();
                return response()->json([
                    'data' => [
                        'success' => '1',
                        'exercise' => [
                            'create' => GetExerciseByCategoryResource::collection($exercises),
                            'update' => [],
                            'delete' => [],
                        ],
                    ],
                ]);
            } else {
                return response()->json([
                    'data' => [
                        'success' => '1',
                        'exercise' => [
                            'create' => [],
                            'update' => [],
                            'delete' => [],
                        ],
                    ],
                ]);
            }
        } else {
            return response()->json([
                'data' => [
                    'success' => '0',
                    'exercise' => __('enter your data perfectly'),
                ],
            ]);
        }
    }



    public function getFreeexercisebycategory(Request $request)
    {
        if ($request->has('cat_id')) {
            $category = Category::find($request->cat_id);
            if ($category) {
                $exercises = FreeExercise::where('category_id', '=', $request->cat_id)->get();
                return response()->json([
                    'data' => [
                        'success' => '1',
                        'exercise' => [
                            'create' => GetExerciseByCategoryResource::collection($exercises),
                            'update' => [],
                            'delete' => [],
                        ],
                    ],
                ]);
            } else {
                return response()->json([
                    'data' => [
                        'success' => '1',
                        'exercise' => [
                            'create' => [],
                            'update' => [],
                            'delete' => [],
                        ],
                    ],
                ]);
            }
        } else {
            return response()->json([
                'data' => [
                    'success' => '0',
                    'exercise' => __('enter your data perfectly'),
                ],
            ]);
        }
    }


}
