<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Visitor;
use App\Message;
use App\Ukm;
use App\Major;
use App\StudyProgram;
use App\Member;
use App\Announcement;
use App\Activity;
use App\Gallery;

class UkmPagesController extends Controller
{

    public function __construct() {
        Visitor::log();
    }

    //
    public function home($id) {
        $ukm = $this->ukm($id);
        $announcements = Announcement::where('ukm_id', $id)->limit(10)->get();
        $activities = Activity::where('ukm_id', $id)->limit(10)->get();

        return view('ukm.index')->with([
            'id' => $id,
            'ukm' => $ukm,
            'announcements' => $announcements,
            'activities' => $activities
        ]);
    }

    //
    public function kegiatan($id) {
        $ukm = $this->ukm($id);
        $activities = Activity::where('ukm_id', $id)->paginate(10);

        return view('ukm.kegiatan')->with([
            'id' => $id,
            'ukm' => $ukm,
            'activities' => $activities
        ]);
    }

    public function baca_kegiatan($id, $id_kegiatan) {
        $ukm = $this->ukm($id);
        $activity = Activity::where('ukm_id', $id)->findOrFail($id_kegiatan);
        $activities = Activity::where('ukm_id', $id)->where('id', '!=', $id_kegiatan)->limit(5)->get();

        return view('ukm.baca_kegiatan')->with([
            'id' => $id,
            'ukm' => $ukm,
            'activity' => $activity,
            'activities' => $activities
        ]);
    }

    //
    public function pengumuman($id) {
        $ukm = $this->ukm($id);
        $announcements = Announcement::where('ukm_id', $id)->paginate(10);

        return view('ukm.pengumuman')->with([
            'id' => $id,
            'ukm' => $ukm,
            'announcements' => $announcements
        ]);
    }

    public function baca_pengumuman($id, $id_pengumuman) {
        $ukm = $this->ukm($id);
        $announcement = Announcement::where('ukm_id', $id)->findOrFail($id_pengumuman);
        $announcements = Announcement::where('ukm_id', $id)->where('id', '!=', $id_pengumuman)->limit(5)->get();

        return view('ukm.baca_pengumuman')->with([
            'id' => $id,
            'ukm' => $ukm,
            'announcement' => $announcement,
            'announcements' => $announcements
        ]);
    }

    //
    public function tentang($id) {
        $ukm = $this->ukm($id);

        return view('ukm.tentang')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function faq($id) {
        $ukm = $this->ukm($id);

        return view('ukm.faq')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function kontak($id) {
        $ukm = $this->ukm($id);

        return view('ukm.kontak')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    /** */
    public function simpan_kontak(Request $request, $id) {
        $post_data = $request->all();
        $post_data['ukm_id'] = $id;
        $message = Message::create($post_data);

        return redirect()->route('ukm-kontak', ['id' => $id])->with('status', $message ? true : false);
    }

    //
    public function galeri(Request $request, $id) {
        $ukm = $this->ukm($id);
        $q = $request->get('q');
        $galleries = Gallery::where('ukm_id', $id)
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(12);
        $galleries->appends(['q' => $q]);

        return view('ukm.galeri')->with([
            'id' => $id,
            'ukm' => $ukm,
            'galleries' => $galleries
        ]);
    }

    //
    public function struktur_organisasi($id) {
        $ukm = $this->ukm($id);

        return view('ukm.struktur_organisasi')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function keanggotaan(Request $request, $id) {
        $q = $request->get('q');
        $ukm = $this->ukm($id);
        $members = Member::with(['ukm', 'major', 'study_program'])
                    ->where('approved', 1)
                    ->where('ukm_id', $id)
                    ->where('full_name', 'like', '%'.$q.'%')
                    ->paginate(10);
        $members->appends(['q' => $q]);

        return view('ukm.keanggotaan')->with([
            'id' => $id,
            'ukm' => $ukm,
            'members' => $members
        ]);
    }

    //
    public function pendaftaran($id) {
        $ukm = $this->ukm($id);
        if(!$ukm->registration)
            return redirect()->route('ukm-page', ['id' => $id]);
        $majors = Major::all();

        return view('ukm.pendaftaran')->with([
            'id' => $id,
            'ukm' => $ukm,
            'majors' => $majors
        ]);
    }

    /** */
    public function simpan_pendaftaran(Request $request, $id) {
        $post_data = $request->all();
        $post_data['ukm_id'] = $id;
        $post_data['approved'] = 0;
        $member = Member::create($post_data);

        return redirect()->route('ukm-pendaftaran', ['id' => $id])->with('status', $member ? true : false);
    }

    private function ukm($id) {
        $ukm = Ukm::where('active', 1)->findOrFail($id);
        $ukm->faqs = json_decode($ukm->faqs);
        return $ukm;
    }
}
