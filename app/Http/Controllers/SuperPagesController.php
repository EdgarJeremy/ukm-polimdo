<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuperPagesController extends Controller
{
    //
    public function index(Request $request) {
        $q = $request->get('q');
        $users = User::where('name', 'like', $q.'%')
                    ->paginate(10);
        $users->appends(['q' => $q]);
        return view('super.index')->with('users', $users);
    }
}
