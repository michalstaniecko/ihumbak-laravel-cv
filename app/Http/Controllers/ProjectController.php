<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function edit(Project $project) {

        return view('projects.edit', compact('project'));
    }

    public function store() {
        $data=\request()->validate([
           'name'=>'required',
           'description'=>'required',
           'tools'=>'required',
           'repo'=>'nullable|url'
        ]);

        auth()->user()->projects()->create($data);

        return redirect('/project');

    }
}
