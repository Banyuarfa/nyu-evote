<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class MpkVoteController extends Controller
{
    public function index()
    {
        $paslon1 = [
            'visi' =>
            'Menjadikan MPK Sebagai Organisasi Legislatif Siswa Yang Inovatif, Responsif, Dan Kolaboratif, Menyalurkan Aspirasi Serta Mendukung Bakat, Minat, Dan Karakter Siswa Untuk Menciptakan Lingkungan Sekolah Yang Harmonis Dan Berprestasi.',
            'misi' =>
            'Memperkuat Peran MPK Sebagai Pengawas Yang Objektif, Transparan, Dan Akuntabel Untuk Memastikan Program OSIS Efektif, Tepat Sasaran, Dan Bermanfaat Bagi Warga Sekolah. Membangun Sinergi Dengan Organisasi Dan Ekstrakurikuler Untuk Mendukung Bakat, Minat, Dan Prestasi Siswa. Mengoptimalkan Fungsi MPK Sebagai Penyalur Aspirasi Dengan Mekanisme Yang Mudah Diakses Dan Responsif. Meningkatkan Solidaritas MPK, OSIS, Dan Warga Sekolah Untuk Menciptakan Lingkungan Harmonis Dan Berprestasi',
            'proker' =>
            'Pusat Aspirasi Warga Satu (PASWAR). Rapat Evaluasi Berkala dan Kontrolisasi Anggota OSIS. MPK Peduli',
        ];
        $paslon2 = [
            'visi' =>
            'Menjadi Pemimpin Yang Dapat Dipercaya Dan Berani Mengambil Keputusan Untuk Membawa Perubahan Baru Yang Lebih Baik, Mewujudkan MPK Yang Profesional Dalam Mengawasi Seluruh Lingkungan Sekolah Dan Kegiatan OSIS Dengan Efektif Serta Mampu Mengoptimalkan Kinerja Terbaik MPK Dalam Membantu Kesuksesan Kegiatan Dan Program Kerja OSIS.',
            'misi' =>
            'Meningkatkan Keterlibatan Siswa Dalam Menyampaikan Aspirasi Serta Kritik & Saran Melalui Program Kerja Yang Akan Dijalankan. Mengawasi Serta Mengevaluasi Pelaksanaan Program Kerja OSIS Guna Memastikan Keselarasan Dengan Kepentingan Siswa. Mendukung Program-Program Yang Berperan Untuk Perkembangan Potensi Akademik Dan Non-Akademik Siswa. Mengajak Setiap Kelas Untuk Berpartisipasi Aktif Dalam Berjalannya Suatu Program Demi Keberhasilan Dan Kepuasan Bersama',
            'proker' => 'Serangkul "Sarana Sharing Ekskul". Sapamu "Sampaikan Aspirasimu". MPK Mendengar',
        ];
        return view('mpk', compact("paslon1", "paslon2"));
    }
    public function store(Request $request)
    {
        $request->validate(["paslon" => "required|in:1,2,3"]);
        Vote::create(["paslon" => $request->paslon, "type" => "mpk"]);
        return redirect("/")->with("has_vote_mpk", true);
    }
}
