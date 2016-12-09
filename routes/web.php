<?php

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
    return view('welcome');
});

//Route::model('tasks', 'Task');
//Route::model('projects', 'Project');

Route::bind('tasks', function($value) {
    return App\Task::whereSlug($value)->firstOrFail();
});
Route::bind('projects', function($value) {
    return App\Project::whereSlug($value)->firstOrFail();
});

Route::resource('projects',         'ProjectsController');
Route::resource('projects.tasks',   'TasksController');


