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
           'repo'=>'nullable|url',
           'commercial'=>'boolean'
        ]);

        auth()->user()->projects()->create($data);

        return redirect('/project');

    }

    public function update(Project $project) {

        $data=\request()->validate([
            'name'=>'required',
            'description'=>'required',
            'tools'=>'required',
            'repo'=>'nullable|url',
            'commercial'=>'boolean'
        ]);

        $project->update($data);

        if (!$data['commercial']) {
            $project->update([
               'job_id' => null
            ]);
        }

        return redirect('/project');
    }


    public function destroy() {

        $data = \request()->validate([
            'projects' =>''
        ]);

        Project::destroy($data['projects']);
        return redirect('/project')->with('status','Project deleted');
    }
}
