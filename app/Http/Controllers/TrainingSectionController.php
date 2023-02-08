<?php

namespace App\Http\Controllers;

use App\Models\TrainingSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingSectionController extends Controller
{
    public function index()
    {
        $sections = TrainingSection::all();
        return view('training_sections.index' , compact('sections'));
    }

    public function create()
    {
        return view('training_sections.create');
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

        $new_section = TrainingSection::create(['name' => $request->section_name]);

        return redirect(route('tsection.index'))->with('success' , 'Section Added Successfully');
    }


    public function edit($sectionID)
    {
        $section = TrainingSection::findOrFail($sectionID);
        return view('training_sections.edit' , compact('section'));
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
        $section = TrainingSection::find($request->section_id);
        $section->update(['name' => $request->section_name]);

        return redirect(route('tsection.index'))->with('warning' , 'Section Updated Successfully');
    }

    public function delete($sectionID)
    {
        $section = TrainingSection::findOrFail($sectionID);
        if($section)
        {
            $section->delete();
            return back()->with('success', 'Section Deleted Successfully');
        }
        else
        {
            return back()->withErrors('Section Not Found');
        }
    }

}
