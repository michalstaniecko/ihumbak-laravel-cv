<?php

namespace App\Http\Controllers;

use App\Language;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('languages.create');
    }

    public function store() {
        $data = \request()->validate([
           'name'=>'required'
        ]);

        Language::create($data);

        return redirect('/language/create');
    }

    public function assign(Language $language) {

        $data = \request()->validate([
           'level'=>''
        ]);
        $language->attache(auth()->user()->id, $data);

        return redirect('/profile/edit');
    }

    public function unassign(Language $language) {
        $language->profiles()->detach(auth()->user()->profile->id);
        return redirect('/profile/edit');
    }
}
