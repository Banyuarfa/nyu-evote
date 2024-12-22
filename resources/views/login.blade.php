@extends("Layouts.app")
@section("content")
    <section class="flex h-[calc(100vh_-_72px)] items-center justify-center gap-2 bg-slate-100">

        <form action="/login" method="POST" class="grid h-1/3 w-1/3 rounded-lg bg-white p-8 text-center">
            @csrf
            <header>
                <h1 class="self-center text-center text-2xl font-bold">Admin</h1>
            </header>
            <main>
                <input type="password" id="password" name="password" placeholder="Masukkan Password"
                    class="border-b p-2 text-center focus:outline-none">
            </main>
            <footer class="float-end"><a href="/" class="rounded-lg p-2 text-sm">Kembali</a><button
                    class="rounded-lg bg-green-500 p-2 px-6 text-sm">Submit</button></footer>
        </form>
        {{ $error }}
    </section>
@endsection
