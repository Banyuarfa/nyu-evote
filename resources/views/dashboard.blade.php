{{-- php artisan serve --host=192.168.1.10 --port=8000 --}}
@extends("Layouts.app")
@section("content")
    <dialog class="relative z-50 rounded-lg p-4">
        <div>
            <main class="h-36 w-80 pt-1 text-center">
                <audio src="assets/sounds/done_sound.mp3"></audio>
                <video class="mx-auto h-24" src="assets/icons/checked-animation.mp4"></video>
                <p>Terimakasih sudah vote paslon pilihanmu!</p>
            </main>
            <footer class="float-end">
                <button type="button" onclick="closeModal()" class="rounded-lg bg-green-500 p-2 px-6">Lanjut</button>
            </footer>
        </div>
    </dialog>

    <section class="relative flex h-[calc(100vh_-_72px)] flex-col bg-slate-100">
        <div class="top-10 z-40 mx-auto my-8 lg:absolute lg:left-1/2 lg:m-0 lg:-translate-x-1/2">
            <div class="flex justify-center gap-2">
                <img class="h-12 md:h-14 lg:h-16" src="assets/img/smkn1-logo.webp" alt="">
                <img class="h-12 md:h-14 lg:h-16" src="assets/img/osis-logo.png" alt="">
            </div>
            <p class="mt-1 text-center text-base font-semibold uppercase md:mt-2 md:text-lg lg:mt-4 lg:text-xl"><span
                    class="block">E-vote</span>Dukung paslon pilihanmu!</p>
        </div>
        <div class="flex h-full w-full">
            <div class="relative transition-all left-0 h-full w-1/2 overflow-hidden hover:bg-[rgb(14,165,233,.8)] bg-opacity-35 lg:top-0">
                <a href="/osis"
                    class="absolute -left-24 w-[250%] transition-all hover:-left-20 hover:w-[270%] md:left-0 md:w-[150%] md:hover:left-2 md:hover:w-[160%] lg:-left-20 lg:hover:-left-14">
                    <p
                        class="absolute left-24 top-28 font-['Poppins'] text-6xl font-bold text-white md:top-40 md:text-8xl lg:left-72 lg:top-96 lg:text-9xl">
                        OSIS</p>
                    <img class="" src="assets/img/siluet-osis.png" alt="">
                </a>
            </div>
            <div class="relative transition-all right-0 h-full w-1/2 overflow-hidden hover:bg-[rgb(244,63,94,.8)] lg:top-0">
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
        const dialog = document.body.querySelector("dialog")
        const video = document.body.querySelector("video")
        const audio = document.body.querySelector("audio")
        if ({{ session("vote_an_osis") || session("vote_an_mpk") }}) {
            audio.play()
            video.play()
            video.loop = true
            dialog.showModal()
        }


        function closeModal() {
            dialog.close()
        }
    </script>
@endsection
