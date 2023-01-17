<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function save(Request $request)
    { 
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();

        $validator = Validator::make($request->all(),
        [
            'question_id' => 'required|exists:questions,id',
            'body' => 'required|json'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()],400);
        }

        //Check Old Recoreds
        $old_answer = Answer::where('question_id', '=', $request->question_id)->where('user_id', '=', $user->id)->first();
        if ($old_answer) {
            //Update Answer
            $old_answer->update(['body' => $request->body]);
            return response()->json(['success' => true, 'message' => "Answer Updated"],200);
        }


        $answer = new Answer();
        $answer->question_id = $request->get('question_id');
        $answer->user_id = $user->id;
        $answer->body = $request->get('body');
        $answer->save();

        return response()->json(
            [
                'success' => true,
                'message' => "Answer Submitted",
            ] , 200);



    }
}
