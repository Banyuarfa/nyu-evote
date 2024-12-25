@if ($type == "osis")
    <div class="group w-52 lg:w-60 relative grid gap-2 rounded-lg border bg-white p-2 transition-all hover:bg-slate-900">
        <div class="relative  overflow-hidden rounded-lg">
            <img src="/assets/img/duck.jpeg" alt=""
                class="aspect-[3_/_4] w-full overflow-hidden rounded-lg object-cover transition-all group-hover:scale-105">
            <span
                class="absolute -bottom-12 left-1/2 flex h-12 w-full -translate-x-1/2 justify-center bg-gradient-to-b from-transparent to-black text-center text-sm font-semibold text-white transition-all group-hover:bottom-0">{{ $ketua }}
                <br> {{ $wakil }}</span>
        </div>
        <span
            class="absolute left-2 top-2 w-16 rounded-br-lg rounded-tl-lg bg-sky-500 p-1 text-sm font-semibold text-white transition-all group-hover:w-[calc(100%_-_1rem)] group-hover:rounded-br-none group-hover:rounded-tr-lg group-hover:bg-transparent group-hover:bg-gradient-to-b group-hover:from-sky-500 group-hover:to-transparent group-hover:pt-2 group-hover:text-center">Paslon
            {{ $paslon }}</span>

        <button type="button" value="{{ $paslon }}"
            class="w-full rounded-lg bg-sky-500 py-2 text-sm font-semibold text-white hover:bg-sky-600"
            onclick="confirmation(event)">Vote</button>
        <button type="button"
            class="rounded-lg bg-sky-50 py-2 text-sm font-semibold text-sky-600 hover:bg-sky-100 hover:text-sky-700">Visi
            &
            Misi</button>

    </div>
@else
    <div class="group w-52 lg:w-60 relative grid gap-2 rounded-lg border bg-white p-2 transition-all hover:bg-slate-900">
        <div class="relative overflow-hidden rounded-lg">
            <img src="/assets/img/duck.jpeg" alt=""
                class="aspect-[3_/_4] w-full overflow-hidden rounded-lg object-cover transition-all group-hover:scale-105">
            <span
                class="absolute -bottom-12 left-1/2 flex h-12 w-full -translate-x-1/2 justify-center bg-gradient-to-b from-transparent to-black text-center text-sm font-semibold text-white transition-all group-hover:bottom-0">{{ $ketua }}
                <br> {{ $wakil }}</span>
        </div>
        <span
            class="absolute left-2 top-2 w-16 rounded-br-lg rounded-tl-lg bg-rose-500 p-1 text-sm font-semibold text-white transition-all group-hover:w-[calc(100%_-_1rem)] group-hover:rounded-br-none group-hover:rounded-tr-lg group-hover:bg-transparent group-hover:bg-gradient-to-b group-hover:from-rose-500 group-hover:to-transparent group-hover:pt-2 group-hover:text-center">Paslon
            {{ $paslon }}</span>

        <button type="button" value="{{ $paslon }}"
            class="w-full rounded-lg bg-rose-500 py-2 text-sm font-semibold text-white hover:bg-rose-600"
            onclick="confirmation(event)">Vote</button>
        <button type="button"
            class="rounded-lg bg-rose-50 py-2 text-sm font-semibold text-rose-600 hover:bg-rose-100 hover:text-rose-700">Visi
            &
            Misi</button>

    </div>
@endif
