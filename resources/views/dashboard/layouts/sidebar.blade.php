<nav class="bg-slate-900 w-[280px] text-white fixed top-[3rem] z-20">
    <div class="p-4 px-3 flex items-center gap-3">
        <img src="https://source.unsplash.com/random/100x100/?profile" alt="" class="h-12 w-12 rounded-full">
        <div class="flex flex-col">
            <span>{{ Auth::user()->name }}</span>
            <span class="font-light text-sm">{{ Auth::user()->role->name }}</span>
        </div>
    </div>
    <form action="" class="px-3 mb-3">
        <input type="text" class="w-full border bg-slate-800 border-none h-11 px-5 text-sm outline-none"
            placeholder="search" autofocus>
    </form>
    <ul class="flex flex-col text-sm">
        <li class="h-11 flex items-center px-8 font-medium text-slate-500">
            MAIN NAVIGATION
        </li>
        <li>
            <a class="h-11 flex items-center px-8 {{ Request::is('dashboard') ? 'bg-green-500' : 'hover:bg-slate-800' }}"
                href="/dashboard">Dashboard</a>
        </li>
        <li>
            <a class="h-11 flex items-center px-8 {{ Request::is('dashboard/event') ? 'bg-green-500' : 'hover:bg-slate-800' }}"
                href="/dashboard/event">Tamu</a>
        </li>
        <li>
            <a class="h-11 flex items-center px-8 {{ Request::is('setting') ? 'bg-green-500' : 'hover:bg-slate-800' }}"
                href="/dashboard/setting">Setting</a>
        </li>
        <li>
            <a class="h-11 flex items-center px-8 {{ Request::is('logout') ? '' : 'hover:bg-slate-800' }}"
                href="/logout">Logout</a>
        </li>
    </ul>
</nav>
