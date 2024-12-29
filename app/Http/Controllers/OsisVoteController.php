<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;


class OsisVoteController extends Controller
{
    public function index()
    {
        $paslon1 = [
            'visi' =>
            'Menjadikan Anggota OSIS-MPK SMK Negeri 1 Jakarta Sebagai Roda Penggerak Dalam Mewujudkan Identitas Sekolah Yang Unggul.',
            'misi' =>
            'Mengembangkan Potensi Siswa/i SMK Negeri 1 Jakarta Dalam Aspek Kreativitas, Inovasi, Dan Daya Cipta. Menyatukan Tujuan Serta Meningkatkan Komunikasi Antar Anggota OSIS-MPK Untuk Menciptakan Lingkungan Kerja Yang Nyaman Dan Profesional. Menjalin Kerja Sama Yang Harmonis Dengan Siswa/i Serta Pihak Eksternal Guna Memperluas Relasi Dan Memperkaya Pengalaman Dalam Hubungan Sosial. Merencanakan Program Kerja Yang Strategis Dan Mendukung Upaya Sekolah Untuk Meraih Keunggulan',
            'proker' =>
            'Geransa (Gerakan Anniversary Satoe). Photobooth Every Event. APB (Aksi Peduli Bersama). Wilhelmina Cup Vol.7. Stovia Sounds Volt',
        ];
        $paslon2 = [
            'visi' =>
            'Mengembangkan OSIS SMK Negeri 1 Jakarta Sebagai Wadah Yang Fleksibel Dan Inspiratif Untuk Menciptakan Siswa-Siswi Yang Aktif, Berprestasi, Peduli Lingkungan, Serta Memiliki Semangat Literasi Melalui Program-Program Kolaboratif Dan Berkelanjutan.',
            'misi' =>
            'Mengajak Siswa-Siswi SMK Negeri 1 Jakarta Memiliki Karakter Pancasila. Mengajak Kolaborasi Ekstrakurikuler Dalam Beberapa Kegiatan OSIS SMK Negeri 1 Jakarta. Mengembangkan Keahlian Siswa-Siswi Di Jurusannya Masing-Masing. Menumbuhkan Rasa Keingintahuan Siswa-Siswi Dengan Literasi Dan Teknologi. Menyesuaikan Program Kerja OSIS Yang Sudah Ada Dan Akan Ada',
            'proker' =>
            'Edufun (Seminar Edukatif Dengan Games). Spill Bill (Channel Wirausaha Siswa). Skillfest (Lomba Keahlian Internal Jurusan). Kompas Eskul (Kolaborasi, Inspirasi, Dan Aksi Eskul)',
        ];
        $paslon3 = [
            'visi' =>
            'Membuat OSIS SMK Negeri 1 Jakarta Lebih Dikenal Oleh Masyarakat Jakarta, Mengoptimalkan Nilai Moralitas Nama SMK Negeri 1 Jakarta, Dan Membantu Siswa/i SMK Negeri 1 Jakarta Menjadi Lebih Disiplin, Kreatif, Inovatif, Dan Berprestasi.',
            'misi' =>
            'Memperkenalkan Organisasi Yang Ada Di Sekolah Dengan Proker Yang Akan Kami Buat Membantu Mengembangkan Minat/Bakat Dan Aspirasi Siswa/i SMK Negeri 1 Jakarta Melalui Ekskul Yang Dinaungi. Mempererat Hubungan Sekolah, OSIS, MPK, Dan Ekskul Di SMK Negeri 1 Jakarta Melakukan Perubahan Yang Berkala Di OSIS SMK Negeri 1 Jakarta. Apresiasi Prestasi Siswa/i SMK Negeri 1 Jakarta. Melakukan Program Kerja Lanjutan Dari Sebelumnya Dengan Pengembangan Dan Menyelenggarakan Program Kerja Baru',
            'proker' =>
            'Orel (Organisasi Artikel). Tasagawa/i (Teknik Satu Petugas Siswa/i). Atraksi (Aksi, Terampil, Kreasi, Seni). Tasama (Teknik Satu Mading). Merput Fest (Merah Putih Festival)',
        ];
        return view('osis', compact("paslon1", "paslon2", "paslon3"));
    }
    public function store(Request $request)
    {
        $request->validate(["paslon" => "required|in:1,2,3"]);
        Vote::create(["paslon" => $request->paslon, "type" => "osis"]);
        return redirect("/")->with("has_vote_osis", true);
    }
}
