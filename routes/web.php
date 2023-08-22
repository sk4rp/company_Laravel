<?php

use App\Http\Controllers\CommercialEventController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\UserEventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout');
})->name('welcome');

Route::resource(
    'user-events',
    UserEventController::class
);


Route::get('/event-categories/create-parent', [EventCategoryController::class, 'createParent'])->name('event-categories.create-parent');
Route::post('/event-categories/store-parent', [EventCategoryController::class, 'storeParent'])->name('event-categories.store-parent');
Route::get('/event-categories/delete-parent', [EventCategoryController::class, 'deleteParent'])->name('event-categories.delete-parent');
Route::delete('/event-categories/delete-parent', [EventCategoryController::class, 'destroyParent'])->name('event-categories.destroy-parent');
Route::resource(
    'event-categories',
    EventCategoryController::class
);


Route::resource(
    'event-participants',
    EventParticipantController::class
);

Route::resource(
    'commercial-events',
    CommercialEventController::class
);
