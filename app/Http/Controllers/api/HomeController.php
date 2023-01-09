<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'all_categories' => url('api/v1/categories'),
            'all_exercises' => url('api/v1/exercises'),
            'all_exercises_sets' => url('api/v1/sets'),
            'logout' => url('api/v1/logout'),
            'total_exercise_category' => Category::all()->count(),
            'total_exercise' => Exercise::all()->count(),
        ]);

    }
}
