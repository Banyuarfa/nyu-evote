{{-- php artisan serve --host=192.168.1.10 --port=8000 --}}
@extends("Layouts.app")
@section("content")
    <dialog class="relative rounded-lg p-4">
        <div>
            <main class="h-36 w-80 pt-1 text-center">
                <audio src="assets/sounds/done_sound.mp3"></audio>
                <video class="mx-auto h-24" loop autoplay src="assets/icons/checked-animation.mp4"></video>
                <p>Terimakasih sudah vote paslon pilihanmu!</p>
            </main>
            <footer class="float-end">
                <button type="button" onclick="closeModal()" class="rounded-lg bg-green-500 p-2 px-6">Lanjut</button>
            </footer>
        </div>
    </dialog>

    <section class="flex h-[calc(100vh_-_72px)] items-center justify-center gap-2 bg-slate-100">
        <a href="/osis" class="rounded-lg bg-white px-8 py-4 text-sm hover:bg-slate-50">Vote OSIS</a>
        <a href="/mpk" class="rounded-lg bg-white px-8 py-4 text-sm hover:bg-slate-50">Vote MPK</a>
    </section>
    <script>
        const dialog = document.body.querySelector("dialog")
        const video = document.body.querySelector("video")
        const audio = document.body.querySelector("audio")
        if ({{ session("vote_an_osis") || session("vote_an_mpk") }}) {
            audio.play()
            dialog.showModal()
        }


        function closeModal() {
            dialog.close()
        }
    </script>
@endsection
