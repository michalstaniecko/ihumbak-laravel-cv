<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $projects = auth()->user()->projects();
        return view('projects.index', compact('projects'));
    }

    public function edit() {
        return view('projects.edit');
    }

    public function store() {
        $data=\request()->validate([
           'name'=>'required',
           'description'=>'required',
           'tools'=>'required',
           'url'=>'nullable|url'
        ]);

        auth()->user()->projects()->create($data);

        return redirect('/project');

    }
}
