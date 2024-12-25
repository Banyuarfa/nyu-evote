@extends("Layouts.app")
@section("content")
    <section class="grid min-h-[calc(100vh_-_72px)] place-content-center p-8 md:p-12 lg:p-16">
        <form action="/mpk/vote" method="POST" class="flex flex-wrap items-center justify-center gap-2">
            @csrf
            <x-modal />
            <x-card paslon="1" ketua="Abdul Madjid" wakil="M Rosid Sunbus" type="mpk" />
            <x-card paslon="2" ketua="Araechpaet R Gading" wakil="Tasya Desvita Sari" type="mpk" />

        </form>
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
