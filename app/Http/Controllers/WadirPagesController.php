<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Visitor;
use App\Activity;
use App\Ukm;
use App\User;
use App\Letter;
use App\Visibility;
use App\VisibilityUser;

class WadirPagesController extends Controller
{
    //
    public function index() {
        $visitors = Visitor::all();
        return view('wadir.index')->with('visitors', $visitors);
    }

    public function clear_visitor() {
        $visitors = Visitor::all();
        foreach($visitors as $visitor) {
            Visitor::forget($visitor->ip);
        }
        return redirect()->route('wadir-home');
    }

    public function user() {
        return view('wadir.user');
    }

    public function save_user(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'current_password' => 'required'
        ]);
        $req = $request->all();
        $me = auth()->user();

        if(Hash::check($req['current_password'], $me->password)) {
            if(isset($req['change_password'])) {
                if(isset($req['password']) && isset($req['confirm_password'])){
                    if($req['password'] !== $req['confirm_password']) {
                        return redirect()->route('wadir-user')->with('status', 'Konfirmasi password tidak cocok');
                    }
                    $req['password'] = Hash::make($req['password']);
                }
            }
            $r = $me->update($req);
            return redirect()->route('wadir-user')->with('status', $r ? true : "Terjadi kesalahan saat menginput data");
        } else {
            return redirect()->route('wadir-user')->with('status', 'Password tidak cocok!');
        }
    }

    public function ukm_activity(Request $request){
        $q = $request->get('q');
        $activities = Activity::with(['ukm'])->where('name', 'like', '%'.$q.'%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        $activities->appends(['q' => $q]);

        return view('wadir.ukm_activity')->with('activities', $activities);
    }

    public function ukm_config(Request $request) {
        $q = $request->get('q');
        $ukms = Ukm::all();

        return view('wadir.ukm_config')->with('ukms', $ukms);
    }

    public function save_ukm(Request $request){
        $request->validate([
            'ukm_name' => 'required',
            'admin_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rpassword' => 'required'
        ]);
        $req = $request->all();
        // dd($req);/
        if($req['password'] !== $req['rpassword']) {
            return redirect()->route('wadir-ukm_config')->with('status', 'Password tidak cocok');
        }

        $ukmBaru = Ukm::create([
            'name' => $req['ukm_name'],
            'logo' => '',
            'profile' => '',
            'logo_meaning' => '',
            'vision' => '',
            'mission' => '',
            'faqs' => '',
            'organization_chart' => '',
            'registration' => 0,
            'active' => 0
        ]);
        if($ukmBaru) {
            $adminUkmBaru = User::create([
                'name' => $req['admin_name'],
                'email' => $req['email'],
                'password' => Hash::make($req['password']),
                'ukm_id' => $ukmBaru->id
            ]);
            if($adminUkmBaru) {
                return redirect()->route('wadir-ukm_config')->with('status', true);
            } else {
                $ukmBaru->delete();
                return redirect()->route('wadir-ukm_config')->with('status', 'Gagal membuat user untuk ukm baru');
            }
        } else {
            return redirect()->route('wadir-ukm_config')->with('status', 'Gagal membuat UKM');
        }
    }

    public function ukm_setactive($id, $active) {
        $ukm = Ukm::findOrFail($id);
        $ukm->active = $active;
        $ukm->save();
        
        return redirect()->route('wadir-ukm_config')->with('status', true);
    }

    public function set_publish_activity($id, $published) {
        $activity = Activity::findOrFail($id);
        $activity->published = $published;
        $activity->save();
        return redirect()->route('wadir-ukm_activity');
    }
    
    public function letter_in(Request $request) {
        $q = $request->get('q');
        $letters = Letter::with(['user', 'visibility', 'visibility_users.user'])
                    ->where('user_id', '!=', auth()->user()->id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->where(function($root){
                        $root->whereHas('visibility', function($query){
                            $query->where('type', 1);
                        })->orWhereHas('visibility_users', function($query){
                            $query->where('user_id', auth()->user()->id);
                        });
                    })
                    ->paginate(10);
        $letters->appends(['q' => $q]);
        return view('wadir.letter_in')->with('letters', $letters);
    }

    public function letter_out(Request $request) {
        $q = $request->get('q');
        $users = User::with('ukm')->get();
        $letters = Letter::with(['visibility', 'visibility_users.user'])->where('user_id', auth()->user()->id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $letters->appends(['q' => $q]);
        return view('wadir.letter_out')->with(['letters' => $letters, 'users' => $users]);
    }

    public function save_letter(Request $request) {
        $request->validate([
            'name' => 'required',
            'file_file' => 'required|mimes:doc,docx,ppt,xls,pdf',
        ]);
        $req = $request->all();
        if(isset($req['private'])) {
            $request->validate([
                'users' => 'required'
            ]);
        }
        $path = $req['file_file']->store('public/letters');
        $req['file'] = @end(explode('/', $path));
        $req['user_id'] = auth()->user()->id;
        $letter = Letter::create($req);
        $visibility = Visibility::create([
            'letter_id' => $letter->id,
            'type' => isset($req['private']) ? 2 : 1
        ]);
        
        if(isset($req['private'])) {
            foreach($req['users'] as $user) {
                $visibility_user = VisibilityUser::create([
                    'visibility_id' => $visibility->id,
                    'user_id' => $user
                ]);
            }
        }

        return redirect()->route('wadir-letter_out')->with('status', true);
    }

}
