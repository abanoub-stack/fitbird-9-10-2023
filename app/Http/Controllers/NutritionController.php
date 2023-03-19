<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Nutrition;
use Illuminate\Http\Request;

class NutritionController extends Controller
{


    public function index()
    {
        $nutrtions  = Nutrition::orderBy('title' , 'asc')->get();
        return view('nutrtion.index' , compact('nutrtions'));

    }
    //API
    public function get(Request $request)
    {
        $customer = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $nutrtion  = $customer->nutrition()->first();
        if(!is_null($nutrtion))
        {
            return response()->json([
                'success' => true,
                'data' => $nutrtion->nutrition,
                'message' => "Nutrtion Sent Successfully",
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => "User Has No Nutrtion Yet",
            ]);
        }

    }
}
