<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get_category()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return response()->json([
            'data' => [
                'success' => '1',
                'exercise' => [
                    'create' => CategoryResource::collection($categories),
                    'update' => [],
                    'delete' => [],
                ],
            ],
        ]);
    }
}
