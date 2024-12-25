@extends("Layouts.app")
@section("content")
    <section class="flex h-[calc(100vh_-_72px)] items-center justify-center gap-2 bg-slate-100">
        <form action="/login" method="POST" class="grid rounded-lg bg-white p-8 text-center">
            @csrf
            <header>
                <h1 class="font-['Poppins'] text-2xl font-bold">Admin</h1>
            </header>
            <main>
                <input type="password" id="password" name="password" placeholder="Masukkan Password"
                    class="border-b p-2 text-center focus:outline-none">
                @if ($error)
                    <div class="mt-2 bg-rose-100 py-2 text-rose-600" role="alert">{{ $error }}</div>
                @endif
            </main>
            <footer class="mt-4">
                <a href="/" class="rounded-lg border p-2 px-6 text-sm font-semibold bg-white hover:bg-slate-100">Kembali</a>
                <button class="rounded-lg bg-green-500 hover:bg-green-600 p-2 px-6 text-sm font-semibold text-white">Submit</button>
            </footer>
        </form>
    </section>
@endsection
