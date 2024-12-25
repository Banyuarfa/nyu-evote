@extends("Layouts.app")
@section("content")
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
                <x-modal />
                <x-card paslon="1" ketua="Fulan" wakil="bin Fulan" type="mpk" />
                <x-card paslon="2" ketua="Fulan" wakil="bin Fulan" type="mpk" />

            </form>
        </div>
    </section>
    <script>
        const dialog = document.body.querySelector("dialog");

        function confirmation(e) {
            dialog.querySelector("span").textContent = `Paslon ${e.target.value}`;
            dialog.querySelector("input").value = e.target.value;
            dialog.showModal();
            console.log(dialog.querySelector("span"));
        }

        function closeModal() {
            dialog.close();
        }
        console.log("sdf");
    </script>
@endsection
