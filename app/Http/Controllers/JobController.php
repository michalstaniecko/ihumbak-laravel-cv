<?php

namespace App\Http\Controllers;

use App\Job;
use App\Project;
use Illuminate\Http\Request;

class JobController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $jobs = auth()->user()->jobs()->latest('start')->get();

        return view('job.index', compact('jobs'));
    }

    public function edit(Job $job) {
        $projects = auth()->user()->projects()->whereNull('job_id')->get();
        return view('job.edit', compact('job', 'projects'));
    }

    public function create() {
        $projects = auth()->user()->projects()->whereNull('job_id')->get();
        return view('job.create', compact('projects'));
    }

    public function store() {
        $data = \request()->validate([
            'job.name' => 'required',
            'job.position' => 'required',
            'job.start' => 'date',
            'job.end' => 'nullable|date',
            'project.ids' => ''
        ]);


        $job = auth()->user()->jobs()->create($data['job']);

        if (!empty($data['project']['ids'])) {

            $projects = Project::whereIn('id', $data['project']['ids'])->update([
                'job_id' => $job->id,
                'commercial' => true
            ]);
        }

        return redirect('/job');
    }

    public function update(Job $job) {
        $data = \request()->validate([
            'job.name' => 'required',
            'job.position' => 'required',
            'job.start' => 'date',
            'job.end' => 'nullable|date',
            'project.ids' => ''
        ]);




        $job->update($data['job']);
        if (!empty($data['project']['ids'])){

            $projects = Project::whereIn('id', $data['project']['ids'])->update([
                'job_id' => $job->id,
                'commercial' => true
            ]);
        }

        return redirect('/job')->with('status', 'Job edited');
    }

    public function destroy() {
        $data = \request()->validate([
            'jobs' => ''
        ]);

        $jobs = Job::find($data['jobs']);

        $jobs->map(function ($job) {
            $job->projects()->update([
                'job_id' => null,
            ]);
            return $job;
        });


        Job::destroy($data['jobs']);


        return redirect('/job')->with('status', 'Job deleted');
    }

}
