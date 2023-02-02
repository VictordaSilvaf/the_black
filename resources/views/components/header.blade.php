<div {{ $attributes->class('h-32 w-full bg-darkBlack flex justify-center items-center sticky top-0 ') }}>
    <div class="w-3/4 flex justify-evenly ">
        <div class="flex items-center space-x-8 lg:space-x-16 h-auto">
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('home')">Home</x-nav-button>
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Home</x-nav-button>
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Home</x-nav-button>
        </div>
        <div class="text-white py-2">
            <x-logo/>
        </div>
        <div class="flex items-center space-x-8 lg:space-x-16 h-auto">
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Home
            </x-nav-button>
            <x-nav-button href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Home</x-nav-button>
            @auth()
                <form class="h-full flex items-center" method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-button href="{{ route('logout') }}"
                                  @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-nav-button>
                </form>
            @else
                <x-nav-button href="{{ route('login') }}" :active="request()->routeIs('dashboard')">Login</x-nav-button>
            @endauth
        </div>
    </div>
</div>
