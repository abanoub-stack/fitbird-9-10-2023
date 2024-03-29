<?php

use App\Http\Controllers\AndroidNotifiactionController;
use App\Http\Controllers\AppNotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DayLayoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExerciseSetsController;
use App\Http\Controllers\FreeExerciseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IosNotifiactionController;
use App\Http\Controllers\NotifictaionController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubscribeWeeksController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TestTimeSlotController;
use App\Http\Controllers\TrainingSectionController;
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
    Route::get('/layout', [HomeController::class, 'layout']);
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
    Route::get('user-progress/{uId}', [UserController::class, 'userProgress']);
    // delete user
    Route::get('delete-user/{uId}', [UserController::class, 'delete']);
    // edit user
    Route::get('edit-user/{uId}', [UserController::class, 'edit']);
    Route::post('update-user', [UserController::class, 'update']);
    // Search User
    Route::get('search-users/{keyword}', [UserController::class, 'searchUsers']);



    # Progress Reports
    Route::any('progress-reports', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('progress-reports/{id}', [ProgressController::class, 'show'])->name('progress.show');


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


    //Nutrition
        //Index page
        Route::get('nutrition', [NutritionController::class, 'index'])->name('nutrition.index');

        //show
            Route::get('nutrition/show/{nutritionId}', [NutritionController::class, 'show'])->name('nutrition.show');

        //Create
            Route::get('nutrition/create', [NutritionController::class, 'create'])->name('nutrition.create');
            Route::post('nutrition/store', [NutritionController::class, 'store'])->name('nutrition.store');

        //Edit
            Route::get('nutrition/edit/{nutritionId}', [NutritionController::class, 'edit'])->name('nutrition.edit');
            Route::post('nutrition/update', [NutritionController::class, 'update'])->name('nutrition.update');


        // Delete
            Route::get('nutrition/delete/{nutritionId}', [NutritionController::class, 'delete'])->name('nutrition.delete');

        //Assign
        Route::get('nutrition/get-assign', [NutritionController::class, 'get_assign'])->name('nutrition.assign.get');
        Route::post('nutrition/assign', [NutritionController::class, 'assign'])->name('nutrition.assign');


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



    /*Free Exe Routes Start */
    #Exercise
    // All Exercises
    Route::get('free_exercises', [FreeExerciseController::class, 'index']);
    // Add Exercise
    Route::get('free_add-exercise', [FreeExerciseController::class, 'addExercise']);
    Route::post('free_add-exercise', [FreeExerciseController::class, 'addExercisePost']);
    // Delete Exerciese
    Route::get('free_delete-exercise/{exId}', [FreeExerciseController::class, 'deleteExercise']);
    // Edit Exercise
    Route::get('free_edit-exercise/{exId}', [FreeExerciseController::class, 'editExercise']);
    Route::Post('free_edit-exercise/{exId}', [FreeExerciseController::class, 'editExercisePost']);
    // Exercise Steps
    Route::get('free_exercise-steps/{exId}', [FreeExerciseController::class, 'ExerciseSteps']);
    // Add Exercise Step
    Route::get('free_add-exercise-step/{exId}', [FreeExerciseController::class, 'addExerciseStep']);
    Route::post('free_add-exercise-step/{exId}', [FreeExerciseController::class, 'addExerciseStepPost']);
    // Delete Step
    Route::get('free_delete-exercise-step/{stepId}', [FreeExerciseController::class, 'deleteExerciseStep']);
    // Update Step
    Route::get('free_update-exercise-step/{stepId}', [FreeExerciseController::class, 'updateExerciseStep']);
    Route::post('free_update-exercise-step/{stepId}', [FreeExerciseController::class, 'updateExerciseStepPost']);
    // Search
    Route::get('free_exercises/{keyword}', [FreeExerciseController::class, 'searchExercise']);

    #Exercise Sets
    // All Sets
    Route::get('free_sets', [ExerciseSetsController::class, 'index']);
    // Add Set
    Route::get('free_add-set', [ExerciseSetsController::class, 'addSet']);
    Route::post('free_add-set', [ExerciseSetsController::class, 'addSetPost']);
    // Delete Set
    Route::get('free_delete-set/{setId}', [ExerciseSetsController::class, 'deleteSet']);
    // Edit Set
    Route::get('free_edit-set/{setId}', [ExerciseSetsController::class, 'editSet']);
    Route::post('free_edit-set/{setId}', [ExerciseSetsController::class, 'editSetPost']);

    /*Free Exe Routes END */



    //Banner Images
    //Index page
    Route::get('banner', [BannerImageController::class, 'index'])->name('banner.index');
    //Create
    Route::get('banner/create', [BannerImageController::class, 'create'])->name('banner.create');
    Route::post('banner/store', [BannerImageController::class, 'store'])->name('banner.store');
    // Delete
    Route::get('banner/delete/{bannerId}', [BannerImageController::class, 'delete'])->name('banner.delete');



    //Training Sections
        //Index page
        Route::get('tsection', [TrainingSectionController::class, 'index'])->name('tsection.index');
        //Create
        Route::get('tsection/create', [TrainingSectionController::class, 'create'])->name('tsection.create');
        Route::post('tsection/store', [TrainingSectionController::class, 'store'])->name('tsection.store');
        Route::get('tsection/edit/{sectionID}', [TrainingSectionController::class, 'edit'])->name('tsection.edit');
        Route::post('tsection/update', [TrainingSectionController::class, 'update'])->name('tsection.update');

        // Delete
        Route::get('tsection/delete/{sectionID}', [TrainingSectionController::class, 'delete'])->name('tsection.delete');

    //Training Layouts
        //Index page
        Route::get('day-layouts', [DayLayoutController::class, 'index'])->name('day-layouts.index');
        //Create
        Route::get('day-layouts/create', [DayLayoutController::class, 'create'])->name('day-layouts.create');
        Route::post('day-layouts/store', [DayLayoutController::class, 'store'])->name('day-layouts.store');

        //Edit
        Route::get('day-layouts/edit/{layoutID}', [DayLayoutController::class, 'edit'])->name('day-layouts.edit');
        Route::post('day-layouts/update', [DayLayoutController::class, 'update'])->name('day-layouts.update');

        //Show
        Route::get('day-layouts/show/{layoutID}', [DayLayoutController::class, 'show'])->name('day-layouts.show');

        // Delete
        Route::get('day-layouts/delete/{layoutID}', [DayLayoutController::class, 'delete'])->name('day-layouts.delete');
        Route::get('day-layouts/deleteEXE-fromDay/', [DayLayoutController::class, 'deleteEXEbyDay'])->name('day-layouts.delete_exe');




    //Test Time Slot
    Route::get('test/timeslot', [TestTimeSlotController::class, 'test'])->name('timeslot.test');
    Route::get('test/timeslot2', [TestTimeSlotController::class, 'test2'])->name('timeslot.test2');

    //Subscribed weeks
    Route::get('weeks/', [SubscribeWeeksController::class, 'index'])->name('weeks.index');
    Route::any('weeks-save/', [SubscribeWeeksController::class, 'save'])->name('weeks.save');
    Route::get('categories/getSubCats/{id}', [CategoryController::class, 'getSubCategories'])->name('category.getSubs');
    Route::get('weeks/getExeByCategory/{id}', [SubscribeWeeksController::class, 'getExeByCategory']);
    Route::get('weeks/getCustomerInfo/{id}', [SubscribeWeeksController::class, 'getCustomerInfo']);
    Route::get('weeks/getEXEInfo/{id}', [SubscribeWeeksController::class, 'getEXEInfo']);
    Route::get('weeks/deleteEXE-fromDay/', [SubscribeWeeksController::class, 'deleteEXEbyDay']);
    Route::get('weeks/save-layout/', [SubscribeWeeksController::class, 'saveLayout']);
    Route::get('weeks/save-layout-for-customer/', [SubscribeWeeksController::class, 'saveLayoutForCustomer']);


    Route::post('weeks/by-week-day', [SubscribeWeeksController::class, 'Dashboard_getByWeekDay']);
    Route::post('weeks/by-week-day-reports', [SubscribeWeeksController::class, 'dayReport']);
    Route::post('weeks/by-week-day-charts', [SubscribeWeeksController::class, 'dayCharts']);
    Route::post('weeks/get-sub-week-data', [SubscribeWeeksController::class, 'Dashboard_getWeekData']);
    Route::get('weeks/get-customer-workouts-details', [SubscribeWeeksController::class, 'Dashboard_getCustomerWorkoutsDetails']);






});



