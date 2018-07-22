<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\User;
use App\Message;
use App\Ukm;
use App\Cash;
use App\Transaction;
use App\Letter;
use App\Visibility;
use App\VisibilityUser;
use App\Gallery;
use App\Member;
use App\Activity;
use App\Announcement;

class AdminPagesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $t_activity = Activity::where('ukm_id', auth()->user()->ukm_id)->count();
        $t_announcement = Announcement::where('ukm_id', auth()->user()->ukm_id)->count();
        $t_letter = Letter::where('user_id', auth()->user()->id)->count();
        $t_gallery = Gallery::where('ukm_id', auth()->user()->ukm_id)->count();

        return view('admin.index')->with(compact('t_activity', 't_announcement', 't_letter', 't_gallery'));
    }

    public function message(Request $request){
        $q = $request->get('q');
        $messages = Message::where('ukm_id', auth()->user()->ukm_id)
                    ->where('nim', 'like', $q.'%')
                    ->paginate(10);
        $messages->appends(['q' => $q]);
        return view('admin.message')->with(['messages' => $messages]);
    }
    
    public function delete_message($id) {
        $message = Message::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $ret = $message->delete();
        return redirect()->route('admin-message')->with('deleted', $ret ? true : false);
    }

    public function profile() {
        return view('admin.profile')->with(['ukm' => auth()->user()->ukm]);
    }

    public function save_profile(Request $request) {
        $request->validate([
            'logo_file' => 'mimes:jpg,jpeg,png',
            'organization_chart_file' => 'mimes:jpg,jpeg,png'
        ]);
        $req = $request->all();
        if(isset($req['logo_file'])){
            $path = $req['logo_file']->store('public/logos');
            $req['logo'] = @end(explode('/', $path));
        }
        if(isset($req['organization_chart_file'])) {
            $path = $req['organization_chart_file']->store('public/organization_charts');
            $req['organization_chart'] = @end(explode('/', $path));
        }
        $thisUkm = auth()->user()->ukm;
        $thisUkm->update($req);
        return redirect()->route('admin-profile')->with('status', true);
    }

    public function user() {
        return view('admin.user');
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
                        return redirect()->route('admin-user')->with('status', 'Konfirmasi password tidak cocok');
                    }
                    $req['password'] = Hash::make($req['password']);
                }
            }
            $r = $me->update($req);
            return redirect()->route('admin-user')->with('status', $r ? true : "Terjadi kesalahan saat menginput data");
        } else {
            return redirect()->route('admin-user')->with('status', 'Password tidak cocok!');
        }
    }

    public function cash(Request $request) {
        $q = $request->get('q');
        $cashes = Cash::where('ukm_id', auth()->user()->ukm_id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $cashes->appends(['q' => $q]);
        return view('admin.cash')->with(['cashes' => $cashes]);
    }

    public function save_cash(Request $request) {
        $request->validate([
            'name' => 'required',
            'initial_balance' => 'required',
            'description' => 'required'
        ]);
        $req = $request->all();
        $req['ukm_id'] = auth()->user()->ukm_id;
        $req['balance'] = $req['initial_balance'];
        $t = Cash::create($req);
        return redirect()->route('admin-cash')->with('status', true);
    }

    public function delete_cash($id) {
        $cash = Cash::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $t = $cash->delete();
        return redirect()->route('admin-cash')->with('status', 'delete');
    }

    public function transaction() {
        $cashes = Cash::where('ukm_id', auth()->user()->ukm_id)->get();
        return view('admin.transaction')->with('cashes', $cashes);
    }

    public function save_transaction(Request $request) {
        $request->validate([
            'type' => 'required',
            'cash' => 'required',
            'action_date' => 'required',
            'description' => 'required',
            'file_file' => 'required|mimes:jpg,png,jpeg'
        ]);
        $req = $request->all();
        if($req['type'] === 'in') {
            $request->validate(['cash_id' => 'required']);
            $targetCash = Cash::findOrFail($req['cash_id']);
            $targetCash->balance = $targetCash->balance + (int)$req['cash'];
            $targetCash->save();
        } else if($req['type'] === 'out') {
            $request->validate(['cash_id' => 'required']);
            $targetCash = Cash::findOrFail($req['cash_id']);
            if($targetCash->balance < $req['cash']) {
                return redirect()->route('admin-transaction')->with('status', 'invalid_cash');
            }
            $targetCash->balance = $targetCash->balance - (int)$req['cash'];
            $targetCash->save();
        } else if($req['type'] === 'transfer') {
            $request->validate(['cash_id_from' => 'required', 'cash_id_to' => 'required']);
            if($req['cash_id_from'] === $req['cash_id_to']) {
                return redirect()->route('admin-transaction')->with('status', 'invalid_target');
            }
            $fromCash = Cash::findOrFail($req['cash_id_from']);
            if($fromCash->balance < $req['cash']) {
                return redirect()->route('admin-transaction')->with('status', 'invalid_cash');
            }
            $toCash = Cash::findOrFail($req['cash_id_to']);
            $fromCash->balance = $fromCash->balance - (int)$req['cash'];
            $toCash->balance = $toCash->balance + (int)$req['cash'];
            $fromCash->save();
            $toCash->save();
        }
        $path = $req['file_file']->store('public/transactions');
        $req['file'] = @end(explode('/', $path));
        $transaction = Transaction::create($req);
        return redirect()->route('admin-transaction')->with('status', $transaction ? true : false);
    }

    public function report(Request $request) {
        $start = $request->get('start') ? $request->get('start') : date('Y-m-01');
        $end = $request->get('end') ? $request->get('end') : date('Y-m-t');
        $transactions = Transaction::with(['target_cash', 'transfer_to', 'transfer_from'])
                        ->whereHas('target_cash', function($q){
                            $q->where('ukm_id', auth()->user()->ukm_id);
                        })
                        ->orWhereHas('transfer_to', function($q){
                            $q->where('ukm_id', auth()->user()->ukm_id);
                        })
                        ->orWhereHas('transfer_from', function($q){
                            $q->where('ukm_id', auth()->user()->ukm_id);
                        })
                        ->whereBetween('action_date', [$start, $end])
                        ->paginate(10);
        $transactions->appends(['start' => $start, 'end' => $end]);
        return view('admin.report')->with('transactions', $transactions);
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
        return view('admin.letter_in')->with('letters', $letters);
    }

    public function letter_out(Request $request) {
        $q = $request->get('q');
        $users = User::with('ukm')->get();
        $letters = Letter::with(['visibility', 'visibility_users.user'])->where('user_id', auth()->user()->id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $letters->appends(['q' => $q]);
        return view('admin.letter_out')->with(['letters' => $letters, 'users' => $users]);
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

        return redirect()->route('admin-letter_out')->with('status', true);
    }

    public function gallery(Request $request){
        $q = $request->get('q');
        $galleries = Gallery::where('ukm_id', auth()->user()->ukm_id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(12);
        $galleries->appends(['q' => $q]);
        return view('admin.gallery')->with('galleries', $galleries);
    }

    public function save_gallery(Request $request) {
        $request->validate([
            'name' => 'required',
            'file_file' => 'required|mimes:jpg,png,jpeg'
        ]);
        $req = $request->all();
        $path = $req['file_file']->store('public/galleries');
        $req['file'] = @end(explode('/', $path));
        $req['ukm_id'] = auth()->user()->ukm_id;
        $gallery = Gallery::create($req);
        
        return redirect()->route('admin-gallery')->with('status', true);
    }

    public function member(Request $request) {
        $q = $request->get('q');
        $members = Member::with(['ukm', 'major', 'study_program'])
                    ->where('approved', 1)
                    ->where('ukm_id', auth()->user()->ukm_id)
                    ->where('full_name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $members->appends(['q' => $q]);

        return view('admin.member')->with('members', $members);
    }

    public function registration(Request $request) {
        $q = $request->get('q');
        $members = Member::with(['ukm', 'major', 'study_program'])
                    ->where('approved', 0)
                    ->where('ukm_id', auth()->user()->ukm_id)
                    ->where('full_name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $members->appends(['q' => $q]);

        return view('admin.registration')->with('members', $members);
    }

    public function set_registration(Request $request){
        $req = $request->all();
        if(isset($req['pendaftaran'])) {
            auth()->user()->ukm->registration = 1;
        } else {
            auth()->user()->ukm->registration = 0;
        }
        auth()->user()->ukm->save();
        return redirect()->route('admin-registration');
    }

    public function registration_approve($id) {
        $member = Member::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $member->approved = 1;
        $member->save();
        return redirect()->route('admin-registration')->with('success', true);
    }

    public function activity(Request $request){
        $q = $request->get('q');
        $activities = Activity::where('ukm_id', auth()->user()->ukm_id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $activities->appends(['q' => $q]);

        return view('admin.activity')->with('activities', $activities);
    }

    public function delete_activity($id) {
        $activity = Activity::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $t = $activity->delete();
        return redirect()->route('admin-activity')->with('status', 'delete');
    }

    public function save_activity(Request $request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'file_file' => 'required|mimes:jpg,jpeg,png',
            'date' => 'required',
            'time' => 'required',
            'content' => 'required'
        ]);
        $req = $request->all();
        $req['ukm_id'] = auth()->user()->ukm_id;
        $req['implementation_date'] = sprintf('%s %s', $req['date'], $req['time']);
        $path = $req['file_file']->store('public/activities');
        $req['file'] = @end(explode('/', $path));
        $req['code'] = rand(0, 9999);
        $activity = Activity::create($req);

        return redirect()->route('admin-activity')->with('status', true);
    }

    public function set_publish_activity($id, $published) {
        $activity = Activity::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $activity->published = $published;
        $activity->save();
        return redirect()->route('admin-activity');
    }

    public function announcement(Request $request){
        $q = $request->get('q');
        $announcements = Announcement::where('ukm_id', auth()->user()->ukm_id)
                        ->where('name', 'like', '%'.$q.'%')
                        ->paginate(10);
        $announcements->appends(['q' => $q]);

        return view('admin.announcement')->with('announcements', $announcements);
    }

    public function save_announcement(Request $request) {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'place' => 'required',
            'contact_person' => 'required',
            'file_file' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required'
        ]);
        $req = $request->all();
        $req['ukm_id'] = auth()->user()->ukm_id;
        $req['implementation_date'] = sprintf('%s %s', $req['date'], $req['time']);
        $path = $req['file_file']->store('public/announcements');
        $req['file'] = @end(explode('/', $path));

        $announcement = Announcement::create($req);

        return redirect()->route('admin-announcement')->with('status', true);
    }

    public function delete_announcement($id) {
        $announcement = Announcement::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $t = $announcement->delete();
        return redirect()->route('admin-announcement')->with('status', 'delete');
    }

    public function set_publish_announcement($id, $published) {
        $announcement = Announcement::where('ukm_id', auth()->user()->ukm_id)->findOrFail($id);
        $announcement->published = $published;
        $announcement->save();
        return redirect()->route('admin-announcement');
    }

}
