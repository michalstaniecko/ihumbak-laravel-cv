<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InterestController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $interests = auth()->user()->interests;
        return view('interests.index',compact('interests'));
    }

    public function create() {
        return view('interests.create');
    }

    public function store() {
        $data = \request()->validate([
           'interest'=>'required'
        ]);
        auth()->user()->interests()->create($data);
        return redirect('/interest');
    }

    public function edit(Interest $interest) {
        return view('interests.edit', compact('interest'));
    }

    public function update(Interest $interest){
        $data=\request()->validate([
           'interest' => 'required'
        ]);

        $interest->update($data);

        return redirect('/interest');
    }

    public function destroy(Interest $interest) {
        $interest->delete();
        return redirect('/interest');
    }
}
