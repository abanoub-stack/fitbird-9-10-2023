<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ExerciseController;
use App\Http\Controllers\api\ExerciseSetsController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\PackageController;
use App\Http\Controllers\api\v1\CategoryController as V1CategoryController;
use App\Http\Controllers\api\v1\ExerciseController as V1ExerciseController;
use App\Http\Controllers\api\v1\ExerciseSetController as V1ExerciseSetController;
use App\Http\Controllers\api\v1\ExerciseStepController as V1ExerciseStepController;
use App\Http\Controllers\api\v1\RegisterController as V1RegisterController;
use App\Http\Controllers\api\v1\StripePaymentController as V1StripePaymentController;
use App\Http\Controllers\api\v1\TokanDataController as V1TokanDataController;
use App\Http\Controllers\CancelRegistrationController;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->prefix('v1')->group(function () {});

# Guest #
Route::middleware(['api-guest'])->group(function () {
    // Login
    Route::post('login', [AuthController::class, 'login']);
    // Register
    Route::post('register', [AuthController::class, 'register']);
    # Guest #
});

# AUTH #
Route::middleware(['api-auth'])->group(function () {
    // logout
    Route::get('logout', [AuthController::class, 'logout']);
    # INDEX
    Route::get('', [HomeController::class, 'index']);
    # Categories
    Route::get('categories', [CategoryController::class, 'allCategories']);
    # Exercises
    Route::get('exercises', [ExerciseController::class, 'allExercises']);
    # Exercise Sets
    Route::get('sets', [ExerciseSetsController::class, 'allSets']);
    # Packages
    Route::get('packages', [PackageController::class, 'allPackages']);

    # Add Credit Card
    # Payment Stripe
    #Subscription Prices

    Route::post('subscribe-month', [V1StripePaymentController::class, 'subscribeMonth']);
    Route::post('subscribe-three_months', [V1StripePaymentController::class, 'subscribeThreeMonths']);
    Route::post('subscribe-six_months', [V1StripePaymentController::class, 'subscribeSixMonths']);
    Route::post('subscribe-year', [V1StripePaymentController::class, 'subscribeYear']);
    // # Remove Credit Card
    // Route::get('remove-credit', [RemoveCreditCardController::class, 'removeCreditCard']);
    #Cancel Registration
    Route::get('cancel-registration', [CancelRegistrationController::class, 'cancelSubcription']);
});


# AUTH #

#============================================================================================#
#============================================================================================#
#============================================================================================#

Route::get('get_all_excercise.php', [V1ExerciseController::class, 'get_all_excercise']);
Route::get('get_category.php', [V1CategoryController::class, 'get_category']);
Route::get('get_exercise_step_list.php', [V1ExerciseStepController::class, 'get_exercise_step_list']);
Route::get('get_exercise.php', [V1ExerciseSetController::class, 'get_exercise']);
Route::get('get_set_by_category.php', [V1ExerciseSetController::class, 'get_set_by_category']);
Route::get('getexercisebycategory.php', [V1ExerciseController::class, 'getexercisebycategory']);

Route::get('subscription-prices', [PackageController::class, 'subscriptionPrices']);
Route::get('all-users', function () {
    return Customer::all(['id', 'name', 'email', 'phone']);
});


Route::get('user_register.php', [V1RegisterController::class, 'user_register']);
Route::get('register_new.php', [V1RegisterController::class, 'user_register']);

Route::get('tokan_data.php', [V1TokanDataController::class, 'tokan_data']);