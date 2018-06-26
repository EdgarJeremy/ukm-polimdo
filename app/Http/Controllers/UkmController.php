<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class UkmController extends Controller
{
    //
    public function home($id) {
        return view('ukm.index')->with([
            'id' => $id,
            'title' => 'Home - English Club'
        ]);
    }

    //
    public function kegiatan($id) {
        return view('ukm.kegiatan')->with([
            'id' => $id,
            'title' => 'Kegiatan - English Club'
        ]);
    }

    //
    public function pengumuman($id) {
        return view('ukm.pengumuman')->with([
            'id' => $id,
            'title' => 'Pengumuman - English Club'
        ]);
    }

    //
    public function tentang($id) {
        return view('ukm.tentang')->with([
            'id' => $id,
            'title' => 'Profil - English Club'
        ]);
    }

    //
    public function faq($id) {
        return view('ukm.faq')->with([
            'id' => $id,
            'title' => 'FAQ - English Club'
        ]);
    }

    //
    public function kontak($id) {
        return view('ukm.kontak')->with([
            'id' => $id,
            'title' => 'Kontak - English Club'
        ]);
    }

    /** */
    public function simpan_kontak(Request $request, $id) {
        $post_data = $request->all();
        $post_data['ukm_id'] = $id;
        $message = Message::create($post_data);
        return $message;
    }

    //
    public function galeri($id, $tahun) {
        return view('ukm.galeri')->with([
            'id' => $id,
            'title' => 'Galeri ' . $tahun . ' - English Club',
            'tahun' => $tahun
        ]);
    }

    //
    public function struktur_organisasi($id) {
        return view('ukm.struktur_organisasi')->with([
            'id' => $id,
            'title' => 'Struktur Organisasi - English Club'
        ]);
    }

    //
    public function keanggotaan($id) {
        return view('ukm.keanggotaan')->with([
            'id' => $id,
            'title' => 'Keanggotaan - English Club'
        ]);
    }

    //
    public function pendaftaran($id) {
        return view('ukm.pendaftaran')->with([
            'id' => $id,
            'title' => 'Pendaftaran Anggota - English Club'
        ]);
    }
}
