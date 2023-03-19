<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerNutrition;
use App\Models\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NutritionController extends Controller
{


    public function index()
    {
        $nutrtions  = Nutrition::orderBy('title' , 'asc')->get();
        return view('nutrition.index' , compact('nutrtions'));
    }


    public function create()
    {
        return view('nutrition.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'title' => "required|string|max:255",
            'details' => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }


        $nutrtion = new Nutrition();

        $nutrtion->title = $request->title;
        $nutrtion->data = $request->details;
        $nutrtion->save();


        return Redirect::route('nutrition.index')->with('success', 'nutrition Created Successfully');
    }



    public function edit($id)
    {
        $nutrtion = Nutrition::find($id);
        return view('nutrition.edit' , compact('nutrtion'));
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'title' => "required|string|max:255",
            'details' => "required",
            'id' => "required|exists:nutrition,id",

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $nutrtion = Nutrition::find($request->id);
        $nutrtion->title = $request->title;
        $nutrtion->data = $request->details;
        $nutrtion->save();
        return redirect()->route('nutrition.index')->with('success', 'Nutrition Updated Successfully');

    }



    public function show($id)
    {
        $nutrtion = Nutrition::find($id);
        return view('nutrition.show', compact('nutrtion'));
    }


    public function delete($id)
    {
         $nutrtion = Nutrition::find($id);
         $nutrtion->delete();
        return back()->with('success', 'Nutrition Deleted Successfully');
    }



    public function get_assign()
    {
        $nutritions = Nutrition::orderBy('title' , 'asc')->get();
        $users = Customer::where('is_subscribed' , '1')->orderBy('name' , 'asc')->get();
        return view('nutrition.assign' , compact('nutritions' , 'users'));
    }


    public function assign(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'nutrition_id' => "required|exists:nutrition,id",
            'customer_id' => "required|exists:customers,id",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }


        //Check Old Assign
        $old = CustomerNutrition::where('nutrition_id' , $request->nutrition_id)
        ->where('customer_id' , $request->customer_id)->first();

        if ($old != null) //There Are OLD Data
            {
                $old->update(['nutrition_id' => $request->nutrition_id]);
                return back()->with(['success' => 'Nutrition Assigned Successfully (Override)']);
            }

        else
            {
                $assign = new CustomerNutrition();
                $assign->customer_id = $request->customer_id;
                $assign->nutrition_id = $request->nutrition_id;
                $assign->save();
                return back()->with('success', 'Nutrition Assined Successfully');
            }

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
