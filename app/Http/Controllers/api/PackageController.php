<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriceResource;
use App\Models\Customer;
use App\Models\CustomerNotification;
use App\Models\Exercise;
use App\Models\Price;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function allPackages(Request $request)
    {
        try {

            $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
            $packages = DB::table('packages')->where('customer_id', '=', $user->id)->get();

            // $exercises_ids = [];
            // foreach ($packages as $i => $package) {
            //     $exercises_ids[] = $package->exercise_id;
            //     $exercises[] = Exercise::where('id', '=', $exercises_ids[$i])->first() ?? null;
            // }

            // if (!isEmpty((array) $exercises)) {
            //     $exx = (array) $exercises;
            // } else {
            //     $exx = Package::where('customer_id', '=', $user->id)->get();
            // }

            foreach ($packages as $package) {
                $exe[] = Exercise::where('id', '=', $package->exercise_id)->first();
            }
            if (!isEmpty((array) $exe)) {
                $exe = [];
            }

            return response()->json([
                'is_subscribed' => $user->is_subscribed,
                'package' => $exe,
            ]);

            CustomerNotification::create([
                'user' => $user->email,
                'message' => __('visited their packages'),
            ]);
        } catch (\Throwable$th) {
            if ($user->is_subscribed == '1') {
                return response()->json([
                    'is_subscribed' => '1',
                    'package' => [],
                ]);
            } else {
                return response()->json([
                    'is_subscribed' => '0',
                    'package' => [],
                ]);
            }
        }

    }

    public function subscriptionPrices()
    {
        return response()->json([
            'prices' => new PriceResource(Price::first()),
        ]);
    }

}
