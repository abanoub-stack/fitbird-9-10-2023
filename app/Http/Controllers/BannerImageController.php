<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerImageController extends Controller
{
    public function index()
    {
        $images = BannerImage::all();
        return view('banner.index' , compact('images'));
    }

    public function create()
    {
        return view('banner.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , 
        [
            'image' => 'image|mimes:png,jpg,jpeg,gif,max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        if ($request->hasFile('image')) {
            $newImgName = $request->file('image')->hashName();
            $request->image->move(public_path('app_images/banner'), $newImgName);
            $image = BannerImage::create(['url' => "app_images/banner/".$newImgName]);
        }

        return back()->with('success' , 'Banner Image Added Successfully');
    }

    public function delete($bannerid)
    {
        $image = BannerImage::findOrFail($bannerid);
        if($image)
        {
            $image->delete();
            return back()->with('success', 'Banner Image Deleted Successfully');
        }
        else
        {
            return back()->withErrors('Banner Image Not Found');   
        }
    }
}
