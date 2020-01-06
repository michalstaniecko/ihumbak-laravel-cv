<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        return view('index');
    }

    public function cv() {
        $profile = User::findOrFail(1)->profile;
        return view('cv', compact('profile'));
    }
}
