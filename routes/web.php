<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

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

Route::prefix('/tasks')->group(function(){
	Route::post('/', [ TaskController::class, 'create' ]);
	Route::get('/', [ TaskController::class, 'readAll' ]);
	Route::get('/{id}', [ TaskController::class, 'read' ]);
	Route::put('/{id}', [ TaskController::class, 'edit' ]);
	Route::delete('/{id}', [ TaskController::class, 'delete' ]);
});
