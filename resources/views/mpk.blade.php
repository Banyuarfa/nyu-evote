@extends("Layouts.app")
@section("content")
    <section class="grid h-[calc(100vh_-_72px)] place-content-center">
        <form action="/mpk/vote" method="POST" class="flex gap-2">
            @csrf
            <x-dialog />
            <div class="relative">
                <img src="/assets/img/duck.jpeg" alt="" class="aspect-[4_/_3] rounded-lg object-cover">
                <button type="button" value="1"
                    class="absolute bottom-2 left-1/2 -translate-x-1/2 rounded-lg bg-sky-500 px-16 py-2 hover:bg-sky-600 text-sm"
                    onclick="confirmation(event)">Vote</button>
            </div>
            <div class="relative">
                <img src="/assets/img/duck.jpeg" alt="" class="aspect-[4_/_3] rounded-lg object-cover">
                <button type="button" value="2"
                    class="absolute bottom-2 left-1/2 -translate-x-1/2 rounded-lg bg-sky-500 px-16 py-2 hover:bg-sky-600 text-sm"
                    onclick="confirmation(event)">Vote</button>
            </div>

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
