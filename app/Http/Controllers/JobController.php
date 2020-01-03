<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function edit(){
        return view('job.edit');
    }

    public function store() {
        dd(\request()->all());
    }
}
