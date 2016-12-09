<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        return view('tasks.show');
    }

    public function edit()
    {
        return view('tasks.edit');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
