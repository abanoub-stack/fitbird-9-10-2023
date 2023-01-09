<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\ExerciseSet;
use Illuminate\Http\Request;

class ExerciseSetsController extends Controller
{
    public function index()
    {
        $sets = ExerciseSet::orderBy('id', 'desc')->paginate(10);
        return view('exercisesets.sets', [
            'sets' => $sets,
        ]);
    }

    public function addSet()
    {
        return view('exercisesets.add-set');
    }

    public function addSetPost(Request $request)
    {
        $request->validate([
            'category' => 'required|numeric|exists:categories,id',
            'exercise' => 'required|numeric|exists:exercises,id',
        ]);

        ExerciseSet::create([
            'category_id' => $request->category,
            'exercise_id' => $request->exercise,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Added Set"),
        ]);
        return redirect(url('sets'));
    }

    public function deleteSet($setId)
    {
        $set = ExerciseSet::findOrFail($setId);
        $set->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Deleted Set $set->name"),
        ]);
        return back();
    }

    public function editSet($setId)
    {
        $set = ExerciseSet::findOrFail($setId);
        return view('exercisesets.editset', [
            'set' => $set,
        ]);
    }

    public function editSetPost(Request $request, $setId)
    {
        $set = ExerciseSet::findOrFail($setId);
        $request->validate([
            'category' => 'required|numeric|exists:categories,id',
            'exercise' => 'required|numeric|exists:exercises,id',
        ]);
        $set->update([
            'category_id' => $request->category,
            'exercise_id' => $request->exercise,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Set $set->name"),
        ]);
        return redirect(url('sets'));
    }

}
