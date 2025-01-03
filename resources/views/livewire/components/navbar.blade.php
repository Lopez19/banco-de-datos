<div class="navbar bg-base-100">
    <div class="navbar-start">
        {{-- <div class="dropdown">
            <button class="btn btn-ghost btn-circle">
                <x-mary-icon name="heroicon.m.bars.3" />
            </button>
            <ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a>Homepage</a></li>
                <li><a>Portfolio</a></li>
                <li><a>About</a></li>
            </ul>
        </div> --}}
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" wire:navigate class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        {{-- <button class="btn btn-ghost btn-circle">
            <x-mary-icon name="heroicon.m.magnifying.glass" />
        </button>
        <button class="btn btn-ghost btn-circle">
            <div class="indicator">
                <x-mary-icon name="heroicon.m.bell" />
                <span class="badge badge-xs badge-primary indicator-item"></span>
            </div>
        </button> --}}
    </div>
</div>
