<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/taskmanager', function (Request $request) {
//    // return $request->taskmanager();
//})->middleware('auth:api');

//Route::apiResource('/taskmanager', 'TaskManagerController');
Route::get('/task', 'TaskManagerController@index');
Route::post('/task-add', 'TaskManagerController@storeTask');
Route::post('/task-show', 'TaskManagerController@showTask');
Route::post('/task-update-reminder/{update}', 'TaskManagerController@updateTaskReminder');
Route::delete('/task-delete/{delete}', 'TaskManagerController@destroyTask');
Route::put('/task-update/{id}', 'TaskManagerController@updateTaskNameDate');

//Route::post('/tasksave', [App\Modules\Taskmanager\Http\Controllers\TaskManagerController::class, 'store']);
