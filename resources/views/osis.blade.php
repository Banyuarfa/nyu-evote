@extends("Layouts.app")
@section("content")
    <section class="grid min-h-[calc(100vh_-_72px)] place-content-center bg-slate-100 p-8 md:p-12 lg:p-16">
        <form action="/osis/vote" method="POST" class="flex gap-2 flex-wrap justify-center items-center">
            @csrf
            <x-modal />
            <x-card paslon="1" ketua="Abdul Madjid" wakil="M Rosid Sunbus" type="osis"/>
            <x-card paslon="2" ketua="Araechpaet R Gading" wakil="Tasya Desvita Sari" type="osis" />
            <x-card paslon="3" ketua="Tifatul Ikhsan" wakil="Adam Cordoba" type="osis"/>
        </form>
    </section>
    <script>
        const dialog = document.body.querySelector("dialog")

        function confirmation(e) {
            dialog.querySelector("span").textContent = `Paslon ${e.target.value}`;
            dialog.querySelector("input").value = e.target.value;
            dialog.showModal()
            console.log(dialog.querySelector("span"))

        }

        function closeModal() {
            dialog.close()
        }
        console.log()
    </script>
@endsection
