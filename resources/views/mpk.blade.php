@extends('layouts.app')
@section('content')
    @php
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

    @endphp
    <x-modal id="visi-misi-proker">
        <header class="flex items-center justify-between pb-1">
            <input type="number" name="paslon" id="paslon" hidden>
            <h1 class="font-['Poppins'] text-xl font-bold"></h1>
        </header>
        <hr>
        <p class="mt-2 text-slate-900"></p>
    </x-modal>
    <x-modal id="has-vote">
        <video loop autoplay class="mx-auto h-24" src="assets/icons/warning.mp4"></video>
        <p>Peringatan! Kamu sudah menggunakan suaramu.</p>
    </x-modal>
    <section class="flex min-h-[calc(100vh_-_72px)] flex-wrap justify-evenly gap-y-10 bg-slate-100 p-8 md:p-12 lg:p-16">
        <div>
            <img class="mx-auto w-96" src="assets/img/king.png" alt="">
            <h1
                class="grid h-32 place-content-center rounded-lg border bg-white p-8 text-center font-['Poppins'] text-2xl font-bold md:text-3xl lg:top-[21rem] lg:text-4xl">
                Choose your next leader!</h1>
        </div>
        <div class="grid place-content-center">
            <h1 class="mb-2 text-center font-['Poppins'] text-4xl font-bold text-rose-500 md:text-5xl lg:text-6xl">MPK</h1>
            <form action="/mpk/vote" method="POST" class="flex flex-wrap items-center justify-center gap-2">
                @csrf
                <x-modal id="confirmation" type="confirmation">
                    <p>Kamu hanya bisa memilih sekali. <br>Yakin ingin memilih <span class="text-red-500"></span>?</p>
                </x-modal>
                <x-card paslon="1" ketua="Raka Khaesa" wakil="XI-DPIB II" type="mpk" :visi="$paslon1['visi']"
                    :misi="$paslon1['misi']" :proker="$paslon1['proker']" />
                <x-card paslon="2" ketua="Kenichi Mierza Mahendra" wakil="XI-TITL III" type="mpk" :visi="$paslon2['visi']"
                    :misi="$paslon2['misi']" :proker="$paslon2['proker']" />

            </form>
        </div>
    </section>
    <script>
        const confirm = document.querySelector("#confirmation")
        const hasVote = document.querySelector("#has-vote")

        function confirmation(e) {
            if (localStorage.getItem("hasVoteMpk")) {
                hasVote.showModal()
                return
            }
            confirm.querySelector("span").textContent = `Nomor Urut ${e.target.value}`;
            confirm.querySelector("input").value = e.target.value;
            confirm.showModal()
        }
        const visiMisiProker = document.querySelector("#visi-misi-proker")

        function openVisi(value, paslon) {
            visiMisiProker.querySelector("main h1").innerHTML = `Visi Nomor Urut ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = value
            visiMisiProker.showModal();
        }

        function openMisi(value, paslon) {
            const misi = value.split(". ").map(m => `<li class='mb-2'>${m}.</li>`).join("");
            visiMisiProker.querySelector("main h1").innerHTML = `Misi Nomor Urut ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = `<ol class='list-decimal pl-4'>${misi}</ol>`
            visiMisiProker.showModal();
        }

        function openProker(value, paslon) {
            const proker = value.split(". ").map(p => `<li class='mb-2'>${p}.</li>`).join("");
            visiMisiProker.querySelector("main h1").innerHTML = `Proker Nomor Urut ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = `<ol class='list-decimal pl-4'>${proker}</ol>`
            visiMisiProker.showModal();
        }
    </script>
@endsection
