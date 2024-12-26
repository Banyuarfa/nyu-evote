<nav class="relative flex w-full items-center justify-between bg-white p-4 shadow-md md:p-5 lg:p-6">
    <label class="rounded-lg px-4 py-2 text-lg font-semibold transition-colors hover:bg-slate-300 md:hidden"><i
            class="fi fi-br-menu-burger grid"></i><input type="checkbox" id="burger" hidden /></label>
    <ul id="menu"
        class="absolute z-50 hidden flex-col items-center gap-4 rounded-lg border p-4 md:static md:flex md:flex-row md:border-none">
        <li><x-link to="/">Dashboard</x-link></li>
        <li><x-link to="/osis">Vote Osis</x-link></li>
        <li><x-link to="/mpk">Vote Mpk</x-link></li>
        @auth
            <li><x-link to="/statistik">Statistik</x-link></li>
        @endauth
    </ul>
    @auth
        <x-link to="/logout">Log Out</x-link>
    @else
        <x-link to="/login">Log In</x-link>
    @endauth
</nav>

<script>
    document.querySelector("#burger").addEventListener("click", (e) => {
        document.querySelector("#menu").classList.toggle("hidden");
        document.querySelector("#menu").classList.toggle("menu");
    });
</script>
