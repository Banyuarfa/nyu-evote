@props(['id' => 'dialog', 'type' => ''])
@php
    $type = '';
@endphp

<dialog id="{{ $id }}" class="fixed w-full max-w-sm rounded-lg p-6">
    <div>
        @if ($type == 'confirmation')
            <header class="flex items-center justify-between pb-1">
                <input type="number" name="paslon" id="paslon" hidden>
                <h1 class="font-['Poppins'] text-xl font-bold">Konfirmasi</h1>
            </header>
            <hr>
        @endif
        <main class="pt-1">
            @if ($type == 'done')
                <audio autoplay src="assets/sounds/done_sound.mp3"></audio>
                <video loop autoplay class="mx-auto h-24" src="assets/icons/checked-animation.mp4"></video>
            @endif
            {{ $slot }}

        </main>
        <footer class="float-end pt-2">

            <button type="button" onclick="document.querySelector('#{{ $id }}').close()"
                class="rounded-lg border bg-white p-2 px-4 text-sm font-semibold hover:bg-slate-100">Kembali</button>
            @if ($type == 'confirmation')
                <button type="submit"
                    class="rounded-lg bg-green-500 p-2 px-6 text-sm font-semibold text-white hover:bg-green-600">Lanjut</button>
            @else
                <button type="button" onclick="document.querySelector('#{{ $id }}').close()"
                    class="rounded-lg bg-green-500 p-2 px-6 text-sm font-semibold text-white hover:bg-green-600">Lanjut</button>
            @endif

        </footer>
    </div>
</dialog>
