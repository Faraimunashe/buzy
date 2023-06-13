<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::get('/my-profile', 'App\Http\Controllers\MyProfileController@index')->middleware(['auth'])->name('my-profile');

Route::get('/partner', 'App\Http\Controllers\PartnerController@index')->name('partner');
Route::post('/apply', 'App\Http\Controllers\PartnerController@apply')->name('apply');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/topics', 'App\Http\Controllers\admin\TopicController@index')->name('admin-topics');
    Route::post('/admin/add-topic', 'App\Http\Controllers\admin\TopicController@add')->name('admin-add-topic');
    Route::post('/admin/update-topic', 'App\Http\Controllers\admin\TopicController@update')->name('admin-update-topic');
    Route::post('/admin/delete-topic', 'App\Http\Controllers\admin\TopicController@delete')->name('admin-delete-topic');

    Route::get('/admin/consultants', 'App\Http\Controllers\admin\ConsultantController@index')->name('admin-consultants');
    Route::post('/admin/add-consultant', 'App\Http\Controllers\admin\ConsultantController@add')->name('admin-add-consultant');
    Route::post('/admin/update-consultant', 'App\Http\Controllers\admin\ConsultantController@update')->name('admin-update-consultant');
    Route::post('/admin/delete-consultant', 'App\Http\Controllers\admin\ConsultantController@delete')->name('admin-delete-consultant');

    Route::get('/admin/investors', 'App\Http\Controllers\admin\InvestorController@index')->name('admin-investors');
    Route::post('/admin/add-investor', 'App\Http\Controllers\admin\InvestorController@add')->name('admin-add-investor');
    Route::post('/admin/update-investor', 'App\Http\Controllers\admin\InvestorController@update')->name('admin-update-investor');
    Route::post('/admin/delete-investor', 'App\Http\Controllers\admin\InvestorController@delete')->name('admin-delete-investor');

    Route::get('/admin/requests', 'App\Http\Controllers\admin\RequestsController@index')->name('admin-requests');
    Route::post('/admin/approve-request', 'App\Http\Controllers\admin\RequestsController@approve')->name('admin-approve-request');
    Route::post('/admin/decline-request', 'App\Http\Controllers\admin\RequestsController@decline')->name('admin-decline-request');
    Route::post('/admin/delete-request', 'App\Http\Controllers\admin\RequestsController@delete')->name('admin-delete-request');

    Route::get('/admin/admins', 'App\Http\Controllers\admin\AdminController@index')->name('admin-admins');
    Route::post('/admin/add-admin', 'App\Http\Controllers\admin\AdminController@add')->name('admin-add-admin');
    Route::post('/admin/delete-admin', 'App\Http\Controllers\admin\AdminController@delete')->name('admin-delete-admin');
});

Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/user/dashboard', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');

    Route::get('/user/business-education', 'App\Http\Controllers\user\BusinessEducationController@index')->name('user-business-education');
    Route::get('/user/business-education/{id}', 'App\Http\Controllers\user\BusinessEducationController@one')->name('user-view-businesseducation');

    Route::get('/user/objectives', 'App\Http\Controllers\user\ObjectivesController@index')->name('user-objectives');
    Route::post('/user/add-objective', 'App\Http\Controllers\user\ObjectivesController@add')->name('user-add-objective');
    Route::post('/user/delete-objective', 'App\Http\Controllers\user\ObjectivesController@delete')->name('user-delete-objective');
    Route::post('/user/comment-objective', 'App\Http\Controllers\user\ObjectivesController@add_comment')->name('user-comment-objective');

    Route::get('/user/consultants', 'App\Http\Controllers\user\ConsultantController@index')->name('user-consultants');

    Route::get('/user/investors', 'App\Http\Controllers\user\InvestorController@index')->name('user-investors');

    Route::get('/user/measures', 'App\Http\Controllers\user\MeasureController@index')->name('user-measures');

    Route::get('/user/profits', 'App\Http\Controllers\user\ProfitController@index')->name('user-profits');
    Route::get('/user/profit/{id}', 'App\Http\Controllers\user\ProfitController@one')->name('user-profit');
    Route::post('/user/add-profit', 'App\Http\Controllers\user\ProfitController@add')->name('user-add-profit');

    Route::get('/user/flows', 'App\Http\Controllers\user\FlowsController@index')->name('user-flows');
    Route::get('/user/flow/{id}', 'App\Http\Controllers\user\FlowsController@one')->name('user-flow');
    Route::post('/user/add-flow', 'App\Http\Controllers\user\FlowsController@add')->name('user-add-flow');
});

require __DIR__.'/auth.php';
