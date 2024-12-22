<nav class="flex w-full items-center justify-between p-4 shadow-md">
    <ul class="flex gap-2">
        <li><a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/">Dashboard</a></li>
        <li><a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/osis">Vote
                OSIS</a></li>
        <li><a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/mpk">Vote MPK</a>
        </li>
        @auth
        <li><a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/statistik">Statistik</a></li>
        @endauth
    </ul>
    @auth
    <a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/logout">Logout</a>
    @else
    <a class="rounded-lg px-4 py-2 transition-colors hover:bg-slate-300 text-sm" href="/login">Login</a>
    @endauth
</nav>
