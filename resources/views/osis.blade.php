@extends('layouts.app')
@section('content')
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
        <p>Peringatan! Kamu sudah menggunakan suaramu. Mohon tunggu beberapa saat.</p>
    </x-modal>
    <section class="flex min-h-[calc(100vh_-_72px)] flex-wrap justify-evenly gap-y-10 bg-slate-100 p-8 md:p-12 lg:p-16">
        <div>
            <img class="mx-auto w-96" src="assets/img/king.png" alt="">
            <h1
                class="grid h-32 place-content-center rounded-lg border bg-white p-8 text-center font-['Poppins'] text-2xl font-bold md:text-3xl lg:top-[21rem] lg:text-4xl">
                Choose your next leader!</h1>
        </div>
        <div class="grid place-content-center">
            <h1 class="mb-2 text-center font-['Poppins'] text-4xl font-bold text-sky-500 md:text-5xl lg:text-6xl">OSIS</h1>
            <form action="/osis/vote" method="POST" class="flex flex-wrap items-center justify-center gap-2">
                @csrf
                <x-modal id="confirmation" type="confirmation">
                    <p>Kamu hanya bisa memilih sekali. <br>Yakin ingin memilih <span class="text-red-500"></span>?</p>
                </x-modal>
                <x-card paslon="1" ketua="Abdul Madjid XI-SIJA" wakil="M Rosid Sunbus X-TP II" type="osis"
                    :visi="$paslon1['visi']" :misi="$paslon1['misi']" :proker="$paslon1['proker']" />
                <x-card paslon="2" ketua="Araechpaet R Gading XI-RPL" wakil="Tasya Desvita Sari X-DKV" type="osis"
                    :visi="$paslon2['visi']" :misi="$paslon2['misi']" :proker="$paslon2['proker']" />
                <x-card paslon="3" ketua="Tifatul Ikhsan XI-TKP I" wakil="Adam Cordoba X-TKR I" type="osis"
                    :visi="$paslon3['visi']" :misi="$paslon3['misi']" :proker="$paslon3['proker']" />
            </form>
        </div>
    </section>
    <script>
        const confirm = document.querySelector("#confirmation")
        const hasVote = document.querySelector("#has-vote")

        function confirmation(e) {
            if (JSON.parse(localStorage.getItem("hasVoteOsis"))?.value) {
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
            const misi = value.split(". ").map(m => `<li class='mb-2'>${m}.</li>`).join("")
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
