<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\VirtualReality;
use GuzzleHttp\Middleware;

use App\Http\Livewire\Inprogress;
use App\Http\Livewire\Help;


use App\Http\Livewire\Account\Profile as MyProfile;
use App\Http\Livewire\Account\Notifications as MyNotifications;
use App\Http\Livewire\Account\Players as MyPlayers;
use App\Http\Livewire\Account\Trainers as MyTrainers;
use App\Http\Livewire\Account\Tasks as MyTasks;

use App\Http\Livewire\Management\Memebers\AllPlayers;
use App\Http\Livewire\Management\Memebers\AllTrainers;
use App\Http\Livewire\Management\Memebers\AllInstructors;

use App\Http\Livewire\Management\Users\AllUsers;
use App\Http\Livewire\Management\Users\RolesPermissions\AllPermissions;
use App\Http\Livewire\Management\Users\RolesPermissions\AllRoles;

use App\Http\Livewire\Management\Sports\AllSports;
use App\Http\Livewire\Management\Sports\Accents\AllAccents;
use App\Http\Livewire\Management\Sports\Accents\AllMetrics;

use App\Http\Livewire\Bankdata\Players\Database0709;
use App\Http\Livewire\Bankdata\Players\Database1012;
use App\Http\Livewire\Bankdata\Players\Database1315;
use App\Http\Livewire\Bankdata\Players\Database1518;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');







Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    // Route::get('billing', Billing::class)->name('billing');
    // Route::get('rtl', RTL::class)->name('rtl');



    Route::get('dashboard', Dashboard::class)->name('dashboard');
    //Route::get('tables', Tables::class)->name('tables');
    Route::get('tables', Inprogress::class)->name('tables');
    Route::get('machine-learning', Inprogress::class)->name('machine-learning');
    Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('more-tools', Inprogress::class)->name('more-tools');



    Route::get('my-profile', MyProfile::class)->name('my-profile');
    //Route::get('profile', Profile::class)->name('profile');
    Route::get('my-notifications', MyNotifications::class)->name('my-notifications');
    Route::get('notifications', Notifications::class)->name("notifications");
    Route::get('my-players', MyPlayers::class)->name('my-players');
    Route::get('my-trainers', MyTrainers::class)->name('my-trainers');
    Route::get('my-tasks', MyTasks::class)->name('my-tasks');

    Route::get('players-management', AllPlayers::class)->name('players-management');
    Route::get('trainer-management', AllTrainers::class)->name('trainer-management');
    Route::get('instructor-management', AllInstructors::class)->name('instructor-management');

    Route::get('users-management', AllUsers::class)->name('users-management');
    Route::get('permissions-management', AllPermissions::class)->name('permissions-management');
    Route::get('roles-management', AllRoles::class)->name('roles-management');
    Route::get('sports-management', AllSports::class)->name('sports-management');
    Route::get('accents-management', AllAccents::class)->name('accents-management');
    Route::get('metrics-management', AllMetrics::class)->name('metrics-management');

    Route::get('database-0709', Database0709::class)->name('database-0709');
    Route::get('database-1012', Database1012::class)->name('database-1012');
    Route::get('database-1315', Database1315::class)->name('database-1315');
    Route::get('database-1518', Database1518::class)->name('database-1518');
















});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/help/{section?}', Help::class)->name('help');
    Route::get('{section?}/help', Help::class)->name('help');
});
