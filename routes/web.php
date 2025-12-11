<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ApplicationController;

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



Route::get('/home', [AdminController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

// Dashboard with middleware and named route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/userOrder', [OrderController::class, 'userOrder'])->name('profile.userOrder');
    Route::get('/payments/display', [OrderController::class, 'paymentDisplay'])->name('payment.paymentDisplay');

});

require __DIR__.'/auth.php';

// Admin-related routes
Route::prefix('dashboard')->middleware('auth')->group(function () {
    //Service CRUD
    Route::get('/Services', [AdminController::class, 'mainService'])->name('serviceCrud.mainService');
    Route::get('/Services/create', [AdminController::class, 'createService'])->name('serviceCrud.createService');
    Route::post('/Services/store', [AdminController::class, 'storeService'])->name('serviceCrud.storeService');
    Route::get('/Services/edit/{id}', [AdminController::class, 'editService'])->name('serviceCrud.editService');
    Route::put('/Services/update/{id}', [AdminController::class, 'updateService'])->name('serviceCrud.updateService');
    Route::delete('/Services/delete/{id}', [AdminController::class, 'destroyService'])->name('serviceCrud.destroyService');
    //Question CRUD
    Route::get('/Services/{id}/Questions', [AdminController::class, 'question'])->name('questionCrud.question');
    Route::get('/Services/{id}/create', [AdminController::class, 'createQuestion'])->name('questionCrud.createQuestion');
    Route::post('/Services/{id}/store', [AdminController::class, 'storeQuestion'])->name('questionCrud.storeQuestion');
    Route::get('/Questions/{id}/edit', [AdminController::class, 'editQuestion'])->name('questionCrud.editQuestion');
    Route::put('/Questions/{id}/update', [AdminController::class, 'updateQuestion'])->name('questionCrud.updateQuestion');
    Route::delete('/Questions/delete/{id}', [AdminController::class, 'destroyQuestion'])->name('questionCrud.destroyQuestion');
    //Answer CRUD
    Route::get('/Questions/{id}/Answers', [AdminController::class, 'answer'])->name('answerCrud.answer');
    Route::get('/Questions/{id}/createAnswer', [AdminController::class, 'createAnswer'])->name('answerCrud.createAnswer');
    Route::post('/Questions/{id}/storeAnswer', [AdminController::class, 'storeAnswer'])->name('answerCrud.storeAnswer');
    Route::get('/Answers/{id}/edit', [AdminController::class, 'editAnswer'])->name('answerCrud.editAnswer');
    Route::put('/Answers/{id}/updateAnswer', [AdminController::class, 'updateAnswer'])->name('answerCrud.updateAnswer');
    Route::delete('/Answers/delete/{id}', [AdminController::class, 'destroyAnswer'])->name('answerCrud.destroyAnswer');
    //User CRUD
    Route::get('/Users', [AdminController::class, 'userDisplay'])->name('userCrud.userDisplay');
    Route::get('/Users/edit/{id}', [AdminController::class, 'userEdit'])->name('userCrud.userEdit');
    Route::put('/Users/update/{id}', [AdminController::class, 'userUpdate'])->name('userCrud.userUpdate');
    Route::delete('/Users/delete/{id}', [AdminController::class, 'userDestroy'])->name('userCrud.userDestroy');
    //Order CRUD
    Route::get('/Orders', [AdminController::class, 'orderDisplay'])->name('orderCrud.orderDisplay');
    Route::get('/Orders/edit/{id}', [AdminController::class, 'orderEdit'])->name('orderCrud.orderEdit');
    Route::put('/Orders/update/{id}', [AdminController::class, 'orderUpdate'])->name('orderCrud.orderUpdate');
    Route::delete('/Orders/delete/{id}', [AdminController::class, 'orderDestroy'])->name('orderCrud.orderDestroy');
    //Applications
    Route::get('/Applications', [AdminController::class, 'applicationDisplay'])->name('applicationJob.applicationDisplay');
    //Worker CRUD
    Route::get('/Workers', [AdminController::class, 'workerDisplay'])->name('workerCrud.workerDisplay');
    Route::get('/Workers/create', [AdminController::class, 'workerCreate'])->name('workerCrud.workerCreate');
    Route::post('/Workers/store', [AdminController::class, 'workerStore'])->name('workerCrud.workerStore');
    Route::get('/Workers/{id}/edit', [AdminController::class, 'workerEdit'])->name('workerCrud.workerEdit');
    Route::put('/Workers/{id}', [AdminController::class, 'workerUpdate'])->name('workerCrud.workerUpdate');
    Route::delete('/Workers/{id}/delete', [AdminController::class, 'workerDestroy'])->name('workerCrud.workerDestroy');
    //Payment section
    Route::get('/payments/create', [AdminController::class, 'paymentCreate'])->name('payment.paymentCreate');
    Route::post('/payments/store', [AdminController::class, 'paymentStore'])->name('payment.paymentStore');
    //Send info to client
    Route::get('/workerInfo/sendInfo/{id}', [AdminController::class, 'sendInfo'])->name('workerInfo.sendInfo');
    Route::post('/assign-worker/{orderId}', [AdminController::class, 'assignWorker'])->name('assign.worker');

});

// Home service routes
Route::get('/', [HomeServiceController::class, 'serviceMain'])->name('main-content.content');
Route::get('/servicePro', [HomeServiceController::class, 'apply'])->name('servicePro.apply');
Route::get('/feedback', [HomeServiceController::class, 'feedback'])->name('feedback.feedBackForm');
Route::get('/service/content/{id}', [HomeServiceController::class, 'contentMain'])->name('service.booking');
Route::get('/service', [ServiceController::class, 'service'])->name('service.contentService');
Route::get('/service/content/{id}', [ServiceController::class, 'content'])->name('service.content');

//ServiceController routes
Route::get('/service', [ServiceController::class, 'service'])->name('service.contentService');
Route::get('/service/content/{id}', [ServiceController::class, 'content'])->name('service.booking');
//OrderController routes
Route::post('/service/content/', [OrderController::class, 'store'])->name('service.store');
//ApplicationController routes
Route::post('/servicePro', [ApplicationController::class, 'store'])->name('servicePro.store');
