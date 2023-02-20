<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DayLayout;
use App\Models\Exercise;
use App\Models\TrainingSection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayLayoutController extends Controller
{
    public function index()
    {
        $layouts = DayLayout::all();
        return view('training_layouts.index' , compact('layouts'));
    }



    public function show($layoutID)
    {
        $layout = DayLayout::findOrFail($layoutID);
        $data = json_decode($layout->data , true);
        $category = Category::find($data['category_id']);
        $array = [];
        foreach($data['exe_array'] as $section_id => $exe_array )
        {
                $section = TrainingSection::find($section_id);
                $exersices = Exercise::whereIn('id' , array_keys($exe_array) )->get();
                $array []=
                        [
                        'section' => $section,
                        'exe_list' => $exersices,
                        ] ;
        }

        return view('training_layouts.show' , compact('layout' , 'category', 'array'));
    }



    public function create()
    {
        return view('training_layouts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'section_name' => 'string|required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $new_section = DayLayout::create(['name' => $request->section_name]);

        return redirect(route('tsection.index'))->with('success' , 'Layout Added Successfully');
    }


    public function edit($layoutID)
    {
        $layout = DayLayout::findOrFail($layoutID);
        return view('training_layouts.edit' , compact('layout'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'section_name' => 'string|required',
            'section_id' => 'required|exists:training_sections,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error' , $validator->errors()->first());
        }
        $layout = DayLayout::find($request->section_id);
        $layout->update(['name' => $request->section_name]);

        return redirect(route('tsection.index'))->with('warning' , 'Layout Updated Successfully');
    }

    public function delete($layoutID)
    {
        $layout = DayLayout::findOrFail($layoutID);
        if($layout)
        {
            $layout->delete();
            return back()->with('success', 'Layout Deleted Successfully');
        }
        else
        {
            return back()->withErrors('Layout Not Found');
        }
    }



    public function deleteEXEbyDay(Request $request)
    {


        $validator = Validator::make($request->all(),
            [

                'section_id' => 'required|numeric|exists:training_sections,id',
                "exercise_id"    => "required",
                "layout_id"    => "required",

            ] ,
            [
                'section_id' => "Please Select Traing Section ",
                "exercise_id"    => "Please Select exercise",
            ]

        );


         if($validator->fails())
         {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
         }

         $section_id = $request->section_id;
         $exercise_id = $request->exercise_id;
         $layout_id = $request->layout_id;

         $layout = DayLayout::findOrFail($layout_id);
         $data = json_decode($layout->data , true);

         //Start The Functionality
         try
         {
            $exe_arr = $data['exe_array'][$section_id];
            foreach ($exe_arr as $exe_id => $is_completed) {
                   if($exe_id == $exercise_id)
                   {
                       unset($exe_arr[$exe_id]);
                   }
            }


            $new_data = $data; //intailize with old data


            //If the exe array has been empty, then delete the exe_section from the array
            if(count($exe_arr) == 0)
                {
                    $sections = $data['exe_array'];
                    foreach ($sections as $sec_id => $exe_arrays) {
                           if($sec_id == $section_id)
                           {
                               unset($sections[$section_id]);
                           }
                    }

                    $new_data['exe_array'] = $sections;

                }
            else
                {

                    $new_data['exe_array'][$section_id] = $exe_arr;
                }



            //Do Update on DB
            $update = $layout->update(['data' =>json_encode($new_data)]);
                if($update)
                    {
                        return response()->json([
                            'success' =>true,
                            'message' =>"Delete Done",
                        ] , 200);
                    }
                else
                    {
                        return response()->json([
                            'success' =>false,
                            'message' =>"Delete Failed",
                        ] , 500);
                    }
         }
         catch(Exception $e)
         {
            return response()->json([
                'success' =>false,
                'message' =>"Delete fails " . $e->getMessage(),
            ] , 500);
         }

    }

}
