<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function save_user(Request $request){
        $data = $request->all();
        if($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $updated = User::find($data['id'])->update($data);
        return redirect()->route('super-home');
    }
}
