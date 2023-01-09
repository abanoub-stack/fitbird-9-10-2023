<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        CustomerNotification::create([
            'user' => Customer::where('access_token', '=', $request->header('access_token'))->first()->email,
            'message' => __('visited categories'),
        ]);
        return response()->json([
            'categories' => CategoryResource::collection($categories),
        ]);
    }
}
