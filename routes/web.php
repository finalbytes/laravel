<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
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


