<?php

use App\Http\Controllers\AndroidNotifiactionController;
use App\Http\Controllers\AppNotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExerciseSetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IosNotifiactionController;
use App\Http\Controllers\NotifictaionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#Guest
Route::middleware('guest')->group(function () {
    //  login
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'loginPost']);
});

# Super Admin
Route::middleware('super-admin')->group(function () {
    # Admins
    Route::get('admins', [SuperAdminController::class, 'admins']);
    // Delete Admin
    Route::get('admins/delete/{adminId}', [SuperAdminController::class, 'deleteAdmin']);
    // Add Admin
    Route::get('admins/add', [SuperAdminController::class, 'addAdmin']);
    Route::post('admins/add', [SuperAdminController::class, 'addAdminPost']);
    // Admin Activity
    Route::get('admins/edit/{adminId}', [SuperAdminController::class, 'editAdmin']);
    Route::post('admins/edit/{adminId}', [SuperAdminController::class, 'editAdminPost']);
    // Notifications
    Route::get('notifications', [SuperAdminController::class, 'allNotification']);
    // Delete Notification
    Route::get('notifications/delete/{nId}', [SuperAdminController::class, 'deleteNotification']);
    // Notification Mark As Read
    Route::get('notifications/mark-as-read/{nId}', [SuperAdminController::class, 'notificationMarKAsRead']);
    // Delet All notification
    Route::get('notifications/delete-all', [SuperAdminController::class, 'deleteAllNotifications']);
    // Price
    Route::get('price', [PriceController::class, 'price']);
    Route::post('price', [PriceController::class, 'pricePost']);

    // // Create Subscription
    // Route::get('create-subscription', [SubscriptionController::class, 'create']);
    // Route::post('');
    // App Notifications
    Route::get('app-notifications', [AppNotificationController::class, 'allNotifications']);
    // mark as read
    Route::get('/app-notifications/mark-as-read/{nId}', [AppNotificationController::class, 'markAsRead']);
    // delete notification
    Route::get('/app-notifications/delete/{nId}', [AppNotificationController::class, 'deleteNotification']);
    Route::get('/app-notifications/delete/{nId}', [AppNotificationController::class, 'deleteNotification']);
    Route::get('/app-notifications/delete-all/', [AppNotificationController::class, 'deleteAllNotification']);

});

