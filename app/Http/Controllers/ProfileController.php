<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function edit() {
        $profile = auth()->user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update() {
        $data = \request()->validate([
            'name' => 'required',
            'lastname'=>'required',
            'url' => 'nullable|url',
            'date_of_birth'=>'nullable|date',
            'description' => ''
        ]);
        auth()->user()->profile->update($data);

        return redirect('/profile/edit');
    }


}
