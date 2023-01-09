<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Models\Customer;
use App\Models\CustomerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function allPackages(Request $request)
    {
        $user = Customer::where('access_token', '=', $request->header('access_token'))->first();
        $packages = DB::table('packages')->where('customer_id', '=', $user->id)->get();
        CustomerNotification::create([
            'user' => $user->email,
            'message' => __('visited their packages'),
        ]);
        return response()->json([
            'package' => PackageResource::collection($packages),
        ]);
    }
}
