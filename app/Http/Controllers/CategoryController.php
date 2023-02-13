<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('category.categories', [
            'categories' => $categories,
        ]);
    }

    public function addCategory()
    {
        $cats = Category::orderBy('name')->get();
        return view('category.add-category' , compact('cats'));
    }

    public function addCategoryPost(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'parent_id' => 'nullable|exists:categories,id',
            'category_name' => 'required|string|max:50',
            'category_description' => 'required|string',
            'category_level' => 'required|string|max:50',
            'category_icon' => 'required|image|mimes:jpg,jpeg,png,gif',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        // $request->validate([
        //     'parent_id' => 'nullable|exists:categories,id',
        //     'category_name' => 'required|string|max:50',
        //     'category_description' => 'required|string',
        //     'category_level' => 'required|string|max:50',
        //     'category_icon' => 'required|image|mimes:jpg,jpeg,png,gif',
        // ]);

        $iconPath = Storage::putFile('categories', $request->category_icon);
        //$iconPath = Storage::putFile('', $request->category_icon);

        $category = Category::create([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'description' => $request->category_description,
            'level' => $request->category_level,
            'icon' => $iconPath,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __('Added A New Category'),
        ]);
        $request->session()->flash('category_added_successfully', "Category $category->name created successfully");
        return redirect(url('/categories'))->with('success' , "Category $category->name created successfully");
    }

    public function deleteCategory($catId, Request $request)
    {
        $category = Category::findOrFail($catId);
        foreach ($category->Exercises as $exercise) {
            Storage::delete($exercise->image);
            $exercise->delete();
        }
        foreach ($category->Sets as $set) {
            $set->delete();
        }
        Storage::delete($category->icon);
        $category->delete();
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Deleted Category $category->name"),
        ]);
        $request->session()->flash('category_deleted_successfully', "Category $category->name deleted successfully");
        return redirect(url('/categories'));
    }

    public function editCategory($catId)
    {
        $category = Category::findOrFail($catId);
        $cats = Category::orderBy('name')->get();

        return view('category.edit-category', [
            'cat' => $category,
            'cats' => $cats,
        ]);
    }

    public function editCategoryPost(Request $request, $catId)
    {
        $category = Category::findOrFail($catId);
        $request->validate([
            'category_name' => 'required|string|max:50',
            'category_description' => 'required|string|min:5',
            'category_level' => 'required|string|max:50',
            'category_icon' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->hasFile('category_icon')) {
            Storage::delete($category->icon);
            $iconPath = Storage::putFile('categories', $request->category_icon);
        } else {
            $iconPath = $category->icon;
        }

        $category->update([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'description' => $request->category_description,
            'level' => $request->category_level,
            'icon' => $iconPath,
        ]);
        AdminNotification::create([
            'admin' => auth()->user()->name,
            'message' => __("Edited Category $category->name"),
        ]);
        $request->session()->flash('category_updated_successfully', "Category $category->name updated successfully");
        return redirect(url('/categories'))->with('success' , "Category $category->name updated successfully");
    }

    public function searchCategory(Request $request)
    {
        $key = $request->keyword;
        $categories = Category::where('name', 'LIKE', "%$key%")
            ->orWhere('description', 'LIKE', "%$key%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('category.categories', [
            'categories' => $categories,
        ]);
    }

    public function getSubCategories($id , Request $request)
    {
        if($request->ajax())
        {
            $subcats = Category::select('id' , 'name')->where('parent_id', $id)->get();

            if($subcats->count() > 0)
            {
                return
                [
                    'success' =>true,
                    'data' =>$subcats
                ];
            }
            else
            {
                return
                [
                    'success' =>false,
                    'data' =>null
                ];
            }

        }
    }

}
