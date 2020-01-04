<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $profile = User::findOrFail(1)->profile;
        return view('welcome', compact('profile'));
    }
}
