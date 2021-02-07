<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventRecordController;
use App\Http\Controllers\PatientRecordController;

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

//Login and Register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//protected routes
Route::middleware('auth:api')->group(function() {

    Route::get('/patient_records', [PatientRecordController::class, 'getAll_Patients']);//table data
    Route::get('/records/{patient_record_id}', [EventRecordController::class, 'getAll_Events']);//graph data


});


//for testing purposes only
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




