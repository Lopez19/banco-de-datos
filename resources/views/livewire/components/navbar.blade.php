<div class="navbar bg-base-100">
    <div class="navbar-start">
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" wire:navigate class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        {{-- Login --}}
        @auth
            <div class="dropdown dropdown-end">
                <button class="btn btn-ghost btn-circle">
                    <x-mary-icon name="heroicon.m.user" />
                </button>
                <ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('filament.admin.auth.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar sesion</a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('filament.admin.auth.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @else
            <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-ghost">Iniciar sesion</a>
        @endauth
    </div>
</div>
