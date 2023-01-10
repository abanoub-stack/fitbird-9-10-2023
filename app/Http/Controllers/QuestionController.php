<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index()
    {
        $questions  = Question::all();
        return view('questions.index' , compact('questions'));
    }



    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'title' => "required|string|max:255",
            'type' => "required|string|in:field,area,single,multiple",
            'choice_number' => "nullable|required_if:type,single|required_if:type,multiple|numeric|min:0",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }


        $question = Question::create([
            'title' => $request->title,
            'type' => $request->type,
            'choice_number' => $request->choice_number,
        ]);


        return Redirect::route('question.body' , $question->id)->with('success', 'Question Created Successfully');

    }


    public function createBody($id)
    {
        $question = Question::find($id);
                return view('questions.createBody', compact('question'));
    }

    public function updateBody(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'body' => "required",
            'id' => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $question = Question::find($request->id);

        $question->update([
            'body' => json_encode($request->body)
        ]);


        return redirect()->route('question.index')->with('success', 'Question Created Successfully');;
    }

    public function show($id)
    {
        # code...
    }


    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();
        return back()->with('success', 'Question Deleted Successfully');
    }

}
