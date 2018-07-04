<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Message;
use App\Ukm;
use App\Cash;
use App\Transaction;

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
            'logo_file' => 'mimes:jpg,jpeg,png'
        ]);
        $req = $request->all();
        if(isset($req['logo_file'])){
            $path = $req['logo_file']->store('public/logos');
            $req['logo'] = @end(explode('/', $path));
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
        $cashes = Cash::all();
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
                        ->whereBetween('action_date', [$start, $end])
                        ->paginate(10);
        $transactions->appends(['start' => $start, 'end' => $end]);
        return view('admin.report')->with('transactions', $transactions);
    }

}
