<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1RegisterResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function user_register(Request $request)
    {

        try {
            $customer = Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'workout_intensity' => $request->workout_intensity,
                'age' => $request->age,
                'height' => $request->height,
                'exercise_days' => $request->exercise_days,
            ]);
        } catch (\Throwable$th) {
            return $th->getMessage();
        }

        if (!$customer) {
            return response()->json([
                'data' => [
                    'success' => '0',
                    'register' => __('enter your data perfectly'),
                ],
            ]);
        }
        return response()->json([
            'data' => [
                'success' => '1',
                'register' => new v1RegisterResource($customer),
            ],
        ]);
    }
}
