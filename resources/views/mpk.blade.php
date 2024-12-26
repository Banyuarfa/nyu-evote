@extends('Layouts.app')
@section('content')
    @php
        $paslon1 = [
            'visi' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, architecto sint magni quisquam cupiditate quas in sunt consectetur minima, nesciunt animi quam perferendis itaque quae cumque error ea iure consequatur blanditiis, vel consequuntur? Iste minus a reiciendis quisquam obcaecati dolor, assumenda pariatur et, nobis veritatis nam unde eum. Quis, nam.',
            'misi' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, architecto sint magni quisquam cupiditate quas in sunt consectetur minima, nesciunt animi quam perferendis itaque quae cumque error ea iure consequatur blanditiis, vel consequuntur? Iste minus a reiciendis quisquam obcaecati dolor, assumenda pariatur et, nobis veritatis nam unde eum. Quis, nam.',
        ];
        $paslon2 = [
            'visi' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, architecto sint magni quisquam cupiditate quas in sunt consectetur minima, nesciunt animi quam perferendis itaque quae cumque error ea iure consequatur blanditiis, vel consequuntur? Iste minus a reiciendis quisquam obcaecati dolor, assumenda pariatur et, nobis veritatis nam unde eum. Quis, nam.',
            'misi' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, architecto sint magni quisquam cupiditate quas in sunt consectetur minima, nesciunt animi quam perferendis itaque quae cumque error ea iure consequatur blanditiis, vel consequuntur? Iste minus a reiciendis quisquam obcaecati dolor, assumenda pariatur et, nobis veritatis nam unde eum. Quis, nam.',
        ];

    @endphp
    <x-modal id="visi">
        <header class="flex items-center justify-between pb-1">
            <input type="number" name="paslon" id="paslon" hidden>
            <h1 class="font-['Poppins'] text-xl font-bold"></h1>
        </header>
        <hr>
        <p class="mt-2"></p>
    </x-modal>
    <x-modal id="misi">
        <header class="flex items-center justify-between pb-1">
            <input type="number" name="paslon" id="paslon" hidden>
            <h1 class="font-['Poppins'] text-xl font-bold"></h1>
        </header>
        <hr>
        <p class="mt-2"></p>
    </x-modal>
    <section class="flex min-h-[calc(100vh_-_72px)] flex-wrap justify-evenly gap-y-10 bg-slate-100 p-8 md:p-12 lg:p-16">
        <div>
            <img class="mx-auto w-96" src="assets/img/king.png" alt="">
            <h1
                class="grid h-32 place-content-center rounded-lg border bg-white p-8 text-center font-['Poppins'] text-2xl font-bold md:text-3xl lg:top-[21rem] lg:text-4xl">
                Choose your next leader!</h1>
        </div>
        <div class="grid place-content-center">
            <h1 class="mb-2 text-center font-['Poppins'] text-2xl font-bold text-rose-500">MPK</h1>
            <form action="/mpk/vote" method="POST" class="flex flex-wrap items-center justify-center gap-2">
                @csrf
                <x-modal id="confirmation" type="confirmation">
                    <p>Kamu hanya bisa memilih sekali. <br>Yakin ingin memilih <span class="text-red-500">Paslon</span>?</p>
                </x-modal>
                <x-card paslon="1" ketua="Fulan" wakil="bin Fulan" type="mpk" :visi="$paslon1['visi']" :misi="$paslon1['misi']"/>
                <x-card paslon="2" ketua="Fulan" wakil="bin Fulan" type="mpk" :visi="$paslon2['visi']" :misi="$paslon2['misi']"/>

            </form>
        </div>
    </section>
    <script>
        const dialog = document.querySelector("#confirmation");

        function confirmation(e) {
            dialog.querySelector("span").textContent = `Paslon ${e.target.value}`;
            dialog.querySelector("input").value = e.target.value;
            dialog.showModal();
        }
        const visi= document.querySelector("#visi")
        const misi = document.querySelector("#misi")

        function openVisi(value, paslon) {
            visi.querySelector("main h1").innerHTML = `Visi Paslon ${paslon}`
            visi.querySelector("main p").innerHTML = value
            visi.showModal();
        }
        function openMisi(value, paslon) {
            misi.querySelector("main h1").innerHTML = `Misi Paslon ${paslon}`
            misi.querySelector("main p").innerHTML = value
            misi.showModal();
        }
    </script>
@endsection
