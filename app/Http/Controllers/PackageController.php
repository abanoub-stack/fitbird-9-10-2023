<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function allPackages()
    {
        $packages = DB::table('packages')
            ->groupBy('customer_id')
            ->orderBy('id', 'desc')->get(['*', DB::raw('COUNT(`exercise_id`) as total')]);
        return view('package.all-packages', [
            'packages' => $packages,
        ]);
    }

    public function showPackage($customerId)
    {
        $packages = DB::table('packages')->where('customer_id', '=', $customerId)->get();
        // dd($packages);
        $customer = Customer::where('id', '=', $customerId)->first();
        return view('package.show-package', [
            'packages' => $packages,
            'customer' => $customer,
        ]);
    }

    public function addPackage()
    {
        return view('package.add-package');
    }

    public function addPackagePost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:packages,name',
            'customer' => 'required|numeric|exists:customers,id',
            'category' => 'nullable|exists:categories,id',
        ]);

        foreach (DB::table('exercises')->get() as $ex) {
            if ($request->has("exercise_$ex->id")) {
                $exercises_id[] = $ex->id;
            }
        }
        foreach ($exercises_id as $exercise) {
            Package::create([
                'name' => $request->name,
                'customer_id' => $request->customer,
                // 'category_id' => $request->category,
                'category_id' => null,
                'exercise_id' => $exercise,
            ]);
        }
        return redirect(url('packages'));
    }

    public function deletePackage($customerId)
    {
        $packages = Package::where('customer_id', '=', $customerId)->get();
        foreach ($packages as $package) {
            $package->delete();
        }
        return redirect(url('/packages'));
    }

}
