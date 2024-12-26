@extends('Layouts.app')
@section('content')
    @php
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
            <h1 class="mb-2 text-center font-['Poppins'] text-2xl font-bold text-sky-500">OSIS</h1>
            <form action="/osis/vote" method="POST" class="flex flex-wrap items-center justify-center gap-2">
                @csrf
                <x-modal id="confirmation" type="confirmation">
                    <p>Kamu hanya bisa memilih sekali. <br>Yakin ingin memilih <span class="text-red-500">Paslon</span>?</p>
                </x-modal>
                <x-card paslon="1" ketua="Abdul Madjid" wakil="M Rosid Sunbus" type="osis" :visi="$paslon1['visi']"
                    :misi="$paslon1['misi']" :proker="$paslon1['proker']" />
                <x-card paslon="2" ketua="Araechpaet R Gading" wakil="Tasya Desvita Sari" type="osis"
                    :visi="$paslon2['visi']" :misi="$paslon2['misi']" :proker="$paslon2['proker']" />
                <x-card paslon="3" ketua="Tifatul Ikhsan" wakil="Adam Cordoba" type="osis" :visi="$paslon3['visi']"
                    :misi="$paslon3['misi']" :proker="$paslon3['proker']" />
            </form>
        </div>
    </section>
    <script>
        const confirm = document.querySelector("#confirmation")
        const hasVote = document.querySelector("#has-vote")

        function confirmation(e) {
            if (localStorage.getItem("hasVoteOsis")) {
                hasVote.showModal()
                return
            }
            confirm.querySelector("span").textContent = `Paslon ${e.target.value}`;
            confirm.querySelector("input").value = e.target.value;
            confirm.showModal()
        }
        const visiMisiProker = document.querySelector("#visi-misi-proker")

        function openVisi(value, paslon) {
            visiMisiProker.querySelector("main h1").innerHTML = `Visi Paslon ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = value
            visiMisiProker.showModal();
        }

        function openMisi(value, paslon) {
            const misi = value.split(". ").map(m => `<li class='mb-2'>${m}.</li>`).join("");
            visiMisiProker.querySelector("main h1").innerHTML = `Misi Paslon ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = `<ol class='list-decimal pl-4'>${misi}</ol>`
            visiMisiProker.showModal();
        }

        function openProker(value, paslon) {
            const proker = value.split(". ").map(p => `<li class='mb-2'>${p}.</li>`).join("");
            visiMisiProker.querySelector("main h1").innerHTML = `Proker Paslon ${paslon}`
            visiMisiProker.querySelector("main p").innerHTML = `<ol class='list-decimal pl-4'>${proker}</ol>`
            visiMisiProker.showModal();
        }
    </script>
@endsection