#Auth
Route::middleware('auth')->group(function () {
    // logout
    Route::get('logout', [AuthController::class, 'logout']);

    // index
    Route::get('/', [HomeController::class, 'index']);
    // profile
    Route::get('profile', [HomeController::class, 'profile']);
    Route::post('profile', [HomeController::class, 'profilePost']);
    #Categories
    // All Categories
    Route::get('categories', [CategoryController::class, 'allCategories']);
    // Add Category
    Route::get('add-category', [CategoryController::class, 'addCategory']);
    Route::post('add-category', [CategoryController::class, 'addCategoryPost']);
    // Delete Category
    Route::get('delete-category/{catId}', [CategoryController::class, 'deleteCategory']);
    // Edit Category
    Route::get('edit-category/{catId}', [CategoryController::class, 'editCategory']);
    Route::post('edit-category/{catId}', [CategoryController::class, 'editCategoryPost']);
    // Search
    Route::get('categories/{keyword}', [CategoryController::class, 'searchCategory']);

    #Exercise
    // All Exercises
    Route::get('exercises', [ExerciseController::class, 'index']);
    // Add Exercise
    Route::get('add-exercise', [ExerciseController::class, 'addExercise']);
    Route::post('add-exercise', [ExerciseController::class, 'addExercisePost']);
    // Delete Exerciese
    Route::get('delete-exercise/{exId}', [ExerciseController::class, 'deleteExercise']);
    // Edit Exercise
    Route::get('edit-exercise/{exId}', [ExerciseController::class, 'editExercise']);
    Route::Post('edit-exercise/{exId}', [ExerciseController::class, 'editExercisePost']);
    // Exercise Steps
    Route::get('exercise-steps/{exId}', [ExerciseController::class, 'ExerciseSteps']);
    // Add Exercise Step
    Route::get('add-exercise-step/{exId}', [ExerciseController::class, 'addExerciseStep']);
    Route::post('add-exercise-step/{exId}', [ExerciseController::class, 'addExerciseStepPost']);
    // Delete Step
    Route::get('delete-exercise-step/{stepId}', [ExerciseController::class, 'deleteExerciseStep']);
    // Update Step
    Route::get('update-exercise-step/{stepId}', [ExerciseController::class, 'updateExerciseStep']);
    Route::post('update-exercise-step/{stepId}', [ExerciseController::class, 'updateExerciseStepPost']);
    // Search
    Route::get('exercises/{keyword}', [ExerciseController::class, 'searchExercise']);

    #Exercise Sets
    // All Sets
    Route::get('sets', [ExerciseSetsController::class, 'index']);
    // Add Set
    Route::get('add-set', [ExerciseSetsController::class, 'addSet']);
    Route::post('add-set', [ExerciseSetsController::class, 'addSetPost']);
    // Delete Set
    Route::get('delete-set/{setId}', [ExerciseSetsController::class, 'deleteSet']);
    // Edit Set
    Route::get('edit-set/{setId}', [ExerciseSetsController::class, 'editSet']);
    Route::post('edit-set/{setId}', [ExerciseSetsController::class, 'editSetPost']);

    # User
    // All Users
    Route::get('users', [UserController::class, 'index']);
    // show User
    Route::get('user/{uId}', [UserController::class, 'user']);

    # Notification
    // All Notifications
    Route::get('send-notifications', [NotifictaionController::class, 'index']);
    // Send Notification
    Route::get('send-notification', [NotifictaionController::class, 'send']);

    # Android Notification
    Route::get('android-notification', [AndroidNotifiactionController::class, 'index']);
    Route::post('update-android', [AndroidNotifiactionController::class, 'updateAndroid']);

    # IOS Notification
    Route::get('ios-notification', [IosNotifiactionController::class, 'index']);
    Route::post('update-ios', [IosNotifiactionController::class, 'updateIos']);

    # Packages
    // All Packages
    Route::get('packages', [PackageController::class, 'allPackages']);
    // Show Package
    Route::get('packages/show/{customerId}', [PackageController::class, 'showPackage']);
    // Add Package
    Route::get('packages/add', [PackageController::class, 'addPackage']);
    Route::post('packages/add', [PackageController::class, 'addPackagePost']);
    // /packages/add
    // Delete Package
    Route::get('packages/delete/{customerId}', [PackageController::class, 'deletePackage']);

    // List all premiumm users
    Route::get('users/premium', [UserController::class, 'premiumUsers']);
    // edit premium user
    Route::get('users/premium/user/{userId}', [UserController::class, 'editPremiumUser']);
    Route::post('users/premium/user/{userId}', [UserController::class, 'editPremiumUserPost']);
    // assign subscription
    Route::get('users/premium/assign', [UserController::class, 'assignSubscription']);
    Route::post('users/premium/assign', [UserController::class, 'assignSubscriptionPost']);

    // payment history
    Route::get('payment/history', [PaymentHistoryController::class, 'index']);


    //  Questions
        //Index page
            Route::get('questions', [QuestionController::class, 'index'])->name('question.index');

        //show
            Route::get('questions/show/{questionId}', [QuestionController::class, 'show'])->name('question.show');

        //Create
            Route::get('questions/create', [QuestionController::class, 'create'])->name('question.create');
            Route::post('questions/store', [QuestionController::class, 'store'])->name('question.store');

        //Edit
            Route::get('questions/edit/{questionId}', [QuestionController::class, 'edit'])->name('question.edit');
            Route::post('questions/update', [QuestionController::class, 'update'])->name('question.update');

        //Body
            Route::get('questions-body/{questionId}',[QuestionController::class, 'createBody'])->name('question.body');
            Route::post('questions-update-body', [QuestionController::class, 'updateBody'])->name('question.update.body');

        // Delete
            Route::get('questions/delete/{questionId}', [QuestionController::class, 'delete'])->name('question.delete');

});
