<?php

namespace App\Http\Controllers;

use Redirect;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->save();

        return Redirect::route('projects.index')->with('message', 'Project aangemaakt');
    }

    public function show($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        return view('projects.show', compact('project'));
    }

    public function edit($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->save();

        return Redirect::route('projects.index')->with('message', 'Project aangepast');

    }

    public function destroy()
    {
        //
    }
}