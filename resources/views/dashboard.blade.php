{{-- php artisan serve --host=192.168.1.10 --port=8000 --}}
@extends('layouts.app')
@section('content')
    @if (session('has_vote_osis') || session('has_vote_mpk') || session('login_success') || session('logout_success'))
        <x-modal type="done">
            <p class="text-center">
                @if (session('has_vote_osis') || session('has_vote_mpk'))
                    Terimakasih sudah vote calon pemimpin pilihanmu!
                @elseif (session('login_success'))
                    Halo min! Log In berhasil.
                @elseif (session('logout_success'))
                    Oke min! Sampai jumpa lagi!
                @endif
            </p>
        </x-modal>
        <script>
            document.querySelector("dialog").showModal();
        </script>
    @endif

    <section class="relative flex h-[calc(100vh_-_72px)] flex-col bg-slate-100">
        <div class="top-10 z-40 mx-auto my-8 lg:absolute lg:left-1/2 lg:m-0 lg:-translate-x-1/2">
            <div class="flex justify-center gap-2">
                <img class="aspect-square h-12 object-contain md:h-14 lg:h-16" src="assets/img/smkn1-logo.webp" alt="">
                <img class="aspect-square h-12 object-contain md:h-14 lg:h-16" src="assets/img/chetana-vardhaka-sangha.png"
                    alt="">
                <img class="aspect-square h-12 object-contain md:h-14 lg:h-16" src="assets/img/osis-logo.png"
                    alt="">
            </div>
            <p
                class="mt-1 text-center text-sm font-semibold uppercase text-slate-700 md:mt-2 md:text-base lg:mt-4 lg:text-lg">
                <span
                    class="block font-['Poppins'] text-xl font-bold text-slate-900 md:text-2xl lg:text-3xl">E-vote</span>Dukung
                calon pemimpin pilihanmu <br> untuk masa depan cerah!
            </p>
        </div>
        <div class="flex h-full w-full">
            <div
                class="relative left-0 h-full w-1/2 overflow-hidden bg-opacity-35 transition-all hover:bg-[rgb(14,165,233,.8)] lg:top-0">
                <a href="/osis"
                    class="absolute -left-24 w-[250%] transition-all hover:-left-20 hover:w-[270%] md:left-0 md:w-[150%] md:hover:left-2 md:hover:w-[160%] lg:-left-20 lg:hover:-left-14">
                    <p
                        class="absolute left-24 top-28 font-['Poppins'] text-6xl font-bold text-white md:top-40 md:text-8xl lg:left-72 lg:top-96 lg:text-9xl">
                        OSIS</p>
                    <img class="" src="assets/img/siluet-osis.png" alt="">
                </a>
            </div>
            <div class="relative right-0 h-full w-1/2 overflow-hidden transition-all hover:bg-[rgb(244,63,94,.8)] lg:top-0">
                <a href="/mpk"
                    class="absolute -right-24 w-[250%] overflow-hidden transition-all hover:-right-20 hover:w-[270%] md:-right-8 md:w-[150%] md:hover:-right-6 md:hover:w-[160%] lg:-right-20 lg:hover:-right-14">
                    <p
                        class="absolute right-24 top-28 font-['Poppins'] text-6xl font-bold text-white md:top-40 md:text-8xl lg:right-72 lg:top-96 lg:text-9xl">
                        MPK</p>
                    <img class="" src="assets/img/siluet-mpk.png" alt="">
                </a>
            </div>

        </div>
    </section>

    <script>
        @if (session('has_vote_osis'))
            localStorage.setItem('hasVoteOsis', true);
        @elseif (session('has_vote_mpk'))
            localStorage.setItem('hasVoteMpk', true);
        @endif
    </script>
@endsection
