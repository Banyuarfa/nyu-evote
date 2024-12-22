<dialog class="relative rounded-lg p-4">
    <div>
        <input type="number" name="paslon" id="paslon" hidden>
        <header class="flex items-center justify-between pb-1">
            <h1 class="text-xl font-bold">Konfirmasi</h1><button type="button" onclick="closeModal()">Kembali</button>
        </header>
        <hr>
        <main class="h-24 w-80 pt-1">
            <p>Kamu hanya bisa memilih sekali. <br>Yakin ingin memilih <span class="text-red-500">Paslon</span>?</p>
        </main>
        <footer class="float-end">
            <button type="button" onclick="closeModal()" class="rounded-lg p-2">Kembali</button>
            <button type="submit" class="rounded-lg bg-green-500 p-2 px-6">Yakin</button>
        </footer>
    </div>
</dialog>
