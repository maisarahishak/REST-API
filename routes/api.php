<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Student;

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

Route::post('login', [LoginController::class, 'login']);

// only authenticated user can access to products
Route::middleware('auth:api')->group(function () {
    //Route::get('products', [ProductsController::class, 'index']);
    //Route::get("list",[StudentController::class,'list']);
});

Route::get("search/{request}",[StudentsController::class,'search']);
Route::get("paginate",[StudentsController::class,'paginate']); //pagination

Route::apiResource("student", StudentsController::class); // only return name and address
Route::post("upload",[StudentsController::class,'upload']);


