<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionResourceCollection;
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

        if ($question->type == "field" || $question->type == "area") {
            return redirect()->route('question.index')->with('success', 'Question Created Successfully');
        } else {
            return Redirect::route('question.body' , $question->id);
        }


    }



    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit' , compact('question'));
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all() ,
        [
            'title' => "required|string|max:255",
            'type' => "required|string|in:field,area,single,multiple",
            'choice_number' => "nullable|required_if:type,single|required_if:type,multiple|numeric|min:0",
            'id' => "required|exists:questions,id",

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $question = Question::find($request->id);
        $question->title = $request->title;
        $question->type = $request->type;
        $question->choice_number = $request->choice_number;
        $question->save();


        if ($question->type == "field" || $question->type == "area") {
            return redirect()->route('question.index')->with('success', 'Question Updated Successfully');
        } else {
            return Redirect::route('question.body' , $question->id);
        }

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

        return redirect()->route('question.index')->with('success', 'Question Body Update Successfully');
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', compact('question'));
    }


    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();
        return back()->with('success', 'Question Deleted Successfully');
    }



    //API Functions

    public function getAll()
    {
        $questions = Question::all();
        $questions = new QuestionResourceCollection($questions);
        return response()->json([
            'success' => true ,
            'data' => $questions
        ] , 200);
    }

}
