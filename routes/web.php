<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    $name='Aya';
    $departments = [
        '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales',
    ];
    //return view('about', ['name' => $name]);
    //return view('about')->with('name',$name);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function(){
    $name = $_POST['name'];
    $departments = [
        '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales',
    ];
    return view('about', compact('name'));
});

// Task Routes
Route::get('tasks', [TaskController::class, 'index']);
Route::post('create', [TaskController::class, 'create']);
Route::post('delete/{id}', [TaskController::class, 'destroy']);
Route::post('edit/{id}', [TaskController::class, 'edit']);
Route::post('update', [TaskController::class, 'update']);
Route::get('app', function(){
    return view('layouts.app');
});

// User Routes
Route::get('users', [UserController::class, 'index']);
Route::post('user/create', [UserController::class, 'create']);
Route::post('user/delete/{id}', [UserController::class, 'destroy']);
Route::post('user/edit/{id}', [UserController::class, 'edit']);
Route::post('user/update', [UserController::class, 'update']);

Route::get('app', function(){
    return view('layouts.app');
});
