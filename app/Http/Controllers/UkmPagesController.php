<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Ukm;
use App\Major;
use App\StudyProgram;
use App\Member;

class UkmPagesController extends Controller
{
    //
    public function home($id) {
        $ukm = $this->ukm($id);

        return view('ukm.index')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function kegiatan($id) {
        $ukm = $this->ukm($id);

        return view('ukm.kegiatan')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function pengumuman($id) {
        $ukm = $this->ukm($id);

        return view('ukm.pengumuman')->with([
            'id' => $id,
            'ukm' => $ukm
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
    public function galeri($id, $tahun) {
        $ukm = $this->ukm($id);

        return view('ukm.galeri')->with([
            'id' => $id,
            'ukm' => $ukm,
            'tahun' => $tahun
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
    public function keanggotaan($id) {
        $ukm = $this->ukm($id);

        return view('ukm.keanggotaan')->with([
            'id' => $id,
            'ukm' => $ukm
        ]);
    }

    //
    public function pendaftaran($id) {
        $ukm = $this->ukm($id);
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
        $ukm = Ukm::findOrFail($id);
        $ukm->faqs = json_decode($ukm->faqs);
        return $ukm;
    }
}
