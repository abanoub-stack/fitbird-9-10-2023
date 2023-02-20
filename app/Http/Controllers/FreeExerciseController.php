<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\FreeExercise;
use App\Models\ExerciseStep;
use App\Models\FreeExerciseStep;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FreeExerciseController extends Controller
{
    public function index()
    {
        $exercises = FreeExercise::orderBy('id', 'desc')->paginate(10);
        return view('free_exercise.exercises', [
            'exercises' => $exercises,
        ]);
    }

    public function addExercise()
    {
        return view('free_exercise.add-exercise');
    }

    public function addExercisePost(Request $request)
    {
        $category = Category::findOrFail($request->exercise_category);

        $validator = Validator::make($request->all(),
        [
                'exercise_name' => 'required|string|max:50',
                'exercise_category' => 'required|numeric|exists:categories,id',
                // 'exercise_calories' => 'required|numeric',
                'reps' => 'nullable|required_without:exercise_time|required_with:sets',
                'sets' => 'nullable|required_without:exercise_time|required_with:reps',
                'exercise_time' => 'nullable|numeric|required_without:reps',
                'exercise_url' => 'nullable|string|max:255',
                'exercise_image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]
        );

        if($validator->fails())
        return back()->withErrors($validator->errors())->withInput();

        // image
        $exerciseImagePath = Storage::putFile('exercises', $request->exercise_image);
        //$exerciseImagePath = Storage::disk('local2')->put('', $request->exercise_image);

        if ($request->reps != null ) {
            $exercise = FreeExercise::create([
                'name' => $request->exercise_name,
                'repeat_count' => $request->reps  . " x " . $request->sets,
                'url' => $request->exercise_url ?? null,
                'timee' => $request->exercise_time,
                // 'calories' => $request->exercise_calories,
                'category_id' => $request->exercise_category,
                'cat_name' => $category->name,
                'image' => $exerciseImagePath,
                'is_deleted' => 0,
            ]);
        }
        else
        {
            $exercise = FreeExercise::create([
                'name' => $request->exercise_name,
                'url' => $request->exercise_url ?? null,
                'timee' => $request->exercise_time,
                // 'calories' => $request->exercise_calories,
                'category_id' => $request->exercise_category,
                'cat_name' => $category->name,
                'image' => $exerciseImagePath,
                'is_deleted' => 0,
            ]);
        }

        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Added Exercise $exercise->name"),
        ]);
        $request->session()->flash('exercise_created_successfully', "Exercise $exercise->name created successfully");
        return redirect(url('free_exercises'));
    }

    public function deleteExercise(Request $request, $exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        Storage::delete($exercise->image);
        $exercise->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Category $exercise->name"),
        ]);
        $request->session()->flash('exercise_deleted_successfully', "Exercise $exercise->name deleted successfully");
        return redirect(url('free_exercises'));
    }

    public function editExercise(Request $request, $exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        return view('free_exercise.edit-exercise', [
            'exercise' => $exercise,
        ]);
    }

    public function editExercisePost(Request $request, $exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        $validator = Validator::make($request->all(),
        [
            'exercise_name' => 'required|string|max:50',
            'exercise_category' => 'required|numeric|exists:categories,id',
            'reps' => 'nullable|required_without:exercise_time|required_with:sets',
            'sets' => 'nullable|required_without:exercise_time|required_with:reps',
            'exercise_time' => 'nullable|numeric|required_without:reps',
            'exercise_url' => 'required|string|max:255',
            'exercise_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        if($validator->fails())
        return back()->withErrors($validator->errors())->withInput();


        // image
        if ($request->hasFile('exercise_image')) {
            Storage::delete($exercise->image);
            $exerciseImagePath = Storage::putFile('exercises', $request->exercise_image);
        } else {
            $exerciseImagePath = $exercise->image;
        }

        if ($request->reps != null ) {

            $exercise->update([
                'name' => $request->exercise_name,
                'category_id' => $request->exercise_category,
                'repeat_count' => $request->reps  . " x " . $request->sets,
                'timee' => $request->exercise_time,
                // 'calories' => $request->exercise_calories,
                'url' => $request->exercise_url,
                'image' => $exerciseImagePath,
            ]);
        }
        else {
            $exercise->update([
                'name' => $request->exercise_name,
                'category_id' => $request->exercise_category,
                'timee' => $request->exercise_time,
                // 'calories' => $request->exercise_calories,
                'url' => $request->exercise_url,
                'image' => $exerciseImagePath,
            ]);
        }

        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Exercise $exercise->name"),
        ]);
        $request->session()->flash('exercise_updated_successfully', "Exercise $exercise->name updated successfully");
        return redirect(url('free_exercises'));
    }

    public function ExerciseSteps(Request $request, $exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        return view('free_exercise.exercise-steps', [
            'exercise' => $exercise,
        ]);
    }

    public function addExerciseStep($exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        return view('free_exercise.add-exercise-step', [
            'exercise' => $exercise,
        ]);
    }

    public function addExerciseStepPost(Request $request, $exId)
    {
        $exercise = FreeExercise::findOrFail($exId);
        $request->validate([
            'exercise_description' => 'required|string|min:5',
        ]);
        FreeExerciseStep::create([
            'free_exercise_id' => $exercise->id,
            'step' => $request->exercise_description,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Added Step $exercise->name"),
        ]);

        return redirect(url('free_exercise-steps/' . $exId));
    }

    public function deleteExerciseStep($stepId)
    {
        $step = FreeExerciseStep::findOrFail($stepId);
        $step->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Deleted Step $step->name"),
        ]);

        return redirect(url('free_exercise-steps', $step->Exercise->id));
    }

    public function updateExerciseStep($stepId)
    {
        $step = FreeExerciseStep::findOrFail($stepId);
        return view('free_exercise.edit-step', [
            'step' => $step,
        ]);
    }

    public function updateExerciseStepPost(Request $request, $stepId)
    {
        $step = FreeExerciseStep::findOrFail($stepId);
        $request->validate([
            'step' => 'required|string',
        ]);
        $step->update([
            'step' => $request->step,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Updated Step $step->name"),
        ]);

        return redirect(url('free_exercise-steps', $step->Exercise->id));
    }

    public function searchExercise(Request $request)
    {
        $key = $request->keyword;
        $exercises = FreeExercise::where('name', 'LIKE', "%$key%")
            ->orWhere('url', 'LIKE', "%$key%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('free_exercise.exercises', [
            'exercises' => $exercises,
        ]);
    }
}

