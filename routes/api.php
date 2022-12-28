<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Student;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/auth/register',[AuthController::class,'register']);
Route::post('login', [LoginController::class, 'login']);

// only authenticated user can access to products
Route::middleware('auth:api')->group(function () {
    Route::post("add",[StudentsController::class,'add']);
    Route::put("update",[StudentsController::class,'update']);
    Route::delete("delete/{id}",[StudentsController::class,'delete']);
    Route::get("search/{request}",[StudentsController::class,'search']);
    Route::get("paginate",[StudentsController::class,'paginate']); //pagination
    Route::apiResource("student", StudentsController::class); // only return name and address
    Route::post("upload",[StudentsController::class,'upload']); // upload csv
});


 


