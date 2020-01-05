<?php

namespace App\Http\Controllers;

use App\Language;
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
        $languages = Language::doesntHave('profiles')->get();
        return view('profile.edit', compact('profile', 'languages'));
    }

    public function update() {
        $data = \request()->validate([
            'name' => 'required',
            'lastname'=>'required',
            'url' => 'nullable|url',
            'date_of_birth'=>'nullable|date',
            'description' => ''
        ]);
        $profile = auth()->user()->profile;

        $profile->update($data);

        $profile->languages()->attach(\request('language_id'), ['level'=>\request('level')]);

        return redirect('/profile/edit');
    }


}
