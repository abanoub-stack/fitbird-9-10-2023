<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    public function price()
    {
        if (Price::all()->count() == 0) {
            Price::create([
                'price' => 1,
            ]);
            Auth::logout();
            return view('auth.login');
        }

        $price = Price::all()->first();
        return view('price.price', [
            'price' => $price,
        ]);
    }

    public function pricePost(Request $request)
    {
        $price = Price::all()->first();

        $n = Price::all()->first();
        $isCorrect = Price::findOrFail($n->id);
        if ($isCorrect) {
            $request->validate([
                'price' => 'nullable|numeric',
                'price_three_months' => 'nullable|numeric',
                'price_six_months' => 'nullable|numeric',
                'price_year' => 'nullable|numeric',
            ]);
            if ($request->has('price_three_months')) {
                $priceThreeMonths = $request->price_three_months;
            } else {
                $priceThreeMonths = null;
            }
            if ($request->has('price_six_months')) {
                $priceSixMonths = $request->price_six_months;
            } else {
                $priceSixMonths = null;
            }
            if ($request->has('price_year')) {
                $priceYear = $request->price_year;
            } else {
                $priceYear = null;
            }

            $price = $isCorrect;
            $price->update([
                'price' => $request->price,
                'price_three_months' => $priceThreeMonths,
                'price_six_months' => $priceSixMonths,
                'price_year' => $priceYear,
            ]);
            return back();
        }
    }

}
