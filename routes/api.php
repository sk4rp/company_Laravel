<?php

use App\Http\Controllers\API\CommercialEventController;
use App\Http\Controllers\API\EventCategoryController;
use App\Http\Controllers\API\EventParticipantController;
use App\Http\Controllers\API\UserEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::middleware('api')->group(function () {
    Route::apiResource('user-events', UserEventController::class);

    Route::get('/event-categories/create-parent', [EventCategoryController::class, 'createParent']);
    Route::post('/event-categories/store-parent', [EventCategoryController::class, 'storeParent']);
    Route::get('/event-categories/delete-parent', [EventCategoryController::class, 'deleteParent']);
    Route::delete('/event-categories/delete-parent', [EventCategoryController::class, 'destroyParent']);
    Route::apiResource('event-categories', EventCategoryController::class);

    Route::apiResource('event-participants', EventParticipantController::class);

    Route::apiResource('commercial-events', CommercialEventController::class);
});


