<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\ExerciseStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::orderBy('id', 'desc')->paginate(10);
        return view('exercise.exercises', [
            'exercises' => $exercises,
        ]);
    }

    public function addExercise()
    {
        return view('exercise.add-exercise');
    }

    public function addExercisePost(Request $request)
    {
        $category = Category::findOrFail($request->exercise_category);
        $request->validate([
            'exercise_name' => 'required|string|max:50',
            'exercise_category' => 'required|numeric|exists:categories,id',
            'exercise_time' => 'required|numeric',
            'exercise_calories' => 'required|numeric',
            'exercise_repeat_count' => 'required|numeric|max:1000',
            'exercise_url' => 'nullable|string|max:255',
            'exercise_image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // image
        $exerciseImagePath = Storage::putFile('exercises', $request->exercise_image);
        //$exerciseImagePath = Storage::disk('local2')->put('', $request->exercise_image);

        $exercise = Exercise::create([
            'name' => $request->exercise_name,
            'repeat_count' => $request->exercise_repeat_count,
            'url' => $request->exercise_url ?? null,
            'timee' => $request->exercise_time,
            'calories' => $request->exercise_calories,
            'category_id' => $request->exercise_category,
            'cat_name' => $category->name,
            'image' => $exerciseImagePath,
            'is_deleted' => 0,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Added Exercise $exercise->name"),
        ]);
        $request->session()->flash('exercise_created_successfully', "Exercise $exercise->name created successfully");
        return redirect(url('exercises'));
    }

    public function deleteExercise(Request $request, $exId)
    {
        $exercise = Exercise::findOrFail($exId);
        Storage::delete($exercise->image);
        $exercise->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Category $exercise->name"),
        ]);
        $request->session()->flash('exercise_deleted_successfully', "Exercise $exercise->name deleted successfully");
        return redirect(url('exercises'));
    }

    public function editExercise(Request $request, $exId)
    {
        $exercise = Exercise::findOrFail($exId);
        return view('exercise.edit-exercise', [
            'exercise' => $exercise,
        ]);
    }

    public function editExercisePost(Request $request, $exId)
    {
        $exercise = Exercise::findOrFail($exId);
        $request->validate([
            'exercise_name' => 'required|string|max:50',
            'exercise_category' => 'required|numeric|exists:categories,id',
            'exercise_repeat_count' => 'required|numeric|max:100',
            'exercise_time' => 'required|numeric|max:1000',
            'exercise_calories' => 'required|numeric',
            'exercise_url' => 'required|string|max:255',
            'exercise_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // image
        if ($request->hasFile('exercise_image')) {
            Storage::delete($exercise->image);
            $exerciseImagePath = Storage::putFile('exercises', $request->exercise_image);
        } else {
            $exerciseImagePath = $exercise->image;
        }

        $exercise->update([
            'name' => $request->exercise_name,
            'category_id' => $request->exercise_category,
            'repeat_count' => $request->exercise_repeat_count,
            'time' => $request->exercise_time,
            'calories' => $request->exercise_calories,
            'url' => $request->exercise_url,
            'image' => $exerciseImagePath,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Exercise $exercise->name"),
        ]);
        $request->session()->flash('exercise_updated_successfully', "Exercise $exercise->name updated successfully");
        return redirect(url('exercises'));
    }

    public function ExerciseSteps(Request $request, $exId)
    {
        $exercise = Exercise::findOrFail($exId);
        return view('exercise.exercise-steps', [
            'exercise' => $exercise,
        ]);
    }

    public function addExerciseStep($exId)
    {
        $exercise = Exercise::findOrFail($exId);
        return view('exercise.add-exercise-step', [
            'exercise' => $exercise,
        ]);
    }

    public function addExerciseStepPost(Request $request, $exId)
    {
        $exercise = Exercise::findOrFail($exId);
        $request->validate([
            'exercise_description' => 'required|string|min:5',
        ]);
        ExerciseStep::create([
            'exercise_id' => $exercise->id,
            'step' => $request->exercise_description,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Added Step $exercise->name"),
        ]);

        return redirect(url('exercise-steps/' . $exId));
    }

    public function deleteExerciseStep($stepId)
    {
        $step = ExerciseStep::findOrFail($stepId);
        $step->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Deleted Step $step->name"),
        ]);

        return redirect(url('exercise-steps', $step->Exercise->id));
    }

    public function updateExerciseStep($stepId)
    {
        $step = ExerciseStep::findOrFail($stepId);
        return view('exercise.edit-step', [
            'step' => $step,
        ]);
    }

    public function updateExerciseStepPost(Request $request, $stepId)
    {
        $step = ExerciseStep::findOrFail($stepId);
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

        return redirect(url('exercise-steps', $step->Exercise->id));
    }

    public function searchExercise(Request $request)
    {
        $key = $request->keyword;
        $exercises = Exercise::where('name', 'LIKE', "%$key%")
            ->orWhere('url', 'LIKE', "%$key%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('exercise.exercises', [
            'exercises' => $exercises,
        ]);
    }
}
