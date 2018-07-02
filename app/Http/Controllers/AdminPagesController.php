<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use App\Message;
use App\Ukm;

class AdminPagesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function message(Request $request){
        $q = $request->get('q');
        $messages = Message::where('ukm_id', auth()->user()->ukm_id)
                    ->where('nim', 'like', $q.'%')
                    ->paginate(10);
        $messages->appends(['q' => $q]);
        return view('admin.message')->with(['messages' => $messages]);
    }

    public function profile() {
        return view('admin.profile')->with(['ukm' => auth()->user()->ukm]);
    }

    public function save_profile(Request $request) {
        $request->validate([
            'logo_file' => 'mimes:jpg,jpeg,png'
        ]);
        $req = $request->all();
        if(isset($req['logo_file'])){
            $path = $req['logo_file']->store('public/logos');
            if($path) {
                return redirect()->route('admin-profile')->with('status', 'Gagal mengupload file');
            }
            $req['logo'] = @end(explode('/', $path));
        }
        $thisUkm = auth()->user()->ukm;
        $thisUkm->update($req);
        return redirect()->route('admin-profile')->with('status', true);
    }

    public function delete_message($id) {
        $message = Message::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $ret = $message->delete();
        return redirect()->route('admin-message')->with('deleted', $ret ? true : false);
    }

}
