<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResourse;
use App\Models\Exercise;
use App\Models\Tokandata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokanDataController extends Controller
{
    public function tokan_data(Request $request)
    {
        $token = Str::random(64);
        try {

            if ($request->has('token') and $request->has('type')) {
                $tokanData = Tokandata::create([
                    'token' => $token,
                    'type' => 'android',
                    'user_id' => '0',
                    'delivery_boyid' => '0',
                ]);
                $exxs = Exercise::all();
                return response()->json([
                    'data' => [
                        'success' => '1',
                        'register' => 'Registered',
                        'data' => ExerciseResourse::collection($exxs),
                    ],
                ]);

            } else {
                return response()->json([
                    'data' => [
                        'success' => "0",
                        'register' => __('enter your data perfectly'),
                    ],
                ]);
            }
        } catch (\Throwable$th) {
            return $th->getMessage();
        }

    }
}
