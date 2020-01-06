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
        $availableLanguages = Language::doesntHave('profiles')->get();
        $languages = Language::all();

        return view('profile.edit', compact('profile', 'languages', 'availableLanguages'));
    }

    public function update() {
        $data = \request()->validate([
            'profile.name' => 'required',
            'profile.lastname'=>'required',
            'profile.url' => 'nullable|url',
            'profile.date_of_birth'=>'nullable|date',
            'profile.description' => '',
            'language.id' =>'',
            'language.level'=>'required_with:language.id'
        ]);
        $profile = auth()->user()->profile;

        $profile->update($data['profile']);
        if (!empty($data['language']['id'])) {

            $profile->languages()->syncWithoutDetaching([
                $data['language']['id']=>['level'=>$data['language']['level']]
            ]);
        }

        return redirect('/profile/edit');
    }


}
